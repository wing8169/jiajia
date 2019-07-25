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
// process data to become 2D array
$newData = [];
foreach ($data as $d) {
  array_push($newData, [$d["id"], $d["nameChi"], $d["nameEng"], $d["NaOH"], $d["KOH"], $d["INSsolid"], $d["INSliquid"], $d["price"]]);
}

return $newData;
