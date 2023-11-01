<?php 
require_once "db_functions.php";
$conn = connectDB();
$link = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $link = $_POST['link'];
  
    $sql = "Select s.*, u.lastname, u.firstname from survey as s inner join users as u on u.email = s.email where podio_link = '".$link."'";
    $result = $conn->query($sql);
    $rows = $result->fetchAll();
    echo json_encode($rows);
}


?>