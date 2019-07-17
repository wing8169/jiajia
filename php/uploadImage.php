<?php
if (isset($_FILES[0]["tmp_name"])) {
  if ($_FILES[0]['type'] == 'image/jpeg') {
    copy($_FILES[0]['tmp_name'], '../images/tmp.jpeg');
    // send success message
    echo json_encode(array(
      "status" => "success",
      "msg" => "jpeg"
    ));
  } else if ($_FILES[0]['type'] == 'image/png') {
    copy($_FILES[0]['tmp_name'], '../images/tmp.png');
    // send success message
    echo json_encode(array(
      "status" => "success",
      "msg" => "png"
    ));
  } else {
    copy($_FILES[0]['tmp_name'], '../images/tmp.jpg');
    // send success message
    echo json_encode(array(
      "status" => "success",
      "msg" => "jpg"
    ));
  }
}
