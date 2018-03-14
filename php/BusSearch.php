<?php
ob_start();
include 'Config.php';
if (is_ajax()) {
    $citylist = array();
  if (isset($_POST["From"]) && !empty($_POST["From"]) && isset($_POST["To"]) && !empty($_POST["To"])) { //Checks if action value exists
    $citylist["from"] = $_POST["From"];
    $citylist["to"] = $_POST["To"];
    $return["json"] = json_encode($citylist);
    echo json_encode($return);
  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>