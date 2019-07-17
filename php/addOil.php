<?php

session_start();
include("config.php");
if (isset($_POST['oilChi']) && isset($_POST['oilEng']) && isset($_POST['naoh']) && isset($_POST['koh']) && isset($_POST['insSolid']) && isset($_POST['insLiquid']) && isset($_POST['cost'])) {
  // check if oil exist in database
  $stmt = $conn->prepare("SELECT COUNT(*) as counter FROM oil WHERE nameEng=? AND nameChi=?;");
  $stmt->bind_param("ss", $_POST['oilEng'], $_POST['oilChi']);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $stmt->close();
  if ($row["counter"] != 0) {
    // update oil from database
    $stmt = $conn->prepare("UPDATE oil SET NaOH=?, KOH=?, INSsolid=?, INSliquid=?, price=? WHERE nameEng=? AND nameChi=?;");
    $stmt->bind_param("ddiidss", $_POST['naoh'], $_POST['koh'], $_POST['insSolid'], $_POST['insLiquid'], $_POST['cost'], $_POST['oilEng'], $_POST['oilChi']);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    // send success message
    echo json_encode(array(
      "status" => "success",
      "msg" => "Oil Updated!"
    ));
  } else {
    // insert oil into database
    $stmt = $conn->prepare("INSERT INTO oil(nameChi, nameEng, NaOH, KOH, INSsolid, INSliquid, price) VALUES (?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_param("ssddiid", $_POST['oilChi'], $_POST['oilEng'], $_POST['naoh'], $_POST['koh'], $_POST['insSolid'], $_POST['insLiquid'], $_POST['cost']);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    // send success message
    echo json_encode(array(
      "status" => "success",
      "msg" => "New Oil Added!"
    ));
  }
} else {
  // send fail message
  echo json_encode(array(
    "status" => "fail",
    "msg" => "Data is invalid."
  ));
}
