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

        function addProject() {
            // Create a new form element
            var form = document.createElement("form");
            form.method = "POST";
            form.action = "pages/add";

            // Create input fields for the project details
            var projectNameInput = document.createElement("input");
            projectNameInput.type = "text";
            projectNameInput.name = "projectName";
            projectNameInput.placeholder = "Project Name";
            form.appendChild(projectNameInput);

            var clientNameInput = document.createElement("input");
            clientNameInput.type = "text";
            clientNameInput.name = "clientName";
            clientNameInput.placeholder = "Client Name";
            form.appendChild(clientNameInput);

            var projectDescriptionInput = document.createElement("textarea");
            projectDescriptionInput.name = "projectDescription";
            projectDescriptionInput.placeholder = "Project Description";
            form.appendChild(projectDescriptionInput);

            var servicesNeededInput = document.createElement("select");
            servicesNeededInput.name = "servicesNeeded";
            var servicesOptions = [
                "Carpentry only",
                "Maintenance only",
                "Repair only",
                "Carpentry and Maintenance",
                "Carpentry and Repair",
                "Maintenance and Repair",
                "All Service",
                "Others"
            ];
            for (var i = 0; i < servicesOptions.length; i++) {
                var option = document.createElement("option");
                option.value = servicesOptions[i];
                option.text = servicesOptions[i];
                servicesNeededInput.appendChild(option);
            }
            form.appendChild(servicesNeededInput);

            var projectStatusInput = document.createElement("select");
            projectStatusInput.name = "projectStatus";
            var statusOptions = [
                "Operational",
                "Not Operational",
                "For Quotation"
            ];
            for (var i = 0; i < statusOptions.length; i++) {
                var option = document.createElement("option");
                option.value = statusOptions[i];
                option.text = statusOptions[i];
                projectStatusInput.appendChild(option);
            }
            form.appendChild(projectStatusInput);

         

            var teamSizeInput = document.createElement("input");
            teamSizeInput.type = "number";
            teamSizeInput.name = "teamSize";
            teamSizeInput.placeholder = "Team Size";
            form.appendChild(teamSizeInput);

            var dueDateInput = document.createElement("input");
            dueDateInput.type = "date";
            dueDateInput.name = "dueDate";
            form.appendChild(dueDateInput);

            // Create a submit button
            var submitButton = document.createElement("button");
            submitButton.type = "submit";
            submitButton.innerText = "Add";
            form.appendChild(submitButton);

            // Append the form to the body of the page
            document.body.appendChild(form);
        }
    </script>
</head>
<body>
    <h1>Project List</h1>
    <?php if (!empty($projects)) : ?>
        <?php foreach ($projects as $project) : ?>
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
</body>
</html>
