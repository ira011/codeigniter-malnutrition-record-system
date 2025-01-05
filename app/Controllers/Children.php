<?php

namespace App\Controllers;

use App\Models\ChildrenModel;
use App\Models\InterventionModel;

class Children extends BaseController
{
    public function index()
    {
        $model = new ChildrenModel();

        // Fetch children in descending order (latest first)
        $children = $model->orderBy('id', 'DESC')->findAll();

        foreach ($children as &$child) {
            $child = $this->calculateChildMetrics($child);
        }

        $data['children'] = $children;
        return view('children/index', $data);
    }

    public function create()
    {
        return view('children/create');
    }

    public function store()
    {
        $model = new ChildrenModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age'),
            'weight' => $this->request->getPost('weight'),
            'height' => $this->request->getPost('height'),
            'gender' => $this->request->getPost('gender'),
            'barangay' => $this->request->getPost('barangay'),
            'last_intervention_date' => $this->request->getPost('last_intervention_date'),
        ];

        // Validate input data
        if (!$this->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'weight' => 'required|decimal',
            'height' => 'required|decimal',
            'gender' => 'required|string',
            'barangay' => 'required|string',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Invalid input data.');
        }

        // Calculate BMI, severity, and status
        $calculatedMetrics = $this->calculateChildMetrics($data);
        $data = array_merge($data, $calculatedMetrics);

        $model->insert($data);
        return redirect()->to('/children')->with('success', 'Child added successfully.');
    }

    public function dashboard()
    {
        $model = new ChildrenModel();
    
        try {
            $children = $model->findAll();
    
            if (empty($children)) {
                throw new \Exception('No children data found.');
            }
    
            // Group data by the month of 'last_intervention_date'
            $monthlyData = [];
            foreach ($children as $child) {
                if (!empty($child['last_intervention_date'])) {
                    $month = date('F', strtotime($child['last_intervention_date'])); // Get month name
                    if (!isset($monthlyData[$month])) {
                        $monthlyData[$month] = [
                            'totalWeight' => 0,
                            'totalHeight' => 0,
                            'count' => 0,
                        ];
                    }
    
                    $monthlyData[$month]['totalWeight'] += $child['weight'];
                    $monthlyData[$month]['totalHeight'] += $child['height'];
                    $monthlyData[$month]['count']++;
                }
            }
    
            // Calculate averages for each month
            $labels = [];
            $averageWeights = [];
            $averageHeights = [];
            foreach ($monthlyData as $month => $data) {
                $labels[] = $month;
                $averageWeights[] = round($data['totalWeight'] / $data['count'], 2);
                $averageHeights[] = round($data['totalHeight'] / $data['count'], 2);
            }
    
            // Insights
            $totalChildren = count($children);
            $underweightCount = 0;
            $normalCount = 0;
            $overweightCount = 0;
    
            foreach ($children as $child) {
                $calculatedMetrics = $this->calculateChildMetrics($child);
                if ($calculatedMetrics['status'] === 'Underweight') {
                    $underweightCount++;
                } elseif ($calculatedMetrics['status'] === 'Normal') {
                    $normalCount++;
                } else {
                    $overweightCount++;
                }
            }
    
            $data = [
                'totalChildren' => $totalChildren,
                'underweightCount' => $underweightCount,
                'normalCount' => $normalCount,
                'overweightCount' => $overweightCount,
                'labels' => json_encode($labels), // Months
                'averageWeights' => json_encode($averageWeights), // Average weights by month
                'averageHeights' => json_encode($averageHeights), // Average heights by month
            ];
    
            return view('children/dashboard', $data);
        } catch (\Exception $e) {
            log_message('error', 'Dashboard error: ' . $e->getMessage());
            return redirect()->to('/children')->with('error', 'Unable to load dashboard.');
        }
    }
    

    public function profile($id)
    {
        $model = new ChildrenModel();
        $child = $model->find($id);

        if (!$child) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Child with ID $id not found.");
        }

        // Calculate BMI and metrics for the child
        $data['child'] = $this->calculateChildMetrics($child);
        $data['history'] = []; // Replace with actual history fetching logic if needed

        return view('children/profile', $data);
    }

    public function addIntervention($childId)
    {
        $interventionModel = new InterventionModel();

        $data = [
            'child_id' => $childId,
            'intervention_type' => $this->request->getPost('type'),
            'date' => date('Y-m-d'),
        ];

        $interventionModel->insert($data);

        return redirect()->to("/children/profile/$childId")->with('success', 'Intervention added successfully.');
    }

    public function delete($id)
    {
        $model = new ChildrenModel();
        $model->delete($id);

        return redirect()->to('/children')->with('success', 'Child record deleted successfully.');
    }
    
    /**
     * Helper function to calculate BMI, severity, and status for a child.
     *
     * @param array $child
     * @return array Updated child data with BMI, severity, and status
     */
    private function calculateChildMetrics($child)
    {
        if (isset($child['height']) && isset($child['weight']) && $child['height'] > 0) {
            $heightInMeters = $child['height'] / 100; // Convert height to meters
            $bmi = round($child['weight'] / ($heightInMeters ** 2), 1); // Calculate BMI
            $child['bmi'] = $bmi;

            // Determine severity and status based on BMI
            if ($bmi < 15) {
                $child['status'] = 'Underweight';
                $child['severity'] = 'Moderate';
            } elseif ($bmi >= 15 && $bmi <= 18) {
                $child['status'] = 'Normal';
                $child['severity'] = 'None';
            } else {
                $child['status'] = 'Overweight';
                $child['severity'] = 'Severe';
            }
        }

        return $child;
    }

    public function highRiskDashboard()
    {
        $model = new ChildrenModel();

        // Fetch only high-risk cases
        $data['highRiskCases'] = $model->where('status', 'Underweight')
            ->orWhere('severity', 'Severe')
            ->findAll();

        foreach ($data['highRiskCases'] as &$case) {
            $case = $this->calculateChildMetrics($case);
        }

        return view('children/highRiskDashboard', $data);
    }


    public function edit($id)
    {
        $model = new ChildrenModel();
        $child = $model->find($id);

        if (!$child) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Child with ID $id not found.");
        }

        $data['child'] = $child;

        return view('children/edit', $data); // Create 'edit' view file
    }

    public function update($id)
    {
        $model = new ChildrenModel();

        // Get the posted data
        $data = [
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age'),
            'weight' => $this->request->getPost('weight'),
            'height' => $this->request->getPost('height'),
            'gender' => $this->request->getPost('gender'),
            'barangay' => $this->request->getPost('barangay'),
            'last_intervention_date' => $this->request->getPost('last_intervention_date'),
        ];

        // Update the child's data in the database
        $model->update($id, $data);

        // Fetch the updated child data
        $updatedChild = $model->find($id);

        // Recalculate BMI, severity, and status
        $calculatedMetrics = $this->calculateChildMetrics($updatedChild);
        $model->update($id, $calculatedMetrics);

        // Set success message
        session()->setFlashdata('success', 'Child record updated successfully.');

        // Redirect to the list page
        return redirect()->to('/children');
    }




}
