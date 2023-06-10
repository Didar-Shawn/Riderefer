<?php
include 'search.php';
include 'dbConnection.php';

function searchFares($conn, $fromPlaceId, $toPlaceId, $vehicleCategoryId, $transportationTypeId)
{
    // Construct the SQL query for fares table based on the search parameters
    $sql_fares = "SELECT f.*, p1.place_name AS from_place, p2.place_name AS to_place, vc.category_name, tt.type_name
            FROM fares f
            INNER JOIN places p1 ON f.from_place_id = p1.id
            INNER JOIN places p2 ON f.to_place_id = p2.id
            INNER JOIN vehicle_category vc ON f.vehicle_category_id = vc.id
            INNER JOIN transport_type tt ON f.transport_type_id = tt.id
            WHERE 1 = 1";

    if (!empty($fromPlaceId)) {
        $sql_fares .= " AND f.from_place_id = $fromPlaceId";
    }

    if (!empty($toPlaceId)) {
        $sql_fares .= " AND f.to_place_id = $toPlaceId";
    }

    if (!empty($vehicleCategoryId)) {
        $sql_fares .= " AND f.vehicle_category_id = $vehicleCategoryId";
    }

    if (!empty($transportationTypeId)) {
        $sql_fares .= " AND f.transport_type_id = $transportationTypeId";
    }

    // Execute the query for fares table
    $result_fares = $conn->query($sql_fares);

    if ($result_fares && $result_fares->num_rows > 0) {
        // Output the search results from fares table
        while ($row = $result_fares->fetch_assoc()) {
            echo "<hr>" . "From: " . $row["from_place"] . "<br>";
            echo "To: " . $row["to_place"] . "<br>";
            echo "Fare: " . $row["fare"] . "<br>";
            echo "Vehicle Category: " . $row["category_name"] . "<br>";
            echo "Transportation Type: " . $row["type_name"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "<hr>" . "No results found for fares table.";
    }
}

function searchDrivers($conn, $fromPlaceId, $toPlaceId, $vehicleCategoryId, $transportationTypeId)
{
    $sql_drivers = "SELECT d.*, f.from_place_id, f.to_place_id
            FROM drivers d
            INNER JOIN fares f ON d.fare_id = f.id
            WHERE f.from_place_id = '$fromPlaceId'
            AND f.to_place_id = '$toPlaceId'
            AND f.vehicle_category_id = '$vehicleCategoryId'
            AND f.transport_type_id = '$transportationTypeId'";

    $result_drivers = $conn->query($sql_drivers);

    if ($result_drivers && $result_drivers->num_rows > 0) {
        while ($row = $result_drivers->fetch_assoc()) {
            echo "<hr>" . "Driver Name: " . $row["driver_name"] . "<br>";
            echo "Mobile: " . $row["mobile"] . "<br>";
            // echo "From: " . $row["from_place_id"] . "<br>";
            // echo "To: " . $row["to_place_id"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "<hr>" . "No results found for drivers table.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["form_type"]) && $_GET["form_type"] == "search") {
    $fromPlaceId = $_GET["from_place_id"];
    $toPlaceId = $_GET["to_place_id"];
    $vehicleCategoryId = $_GET["vehicle_category_id"];
    $transportationTypeId = $_GET["transportation_type_id"];
    
    searchFares($conn, $fromPlaceId, $toPlaceId, $vehicleCategoryId, $transportationTypeId);
    searchDrivers($conn, $fromPlaceId, $toPlaceId, $vehicleCategoryId, $transportationTypeId);
} else {
    echo "Invalid request.";
}

$conn->close();
?>
