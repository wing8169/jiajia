<?php
session_start();
include("config.php");
// remove oil based on ID
$stmt = $conn->prepare("DELETE FROM additives WHERE id=?;");
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$stmt->close();
// send success message
echo json_encode(array(
  "status" => "success",
  "msg" => "Additive Removed!"
));
