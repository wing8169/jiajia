<?php

session_start();
include("config.php");
if (isset($_POST['additiveChi']) && isset($_POST['additiveEng']) && isset($_POST['additiveCost']) && isset($_POST['additiveAmnt'])) {
  // check if additive exist in database
  $stmt = $conn->prepare("SELECT COUNT(*) as counter FROM additives WHERE nameEng=? AND nameChi=?;");
  $stmt->bind_param("ss", $_POST['additiveEng'], $_POST['additiveChi']);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $stmt->close();
  if ($row["counter"] != 0) {
    // update additive from database
    $stmt = $conn->prepare("UPDATE additives SET price=?, amount=? WHERE nameEng=? AND nameChi=?;");
    $stmt->bind_param("ddss", $_POST['additiveCost'], $_POST['additiveAmnt'], $_POST['additiveEng'], $_POST['additiveChi']);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    // send success message
    echo json_encode(array(
      "status" => "success",
      "msg" => "Additive Updated!"
    ));
  } else {
    // insert additive into database
    $stmt = $conn->prepare("INSERT INTO additives(nameChi, nameEng, price, amount) VALUES (?, ?, ?, ?);");
    $stmt->bind_param("ssdd", $_POST['additiveChi'], $_POST['additiveEng'], $_POST['additiveCost'], $_POST['additiveAmnt']);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    // send success message
    echo json_encode(array(
      "status" => "success",
      "msg" => "New Additive Added!"
    ));
  }
} else {
  // send fail message
  echo json_encode(array(
    "status" => "fail",
    "msg" => "Data is invalid."
  ));
}
