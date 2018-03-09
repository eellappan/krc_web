<?php
$con = mysql_connect('182.50.135.67', 'SUuser', 'Su@12345');
$db = mysql_select_db('dmuser');

if (!$con) {
    die ('Connection error');
}
 	

if (!$db) {
	die ('Database can\'t be created');
}
 
?>