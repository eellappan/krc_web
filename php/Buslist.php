<?php
ob_start();
include 'Config.php';
$sql = 'SELECT `FromPlace`,`ToPlace` FROM `Route` WHERE `IsActive`=1';
$result = mysql_query($sql);
$citylist = array();
while($row = mysql_fetch_assoc($result))
 {
      $citylist[] = $row; 
 }
echo json_encode($citylist);
?>