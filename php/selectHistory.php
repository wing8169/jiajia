<?php
session_start();
include("config.php");
// get history data from history table
$stmt = $conn->prepare("SELECT * FROM history ORDER BY timeMade DESC;");
$stmt->execute();
$result = $stmt->get_result();
$data = array();
while ($row = $result->fetch_assoc()) {
  $id = $row['id'];
  $name = $row['name'];
  $description = $row['description'];
  $mode = $row['mode'];
  $oilAmount = $row['oilAmount'];
  $waterScale = $row['waterScale'];
  $timeMade = $row['timeMade'];
  $imgPath = $row['imgPath'];
  // get history oil from historyoil table
  $stmt2 = $conn->prepare("SELECT oilId, pct FROM historyoil WHERE historyId=?;");
  $stmt2->bind_param("i", $id);
  $stmt2->execute();
  $result2 = $stmt2->get_result();
  $data2 = array();
  while ($row2 = $result2->fetch_assoc()) {
    $oilId = $row2['oilId'];
    $pct = $row2['pct'];
    array_push($data2, array(
      "id" => $oilId,
      "pct" => $pct,
    ));
  }
  // get history additives from historyadditives table
  $stmt3 = $conn->prepare("SELECT additiveId, amount FROM historyadditives WHERE historyId=?;");
  $stmt3->bind_param("i", $id);
  $stmt3->execute();
  $result3 = $stmt3->get_result();
  $data3 = array();
  while ($row3 = $result3->fetch_assoc()) {
    $additiveId = $row3['additiveId'];
    $amount = $row3['amount'];
    array_push($data3, array(
      "id" => $additiveId,
      "amount" => $amount,
    ));
  }
  // push all data together
  array_push($data, array(
    "id" => $id,
    "name" => $name,
    "description" => $description,
    "mode" => $mode,
    "oilAmount" => $oilAmount,
    "waterScale" => $waterScale,
    "timeMade" => $timeMade,
    "imgPath" => $imgPath,
    "selectedOil" => $data2,
    "selectedAdditives" => $data3,
  ));
}
echo json_encode($data);
