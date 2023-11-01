<?php
session_start();
require_once "db_functions.php";
$conn = connectDB();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $validator = test_input($_POST['validator']);
    $buyPrice = test_input($_POST['buy_price']);
    $sellPrice = test_input($_POST['sell_price']);
    $notes = test_input($_POST['notes']);
    
    $stmt = $conn->query("SELECT email, podio_link FROM survey_tokens WHERE token = '" . $validator. "'");
	$res = $stmt->fetch();
    
    $query = $conn->prepare("INSERT INTO survey (podio_link, email, buyPrice, sellPrice, notes) VALUES (:podio_link, :email, :buyPrice, :sellPrice, :notes)");

    $query->execute([
        "podio_link" => $res['podio_link'],
        "email" => $res['email'],
        "buyPrice" => $buyPrice,
        "sellPrice" => $sellPrice,
        "notes" => $notes
    ]);
    
}

header('location: survey.php');

$conn = null;
