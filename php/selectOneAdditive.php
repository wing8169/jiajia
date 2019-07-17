<?php
session_start();
include("config.php");
// get additive data
$stmt = $conn->prepare("SELECT * FROM additives WHERE id=?;");
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id = $row['id'];
$nameChi = $row['nameChi'];
$nameEng = $row['nameEng'];
$price = $row['price'];
$amount = $row['amount'];
echo json_encode(array(
  "id" => $id,
  "nameChi" => $nameChi,
  "nameEng" => $nameEng,
  "price" => $price,
  "amount" => $amount,
));
