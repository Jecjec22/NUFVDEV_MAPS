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
            <input type="hidden" name="id" value="<?php echo $project['Project_ID']; ?>">
            <label>Project Name:</label>
            <input type="text" name="projectName" value="<?php echo $project['Project_Name']; ?>"><br>
            <label>Client Name:</label>
            <input type="text" name="clientName" value="<?php echo $project['Client_Name']; ?>"><br>
            <label>Project Description:</label>
            <textarea name="projectDescription"><?php echo $project['Project_Description']; ?></textarea><br>
            <label>Services Needed:</label>
            <select name="servicesNeeded">
                <option value="Installation only" <?php if ($project['Services_Needed'] == 'Installation only') echo 'selected'; ?>>Installation only</option>
                <option value="Maintenance only" <?php if ($project['Services_Needed'] == 'Maintenance only') echo 'selected'; ?>>Maintenance only</option>
                <option value="Repair only" <?php if ($project['Services_Needed'] == 'Repair only') echo 'selected'; ?>>Repair only</option>
                <option value="Installation and Maintenance" <?php if ($project['Services_Needed'] == 'Installation and Maintenance') echo 'selected'; ?>>Installation and Maintenance</option>
                <option value="Installation and Repair" <?php if ($project['Services_Needed'] == 'Installation and Repair') echo 'selected'; ?>>Installation and Repair</option>
                <option value="Maintenance and Repair" <?php if ($project['Services_Needed'] == 'Maintenance and Repair') echo 'selected'; ?>>Maintenance and Repair</option>
                <option value="All Service" <?php if ($project['Services_Needed'] == 'All Service') echo 'selected'; ?>>All Service</option>
                <option value="Others" <?php if ($project['Services_Needed'] == 'Others') echo 'selected'; ?>>Others</option>
            </select><br>
            <label>Project Status:</label>
            <select name="projectStatus">
                <option value="For Quotation" <?php if ($project['Project_Status'] == 'For Quotation') echo 'selected'; ?>>For Quotation</option>
                <option value="Operational" <?php if ($project['Project_Status'] == 'Operational') echo 'selected'; ?>>Operational</option>
                <option value="Not Operational" <?php if ($project['Project_Status'] == 'Not Operational') echo 'selected'; ?>>Not Operational</option>
            </select><br>
            <label>Team Size:</label>
            <input type="number" name="teamSize" value="<?php echo $project['TeamSize']; ?>"><br>
            <label>Due Date:</label>
            <input type="date" name="dueDate" value="<?php echo $project['DueDate']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    <?php else : ?>
        <p>Project not found.</p>
    <?php endif; ?>

</body>
</html>
