<?php
ob_start();
include 'Config.php';
if (is_ajax()) {
    $citylist = array();
  if (isset($_POST["board_point"]) && !empty($_POST["board_point"]) && isset($_POST["drop_point"]) && !empty($_POST["drop_point"])) { //Checks if action value exists
        $sql = "SELECT  `board_point` ,  `drop_point` ,  `RouteId` ,  `Price` 
		FROM  `Route` 
		WHERE  `board_point` = '".$_POST["board_point"]."'
		AND  `drop_point` =  '".$_POST["drop_point"]."'";
      	 $result = mysqli_query($con, $sql) or die("MySQL error: " . mysqli_error($dbc) . "<hr>\nQuery: $query");  
		while($row = mysqli_fetch_array($result))
		 {
			 $citylist[] = $row;
		 }
		 $citylist["datej_picker"] =$_POST["datej_picker"];
    echo json_encode($citylist);
  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>