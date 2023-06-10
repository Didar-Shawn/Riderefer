<?php include 'dbConnection.php'; ?>
<?php include 'input_master.php'; ?>
<?php
// search_input.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['input'])) {
        // Handle input functionality
        $place_name = $_POST['place_name'];
        $category_name = $_POST['category_name'];
        $type_name = $_POST['type_name'];

        if (!empty($place_name)) {
            $sql_places = "INSERT INTO places (place_name) VALUES ('$place_name')";
            if ($conn->query($sql_places) === TRUE) {
                echo "Data inserted into 'places' table successfully. ";
            } else {
                echo "Error inserting data into 'places' table: " . $conn->error;
            }
        }

        if (!empty($category_name)) {
            $sql_vehicle_category = "INSERT INTO vehicle_category (category_name) VALUES ('$category_name')";
            if ($conn->query($sql_vehicle_category) === TRUE) {
                echo "Data inserted into 'vehicle_category' table successfully. ";
            } else {
                echo "Error inserting data into 'vehicle_category' table: " . $conn->error;
            }
        }

        if (!empty($type_name)) {
            $sql_transport_type = "INSERT INTO transport_type (type_name) VALUES ('$type_name')";
            if ($conn->query($sql_transport_type) === TRUE) {
                echo "Data inserted into 'transport_type' table successfully. ";
            } else {
                echo "Error inserting data into 'transport_type' table: " . $conn->error;
            }
        }
    }
}

$conn->close();
?>
