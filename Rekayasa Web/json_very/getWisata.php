<?php
$connect = mysqli_connect("local-mysql", "root", "new_strong_password", "json");
$sql = "SELECT * FROM wisata";
$result = mysqli_query($connect, $sql);
$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}
echo json_encode($json_array);
