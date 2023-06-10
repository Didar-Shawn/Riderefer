<?php
// Include the database connection file
require_once 'dbConnection.php';

// Function to populate dropdown options from a given table
// Function to populate dropdown options from a given table
function populateDropdown($conn, $tableName, $optionValueField, $optionTextField)
{
    $sql = "SELECT f.id, CONCAT(p1.place_name, ' - ', p2.place_name) AS optionText 
            FROM $tableName AS f 
            INNER JOIN places AS p1 ON f.from_place_id = p1.id 
            INNER JOIN places AS p2 ON f.to_place_id = p2.id";
    
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $optionValue = $row[$optionValueField];
            $optionText = $row['optionText'];
            
            echo "<option value='$optionValue'>$optionText</option>";
        }
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Fare</title>
</head>
<body>
    <?php include 'head.php'; ?>
    <h2>Input Fare</h2>
    <form action="input_driver_backend.php" method="POST" enctype="multipart/form-data">
        <label for="fare_id">Fare:</label>
        <select name="fare_id" id="fare_id">
            <option value="">Select Fare</option>
            <!-- Populate options dynamically from the 'fares' table -->
            <?php populateDropdown($conn, "fares", "id", ["from_place_id", "to_place_id"]); ?>
        </select>
        <br>

        <label for="name">Driver Name:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="mobile">Mobile No:</label>
        <input type="text" name="mobile" id="mobile" required>
        <br>

        <?php $conn->close(); ?>
        <br>
        <input type="hidden" name="form_type" value="input_fare">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
