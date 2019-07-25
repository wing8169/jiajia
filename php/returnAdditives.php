<?php
include("config.php");
// get all additives data
$stmt = $conn->prepare("SELECT * FROM additives ORDER BY nameEng;");
$stmt->execute();
$result = $stmt->get_result();
$data = array();
while ($row = $result->fetch_assoc()) {
  $id = $row['id'];
  $nameChi = $row['nameChi'];
  $nameEng = $row['nameEng'];
  $price = $row['price'];
  $amount = $row['amount'];
  array_push($data, array(
    "id" => $id,
    "nameChi" => $nameChi,
    "nameEng" => $nameEng,
    "price" => $price,
    "amount" => $amount,
  ));
}
// process data to become 2D array
$newData = [];
foreach ($data as $d) {
  array_push($newData, [$d["id"], $d["nameChi"], $d["nameEng"], $d["price"], $d["amount"]]);
}

return $newData;
