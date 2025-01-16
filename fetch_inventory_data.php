<?php
// fetch_inventory_data.php

// Include the database configuration file
include 'config.php';

// Fetch the data from the inventory table
$sql = "SELECT item_category FROM inventory";
$result = $conn->query($sql);

$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['item_category'];  // Store the item categories
    }
}

echo json_encode($categories);  // Return categories as JSON

// Close the database connection
$conn->close();
?>
