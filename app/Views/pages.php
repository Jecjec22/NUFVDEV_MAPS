<!DOCTYPE html>
<html>
<head>
    <title>Project List</title>
    <style>
        .box {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            cursor: pointer;
        }
        .details {
            display: none;
        }
        .edit-btn, .delete-btn {
            background-color: gray;
            color: white;
            padding: 5px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
        }
        .add-btn {
            background-color: green;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9998;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
        }
    </style>
    <script>
        function expandDetails(id) {
            var details = document.getElementById("details-" + id);
            if (details.style.display === "none") {
                details.style.display = "block";
            } else {
                details.style.display = "none";
            }
        }

        function editProject(event, id) {
            event.stopPropagation();
            window.location.href = "<?php echo site_url('pages/edit'); ?>/" + id;
        }

        function deleteProject(id) {
            if (confirm("Are you sure you want to delete this project?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo base_url('pages/deleteProject'); ?>");
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Reload the page to show the updated list of projects
                        location.reload();
                    }
                };
                xhr.send("id=" + id);
            }
        }

        function showAddProjectModal() {
            var modalOverlay = document.getElementById("modal-overlay");
            modalOverlay.style.display = "flex";
        }

        function hideAddProjectModal() {
            var modalOverlay = document.getElementById("modal-overlay");
            modalOverlay.style.display = "none";
        }

        function addProject() {
            showAddProjectModal();
        }

        function submitAddProjectForm() {
            var form = document.querySelector("form");
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo base_url('pages/add'); ?>");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Successful response, handle accordingly
                        alert("Project Added Successfully!");
                        hideAddProjectModal();
                        location.reload(); // Refresh the page to show the updated list of projects
                    } else {
                        // Error response, handle accordingly
                        alert("Error adding project. Please try again.");
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
</head>
<body>
    <h1>Project List</h1>
    <?php if (!empty($projects1)) : ?>
        <?php foreach ($projects1 as $project) : ?>
            <div class="box" onclick="expandDetails(<?php echo $project['Project_ID']; ?>)">
                <h2><?php echo $project['Project_Name']; ?></h2>
                <p>Project ID: <?php echo $project['Project_ID']; ?></p>
                <p>Client Name: <?php echo $project['Client_Name']; ?></p>
                <p>Project Description: <?php echo $project['Project_Description']; ?></p>
                <p>Services needed: <?php echo $project['Services_Needed']; ?></p>
                <p>Project Status: <?php echo $project['Project_Status']; ?></p>
                <p>Team Size: <?php echo $project['TeamSize']; ?></p>
                <p>Due date: <?php echo $project['DueDate']; ?></p>
                <button class="edit-btn" onclick="editProject(event, <?php echo $project['Project_ID']; ?>)">Edit</button>
                <button class="delete-btn" onclick="deleteProject(<?php echo $project['Project_ID']; ?>)">Delete</button>
                <div class="details" id="details-<?php echo $project['Project_ID']; ?>">
                    <p>Details of <?php echo $project['Project_Name']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No projects found.</p>
    <?php endif; ?>

    <button class="add-btn" onclick="addProject()">Add Project</button>

    <div class="modal-overlay" id="modal-overlay">
        <div class="modal-content">
            <h2>Add Project</h2>
            <form onsubmit="event.preventDefault(); submitAddProjectForm();">
                <!-- Form fields here -->
                <input type="text" name="projectName" placeholder="Project Name"><br><br>
                <input type="text" name="clientName" placeholder="Client Name"><br><br>
                <textarea name="projectDescription" placeholder="Project Description"></textarea><br><br>
                <select name="servicesNeeded">
                    <option value="Carpentry only">Carpentry only</option>
                    <option value="Maintenance only">Maintenance only</option>
                    <option value="Repair only">Repair only</option>
                    <option value="Carpentry and Maintenance">Carpentry and Maintenance</option>
                    <option value="Carpentry and Repair">Carpentry and Repair</option>
                    <option value="Maintenance and Repair">Maintenance and Repair</option>
                    <option value="All Service">All Service</option>
                    <option value="Others">Others</option>
                </select><br><br>
                <select name="projectStatus">
                    <option value="Operational">Operational</option>
                    <option value="Not Operational">Not Operational</option>
                    <option value="For Quotation">For Quotation</option>
                </select><br><br>
                <input type="number" name="teamSize" placeholder="Team Size"><br><br>
                <input type="date" name="dueDate"><br><br>
                <button type="submit">Add</button>
                <button type="button" onclick="hideAddProjectModal()">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
