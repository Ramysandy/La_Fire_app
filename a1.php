<?php
include 'config.php';

$sql = "SELECT item_category, SUM(item_value) as total_value, COUNT(*) as count 
        FROM inventory 
        GROUP BY item_category";

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            "category" => $row["item_category"],
            "value" => floatval($row["total_value"]),
            "count" => intval($row["count"])
        );
    }
}

echo json_encode($data);

$conn->close();
?>
