<?php
session_start();
if (isset($_POST["id"])) {
  $_SESSION["historyId"] = $_POST["id"];
}

echo "success";
