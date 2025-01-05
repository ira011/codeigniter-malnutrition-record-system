<?php

namespace App\Controllers;

use App\Models\ChildrenModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $childrenModel = new ChildrenModel();

        // Fetch all children records
        $children = $childrenModel->findAll();

        // Initialize data for growth trends
        $monthlyData = [];
        foreach ($children as $child) {
            // Group data by the month of the 'created_at' field
            $month = date('F', strtotime($child['created_at'])); 
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
        $normalCount = $childrenModel->where('status', 'Normal')->countAllResults();
        $underweightCount = $childrenModel->where('status', 'Underweight')->countAllResults();
        $overweightCount = $childrenModel->where('status', 'Overweight')->countAllResults();

        // Pass data to the view
        return view('dashboard', [
            'labels' => json_encode($labels), // Labels for the chart
            'averageWeights' => json_encode($averageWeights), // Weight data for the chart
            'averageHeights' => json_encode($averageHeights), // Height data for the chart
            'totalChildren' => $totalChildren, // Total children count
            'normalCount' => $normalCount, // Count of normal children
            'underweightCount' => $underweightCount, // Count of underweight children
            'overweightCount' => $overweightCount, // Count of overweight children
        ]);
    }
}
