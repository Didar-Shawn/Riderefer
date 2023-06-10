<?php include 'dbConnection.php'; ?>
<?php include 'head.php'; ?>
<?php
// Include the database connection file
require_once 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['form_type']) && $_POST['form_type'] === 'input_fare') {
        // Retrieve the values from the form
        $fareId = $_POST['fare_id'];
        $driverName = $_POST['name'];
        $mobile = $_POST['mobile'];

        // Insert data into 'drivers' table
        $sql_drivers = "INSERT INTO drivers (fare_id, driver_name, mobile)
                        VALUES ('$fareId', '$driverName', '$mobile')";

        if ($conn->query($sql_drivers) === TRUE) {
            echo "Data inserted into 'drivers' table successfully.";
        } else {
            echo "Error inserting data into 'drivers' table: " . $conn->error;
        }
    }
}

$conn->close();
?>
