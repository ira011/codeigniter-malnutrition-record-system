<?php

namespace App\Controllers;

use App\Models\ChildrenModel;

class HighRiskController extends BaseController
{
    public function index()
    {
        $childrenModel = new ChildrenModel();

        // Fetch all children marked as high-risk (e.g., underweight or severe cases)
        $data['highRiskChildren'] = $childrenModel->where('status', 'Underweight')
            ->orWhere('severity', 'Severe')
            ->findAll();

        // Calculate statistics
        $data['totalCases'] = count($data['highRiskChildren']);
        $data['severeCases'] = $childrenModel->where('severity', 'Severe')->countAllResults();
        $data['moderateCases'] = $childrenModel->where('severity', 'Moderate')->countAllResults();

        // Group high-risk cases by barangay
        $data['barangayDistribution'] = $childrenModel->select('barangay, COUNT(*) as count')
            ->where('status', 'Underweight')
            ->orWhere('severity', 'Severe')
            ->groupBy('barangay')
            ->findAll();

        // Pass data to the view
        return view('children/high-risk', $data);
    }

    public function export()
    {
        $childrenModel = new ChildrenModel();

        // Fetch all high-risk children
        $highRiskChildren = $childrenModel->where('status', 'Underweight')
            ->orWhere('severity', 'Severe')
            ->findAll();

        // Prepare and output CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="high_risk_cases.csv"');
        $output = fopen('php://output', 'w');

        // Add header row
        fputcsv($output, ['Name', 'Age', 'Gender', 'BMI', 'Severity', 'Barangay', 'Last Intervention Date']);

        // Add data rows
        foreach ($highRiskChildren as $child) {
            fputcsv($output, [
                $child['name'],
                $child['age'],
                $child['gender'],
                $child['bmi'],
                $child['severity'],
                $child['barangay'],
                $child['last_intervention_date']
            ]);
        }

        fclose($output);
        exit;
    }
}
    