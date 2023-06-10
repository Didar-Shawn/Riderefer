<?php include 'dbConnection.php'; ?>

<?php include 'head.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $placeId = $_GET["id"];

    // Retrieve place data based on the given placeId
    $sql = "SELECT * FROM places WHERE id = $placeId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $place = $result->fetch_assoc();

        // Display a form to edit the place
        echo "<h2>Edit Place</h2>";
        echo "<form action='update_place.php' method='POST'>";
        echo "<input type='hidden' name='place_id' value='" . $place['id'] . "'>";
        echo "<label for='place_name'>Place Name:</label>";
        echo "<input type='text' name='place_name' id='place_name' value='" . $place['place_name'] . "' required>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Place not found.";
    }

    $result->free();
}

$conn->close();
?>
