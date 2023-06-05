<!DOCTYPE html>
<html>
<head>
    <title>Edit Project</title>
    <!-- Add any necessary styles or scripts -->
</head>
<body>
    <h1>Edit Project</h1>

    <?php if (isset($project)) : ?>
        <form method="POST" action="<?php echo site_url('pages/updateProject'); ?>">

            <input type="hidden" name="id" value="<?php echo $project['ProjectID']; ?>">
            <label>Project Name:</label>
            <input type="text" name="projectName" value="<?php echo $project['ProjectName']; ?>"><br>
            <label>Client Name:</label>
            <input type="text" name="clientName" value="<?php echo $project['ClientName']; ?>"><br>
            <label>Services Needed:</label>
            <input type="text" name="servicesNeeded" value="<?php echo $project['ServicesNeeded']; ?>"><br>
            <label>Due Date:</label>
            <input type="date" name="dueDate" value="<?php echo $project['DueDate']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    <?php else : ?>
        <p>Project not found.</p>
    <?php endif; ?>

</body>
</html>
