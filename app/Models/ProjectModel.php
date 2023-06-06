<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projectsdb2'; // Replace with the name of your database table
    protected $primaryKey = 'Project_ID'; // Replace with the primary key column name
    
    protected $allowedFields = [
        'Project_Name',
        'Client_Name',
        'Project_Description',
        'Services_Needed',
        'Project_Status',
        'TeamSize',
        'DueDate'
    ];
    

    // Add any other necessary methods or customizations
}
