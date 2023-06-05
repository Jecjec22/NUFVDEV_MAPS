<!DOCTYPE html>
<html>
<head>
    <title>Assign Project</title>
    <style>
        .box {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Assign Project</h1>
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
        $sql = "SELECT * FROM accountdb";
        $result = $conn->query($sql);

        // Loop through the data and output each row as a box
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="box">';
                echo '<h2>' . $row['AccountName'] . '</h2>';
                echo '<p>Account ID: ' . $row['AccountID'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No accounts found.</p>';
        }

        // Close the database connection
        $conn->close();
    ?>
</body>
</html>