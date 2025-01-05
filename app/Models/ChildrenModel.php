<?php

namespace App\Models;

use CodeIgniter\Model;

class ChildrenModel extends Model
{
    protected $table = 'children'; // Table name
    protected $primaryKey = 'id'; // Primary key

    // List of fields that can be updated or inserted
    protected $allowedFields = [
        'name', 
        'age', 
        'weight', 
        'height', 
        'gender', 
        'bmi', 
        'severity', 
        'status', 
        'barangay', 
        'last_intervention_date'
    ];

    /**
     * Fetch high-risk cases based on nutritional status or severity.
     *
     * @return array
     */
    public function getHighRiskCases()
    {
        return $this->where('status', 'High-Risk')
                    ->orWhere('severity', 'Severe')
                    ->findAll();
    }

    /**
     * Fetch cases by barangay.
     *
     * @param string $barangay
     * @return array
     */
    public function getCasesByBarangay($barangay)
    {
        return $this->where('barangay', $barangay)->findAll();
    }

    /**
     * Fetch statistics for overview.
     *
     * @return array
     */
    public function getStatistics()
    {
        return [
            'totalCases' => $this->countAllResults(),
            'severeCases' => $this->where('severity', 'Severe')->countAllResults(),
            'moderateCases' => $this->where('severity', 'Moderate')->countAllResults(),
        ];
    }

    /**
     * Update intervention date for a child.
     *
     * @param int $id
     * @param string $date
     * @return bool
     */
    public function updateInterventionDate($id, $date)
    {
        return $this->update($id, ['last_intervention_date' => $date]);
    }
}
