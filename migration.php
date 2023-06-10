<?php
// migration.php

$servername = "localhost";
$username = "root";
$password = "";

// Connect to MySQL server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'transportation' database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS transportation";

if ($conn->query($sql_create_db) === TRUE) {
    echo "Database 'transportation' created successfully. ";
} else {
    echo "Error creating database: " . $conn->error;
}

// Close the connection
$conn->close();

// Connect to the 'transportation' database
$dbname = "transportation";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create 'places' table if not exists
$sql_places = "CREATE TABLE IF NOT EXISTS places (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    place_name VARCHAR(255)
)";

if ($conn->query($sql_places) === TRUE) {
    echo "Table 'places' created successfully. ";
} else {
    echo "Error creating table 'places': " . $conn->error;
}

// Create 'fares' table if not exists
$sql_fares = "CREATE TABLE IF NOT EXISTS fares (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    from_place_id INT(11),
    to_place_id INT(11),
    fare DECIMAL(10, 2),
    vehicle_category_id INT(11),
    transport_type_id INT(11)
)";

if ($conn->query($sql_fares) === TRUE) {
    echo "Table 'fares' created successfully. ";
} else {
    echo "Error creating table 'fares': " . $conn->error;
}

// Create 'drivers' table if not exists
$sql_drivers = "CREATE TABLE IF NOT EXISTS drivers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    fare_id INT(11),
    driver_name VARCHAR(255),
    mobile VARCHAR(20)
)";

if ($conn->query($sql_drivers) === TRUE) {
    echo "Table 'drivers' created successfully. ";
} else {
    echo "Error creating table 'drivers': " . $conn->error;
}

// Create 'vehicle_category' table if not exists
$sql_vehicle_category = "CREATE TABLE IF NOT EXISTS vehicle_category (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255)
)";

if ($conn->query($sql_vehicle_category) === TRUE) {
    echo "Table 'vehicle_category' created successfully. ";
} else {
    echo "Error creating table 'vehicle_category': " . $conn->error;
}

// Create 'transport_type' table if not exists
$sql_transport_type = "CREATE TABLE IF NOT EXISTS transport_type (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(255)
)";

if ($conn->query($sql_transport_type) === TRUE) {
    echo "Table 'transport_type' created successfully. ";
} else {
    echo "Error creating table 'transport_type': " . $conn->error;
}

$conn->close();
?>
<?php
// Redirect to another page
header("Location: http://localhost/project/search.php");
exit;
?>
