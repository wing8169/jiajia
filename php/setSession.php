<?php
session_start();
if (isset($_POST["type"]) && isset($_POST["data1"]) && isset($_POST["data2"])) {
  $_SESSION["type"] = $_POST["type"];
  $_SESSION["data1"] = $_POST["data1"];
  $_SESSION["data2"] = $_POST["data2"];
}

echo "success";
