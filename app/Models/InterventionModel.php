<?php

namespace App\Models;
use CodeIgniter\Model;

class InterventionModel extends Model
{
    protected $table = 'interventions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['child_id', 'intervention_type', 'date'];
}
