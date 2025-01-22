<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $table = 'semester';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'start_date', 'end_date'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|string|max_length[100]',
        'start_date' => 'required|valid_date',
        'end_date' => 'required|valid_date|after_or_equal[start_date]',
    ];

    protected $validationMessages = [
        'name' => ['required' => 'The semester name is required.'],
        'start_date' => ['required' => 'The start date is required.'],
        'end_date' => ['required' => 'The end date is required.', 'after_or_equal' => 'End date must be after or equal to start date.'],
    ];
}
?>