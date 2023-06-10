<?php include 'dbConnection.php'; ?>

<?php
// Function to populate dropdown options from a given table
function populateDropdown($conn, $tableName, $optionValueField, $optionTextField)
{
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row[$optionValueField] . "'>" . $row[$optionTextField] . "</option>";
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
    <form action="input_fare_backend.php" method="POST" enctype="multipart/form-data">
        <label for="from_place_id">From Place:</label>
        <select name="from_place_id" id="from_place_id" required>
            <option value="">Select From Place</option>
            <!-- Populate options dynamically from the 'places' table -->
            <?php populateDropdown($conn, "places", "id", "place_name"); ?>
        </select>

        <label for="to_place_id">To Place:</label>
        <select name="to_place_id" id="to_place_id" required>
            <option value="">Select To Place</option>
            <!-- Populate options dynamically from the 'places' table -->
            <?php populateDropdown($conn, "places", "id", "place_name"); ?>
        </select>

        <label for="vehicle_category_id">Vehicle Category:</label>
        <select name="vehicle_category_id" id="vehicle_category_id" required>
            <option value="">Select Vehicle Category</option>
            <!-- Populate options dynamically from the 'vehicle_category' table -->
            <?php populateDropdown($conn, "vehicle_category", "id", "category_name"); ?>
        </select>

        <label for="transport_type_id">Transportation Type:</label>
        <select name="transport_type_id" id="transport_type_id" required>
            <option value="">Select Transportation Type</option>
            <!-- Populate options dynamically from the 'transportation_types' table -->
            <?php populateDropdown($conn, "transport_type", "id", "type_name"); ?>
        </select>

        <label for="fare">Fare</label>
        <input type="number" name="fare" id="fare" required>

        <?php $conn->close(); ?>
        <br>
        <input type="hidden" name="form_type" value="input_fare">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
