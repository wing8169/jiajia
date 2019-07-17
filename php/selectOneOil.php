<?php
session_start();
include("config.php");
// get oil data
$stmt = $conn->prepare("SELECT * FROM oil WHERE id=?;");
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id = $row['id'];
$nameChi = $row['nameChi'];
$nameEng = $row['nameEng'];
$NaOH = $row['NaOH'];
$KOH = $row['KOH'];
$INSsolid = $row['INSsolid'];
$INSliquid = $row['INSliquid'];
$price = $row['price'];
echo json_encode(array(
  "id" => $id,
  "nameChi" => $nameChi,
  "nameEng" => $nameEng,
  "NaOH" => $NaOH,
  "KOH" => $KOH,
  "INSsolid" => $INSsolid,
  "INSliquid" => $INSliquid,
  "price" => $price
));
