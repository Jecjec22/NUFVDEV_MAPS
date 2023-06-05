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
            position: relative;
        }
        .details {
            display: none;
        }
        .assign-button {
            position: absolute;
            right: 0;
            bottom: 0;
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Project List</h1>
    <div id="project-list">
    <?php
        // Establish a connection to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Projects";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare a SELECT statement
        $sql = "SELECT * FROM projectsdb";
        $result = $conn->query($sql);

        // Loop through the data and output each row as a project box
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="box" onclick="expandDetails(' . $row['ProjectID'] . ')">';
                echo '<h2>' . $row['ProjectName'] . '</h2>';
                echo '<p>Client: ' . $row['ClientName'] . '</p>';
                echo '<p>Services needed: ' . $row['ServicesNeeded'] . '</p>';
                echo '<p>Due date: ' . $row['DueDate'] . '</p>';
                echo '<button class="assign-button" onclick="assignProject(event, ' . $row['ProjectID'] . ')">Assign</button>';
                echo '</div>';
            }
        } else {
            echo '<p>No projects found.</p>';
        }

        // Close the database connection
        $conn->close();
    ?>
    </div>
    <script>
        function expandDetails(id) {
            var details = document.getElementById("details-" + id);
            if (details.style.display === "none") {
                details.style.display = "block";
            } else {
                details.style.display = "none";
            }
        }

        function assignProject(event, id) {
    event.stopPropagation(); // Prevent the click event from triggering the expandDetails function
    // Add your logic for assigning the project here
    window.location.href = "<?php echo base_url('backend/assign_project.php'); ?>?id=" + id;

}
    </script>
</body>
</html>

