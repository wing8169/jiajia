<?php
include("config.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
if (isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["mode"]) && isset($_POST["oilAmount"]) && isset($_POST["waterScale"]) && isset($_POST["timeMade"]) && isset($_POST["imgPath"]) && isset($_POST["selectedOil"]) && isset($_POST["selectedAdditives"])) {
  // decode selectedOil and selectedAdditives
  $selectedOil = json_decode($_POST["selectedOil"], true);
  $selectedAdditives = json_decode($_POST["selectedAdditives"], true);
  // insert history into database
  $stmt = $conn->prepare("INSERT INTO history(name, description, mode, oilAmount, waterScale, timeMade, imgPath) VALUES (?, ?, ?, ?, ?, ?, ?);");
  $dateTime = date('Y-m-d H:i:s');
  echo $dateTime;
  $stmt->bind_param("sssddss", $_POST['name'], $_POST['description'], $_POST['mode'], $_POST['oilAmount'], $_POST['waterScale'], $dateTime, $_POST['imgPath']);
  $stmt->execute();
  // get id
  $id = $stmt->insert_id;
  $stmt->close();
  // generate encoded image
  $imgPath = "images/" . preg_replace('/[^A-Za-z0-9]/', '', password_hash($id, PASSWORD_DEFAULT)) . "." . $_POST["imgPath"];
  copy("../images/tmp." . $_POST["imgPath"], "../" . $imgPath);
  // update image in database
  $stmt = $conn->prepare("UPDATE history SET imgPath=? WHERE id=?;");
  $stmt->bind_param("si", $imgPath, $id);
  $stmt->execute();
  $stmt->close();
  // add oil history
  foreach ($selectedOil as $oil) {
    // insert oil into history
    $stmt = $conn->prepare("INSERT INTO historyoil(historyId, oilId, pct) VALUES (?, ?, ?);");
    $stmt->bind_param("iid", $id, $oil['id'], $oil['pct']);
    $stmt->execute();
  }
  // add additives history
  foreach ($selectedAdditives as $add) {
    // insert additive into history
    $stmt = $conn->prepare("INSERT INTO historyadditives(historyId, additiveId, amount) VALUES (?, ?, ?);");
    $stmt->bind_param("iid", $id, $add['id'], $add['amount']);
    $stmt->execute();
  }
  // send success message
  echo json_encode(array(
    "status" => "success",
    "msg" => "New History Added!"
  ));
}
