<?php include 'dbConnection.php'; ?>

<?php include 'head.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $placeId = $_GET["id"];

    // Delete the place from the database
    $sql = "DELETE FROM places WHERE id = $placeId";

    if ($conn->query($sql) === true) {
        echo "Place deleted successfully.";
    } else {
        echo "Error deleting place: " . $conn->error;
    }
}

$conn->close();
?>
