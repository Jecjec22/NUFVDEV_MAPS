<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model


{
    protected $table = 'projectsdb'; // Replace with the name of your database table
    protected $primaryKey = 'ProjectID'; // Replace with the primary key column name
    
    protected $allowedFields = [
        'ProjectName',
        'ClientName',
        'ServicesNeeded',
        'DueDate'
    ];

    // Add any other necessary methods or customizations
}
