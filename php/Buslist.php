<?php
ob_start();
include 'Config.php';
$sql = 'SELECT `board_point`,`drop_point` FROM `Route` WHERE `IsActive`=1';
$result = mysqli_query($con,$sql);
$citylist = array();
while($row = mysqli_fetch_assoc($result))
 {
      $citylist[] = $row; 
 }
echo json_encode($citylist);
?>