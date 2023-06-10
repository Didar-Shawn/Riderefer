<?php include 'dbConnection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Master</title>
</head>
<body>
    <?php include 'head.php'; ?>
    <h2>Input Master</h2>
    <form action="input_master_backend.php" method="post">
        <input type="hidden" name="input" value="input">

        <label for="place_name">To Place:</label>
        <input type="text" name="place_name" id="place_name">
        <input type="submit" value="Submit Place">

        <label for="category_name">Vehicle Category:</label>
        <input type="text" name="category_name" id="category_name">
        <input type="submit" value="Submit Category">

        <label for="type_name">Transport Type:</label>
        <input type="text" name="type_name" id="type_name">
        <input type="submit" value="Submit Transport">
     
    </form>
</body>
</html>
