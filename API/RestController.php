<?php
require_once("RestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services
URL mapping
*/


	switch($page_key){

		case "select":
			// to handle REST Url /route/select_bus/
			$routeRestHandler = new RestHandler();
			$result = $routeRestHandler->Select_Bus();
			break;
		case "filter":
			// to handle REST Url /route/FilterBy/
			$routeRestHandler = new RestHandler();
			$result = $routeRestHandler->FilterBy();
			break;
		case "create":
			// to handle REST Url /mobile/create/
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->add();
		break;
		
		case "delete":
			// to handle REST Url /mobile/delete/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$result = $mobileRestHandler->deleteMobileById();
		break;
		
		case "update":
			// to handle REST Url /mobile/update/<row_id>
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->editMobileById();
		break;
}
?>
