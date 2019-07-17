<?php
session_start();
include("config.php");
// get all oil data
$stmt = $conn->prepare("SELECT * FROM oil ORDER BY nameEng;");
$stmt->execute();
$result = $stmt->get_result();
$data = array();
while ($row = $result->fetch_assoc()) {
  $id = $row['id'];
  $nameChi = $row['nameChi'];
  $nameEng = $row['nameEng'];
  $NaOH = $row['NaOH'];
  $KOH = $row['KOH'];
  $INSsolid = $row['INSsolid'];
  $INSliquid = $row['INSliquid'];
  $price = $row['price'];
  array_push($data, array(
    "id" => $id,
    "nameChi" => $nameChi,
    "nameEng" => $nameEng,
    "NaOH" => $NaOH,
    "KOH" => $KOH,
    "INSsolid" => $INSsolid,
    "INSliquid" => $INSliquid,
    "price" => $price
  ));
}
echo json_encode($data);
