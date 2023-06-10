<?php include 'dbConnection.php'; ?>

<?php include 'head.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["place_id"]) && isset($_POST["place_name"])) {
    $placeId = $_POST["place_id"];
    $placeName = $_POST["place_name"];

    // Update the place in the database
    $sql = "UPDATE places SET place_name = '$placeName' WHERE id = $placeId";

    if ($conn->query($sql) === true) {
        echo "Place updated successfully.";
    } else {
        echo "Error updating place: " . $conn->error;
    }
}

$conn->close();
?>
