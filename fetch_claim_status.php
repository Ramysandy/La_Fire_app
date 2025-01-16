<?php
// fetch_claim_status.php

// Include the database configuration file
include 'config.php';

// Fetch the data from the user_claims table, grouping by status
$sql = "SELECT status, COUNT(*) as count FROM user_claims GROUP BY status";
$result = $conn->query($sql);

$statusCounts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statusCounts[] = [
            'status' => $row['status'],
            'count' => (int)$row['count']
        ];
    }
}

echo json_encode($statusCounts);  // Return status counts as JSON

// Close the database connection
$conn->close();
?>
