<?php
include 'config.php';

$sql = "SELECT status, SUM(total_value) as total_value, COUNT(*) as count 
        FROM user_claims 
        GROUP BY status";

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            "status" => $row["status"],
            "value" => floatval($row["total_value"]),
            "count" => intval($row["count"])
        );
    }
}

echo json_encode($data);

$conn->close();
?>
