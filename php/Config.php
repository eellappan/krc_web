<?php
$con = mysqli_connect('182.50.135.67', 'SUuser', 'Su@12345');
$db = mysqli_select_db($con,'KRC');

if (!$con) {
    die ('Connection error');
}
 	

if (!$db) {
	die ('Database can\'t be created');
}
 
?>