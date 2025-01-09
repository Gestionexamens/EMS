<?php

namespace App\Models;

use CodeIgniter\Model;

class SectorModel extends Model
{
    protected $table = 'sector'; 
    protected $primaryKey = 'id'; 
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

   
    protected $allowedFields = ['nom', 'description'];

    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    
    protected $validationRules = [
        'nom' => 'required|string|min_length[3]|max_length[100]',
        'description' => 'permit_empty|string|max_length[255]',
    ];

    // Messages de validation personnalisés
    protected $validationMessages = [
        'name' => [
            'required' => 'Le nom de la filière est obligatoire.',
            'min_length' => 'Le nom de la filière doit contenir au moins 3 caractères.',
            'max_length' => 'Le nom de la filière ne peut pas dépasser 100 caractères.',
        ],
        'description' => [
            'max_length' => 'La description ne peut pas dépasser 255 caractères.',
        ],
    ];
}
