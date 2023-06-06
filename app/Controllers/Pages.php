<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Pages extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();
        $data['projects'] = $projectModel->findAll();

        return view('pages', $data);
    }

    public function deleteProject()
    {
        if ($this->request->getMethod() == 'post') {
            $id = $this->request->getPost('id');

            // Load the database model
            $projectModel = new ProjectModel();

            // Delete the project
            if ($projectModel->delete($id)) {
                echo "Project deleted successfully";
            } else {
                echo "Error deleting project";
            }
        }
    }

    public function editProject($id)
    {
        // Load the project model and retrieve the project by ID
        $projectModel = new ProjectModel();
        $project = $projectModel->find($id);

        if ($project) {
            // Pass the project data to the view for editing
            $data['project'] = $project;
            return view('edit_project', $data);
        } else {
            // Redirect to the project list page or display an error message
            return redirect()->to(site_url('pages'))->with('error', 'Project not found');
        }
    }

    public function updateProject()
    {
        if ($this->request->getMethod() == 'post') {
            $id = $this->request->getPost('id');
            $projectName = $this->request->getPost('projectName');
            $clientName = $this->request->getPost('clientName');
            $projectDescription = $this->request->getPost('projectDescription');
            $servicesNeeded = $this->request->getPost('servicesNeeded');
            $projectStatus = $this->request->getPost('projectStatus');
            $teamSize = $this->request->getPost('teamSize');
            $dueDate = $this->request->getPost('dueDate');
    
            // Load the database model
            $projectModel = new ProjectModel();
    
            // Get the existing project by ID
            $existingProject = $projectModel->find($id);
    
            // Check if the project exists
            if ($existingProject) {
                // Set the updated project data
                $updatedProject = [
                    'Project_Name' => $projectName,
                    'Client_Name' => $clientName,
                    'Project_Description' => $projectDescription,
                    'Services_Needed' => $servicesNeeded,
                    'Project_Status' => $projectStatus,
                    'TeamSize' => $teamSize,
                    'DueDate' => $dueDate,
                ];
    
                // Update the project
                if ($projectModel->update($id, $updatedProject)) {
                    return redirect()->to(site_url('pages'))->with('success', 'Project updated successfully');
                } else {
                    return redirect()->to(site_url('pages'))->with('error', 'Error updating project');
                }
            } else {
                return redirect()->to(site_url('pages'))->with('error', 'Project not found');
            }
        }
    }
    

    public function add()
    {
        if ($this->request->getMethod() == 'post') {
            $projectName = $this->request->getPost('projectName');
            $clientName = $this->request->getPost('clientName');
            $projectDescription = $this->request->getPost('projectDescription');
            $servicesNeeded = $this->request->getPost('servicesNeeded');
            $projectStatus = $this->request->getPost('projectStatus');
            $teamSize = $this->request->getPost('teamSize');
            $dueDate = $this->request->getPost('dueDate');

            // Load the database model
            $projectModel = new ProjectModel();

            // Set the project data
            $newProject = [
                'Project_Name' => $projectName,
                'Client_Name' => $clientName,
                'Project_Description' => $projectDescription,
                'Services_Needed' => $servicesNeeded,
                'Project_Status' => $projectStatus,
                'TeamSize' => $teamSize,
                'DueDate' => $dueDate,
            ];

            // Insert the new project
            if ($projectModel->insert($newProject)) {
                return redirect()->to(site_url('pages'))->with('success', 'Project added successfully');
            } else {
                return redirect()->to(site_url('pages'))->with('error', 'Error adding project');
            }
        }
    }
}
