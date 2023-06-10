<?php include 'dbConnection.php'; ?>
<?php include 'head.php'; ?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form_type"]) && $_POST["form_type"] === "input_fare") {
    // Retrieve form data
    $fromPlaceId = $_POST["from_place_id"];
    $toPlaceId = $_POST["to_place_id"];
    $vehicleCategoryId = $_POST["vehicle_category_id"];
    $transportationTypeId = $_POST["transport_type_id"];
    $fare = $_POST["fare"];

    // Validate form data (you can add additional validation if needed)

    // Insert fare data into the database
    $sql = "INSERT INTO fares (from_place_id, to_place_id, vehicle_category_id, transport_type_id, fare) 
            VALUES ('$fromPlaceId', '$toPlaceId', '$vehicleCategoryId', '$transportationTypeId', '$fare')";
    
    if ($conn->query($sql) === true) {
        echo "Fare data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
