<?php include 'dbConnection.php'; ?>

<?php include 'head.php'; ?>

<?php
// Retrieve places data from the database
$sql = "SELECT * FROM places";
$result = $conn->query($sql);

// Check if places data exists
if ($result->num_rows > 0) {
    echo "<h2>Places List</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Place Name</th>";
    echo "<th>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    // Loop through each place entry
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['place_name'] . "</td>";
        echo "<td>";
        
        // Edit button
        echo "<a href='edit_place.php?id=" . $row['id'] . "'>Edit</a> ";
        
        // Delete button
        echo "<a href='delete_place.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this place?\")'>Delete</a>";
        
        echo "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
    
    // Free the result set
    $result->free();
} else {
    echo "No places found.";
}

$conn->close();
?>

<!-- Add a button for creating a new place -->
<a href="create_place.php">Add New Place</a>
