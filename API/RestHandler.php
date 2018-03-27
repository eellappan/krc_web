<?php
require_once("SimpleRest.php");
require_once("Route.php");
$jstr ="[{
	'bus_id': '1',
	'totel_seat': '10',
	'layout': '{\'0\':[{\'bus\':0,\'type\':\'seater\',\'seat_no\':\'A1\'},{\'bus\':1,\'type\':\'seater\',\'seat_no\':\'A2\'},{\'bus\':2,\'type\':\'seater\',\'seat_no\':\'A3\'},{\'bus\':3,\'type\':\'seater\',\'seat_no\':\'A4\'},{\'bus\':4,\'type\':\'seater\',\'seat_no\':\'A5\'}],\'1\':[{\'bus\':5,\'type\':\'seater\',\'seat_no\':\'B1\'},{\'bus\':6,\'type\':\'seater\',\'seat_no\':\'B2\'},{\'bus\':7,\'type\':\'seater\',\'seat_no\':\'B3\'},{\'bus\':8,\'type\':\'seater\',\'seat_no\':\'B4\'},{\'bus\':9,\'type\':\'seater\',\'seat_no\':\'B5\'}],\'2\':[],\'3\':[],\'4\':[]}',
	'route_id': '1',
	'bus_name': 'ADVENTURE',
	'board_point': 'chennai',
	'drop_point': 'madurai',
	'fare': '350',
	'board_time': '04:00 AM',
	'drop_time': '04:00 PM',
	'bus_type': 'Non AC',
	'cancel_time': null,
	'percentage': null,
	'flat': null,
	'type': null,
	'points': '',
	'droppoints': '',
	'gallery': [],
	'amenities': ['Snacks'],
	'AvgPrice': null,
	'existseat': '',
	'bus_quality': null,
	'punctuality': null,
	'Staff_behaviour': null,
	'Dpoints': '',
	'seat_layout': [
		[{
			'bus': 0,
			'type': 'seater',
			'seat_no': 'A1',
			'status': 'false'
		}, {
			'bus': 1,
			'type': 'seater',
			'seat_no': 'A2',
			'status': 'false'
		}, {
			'bus': 2,
			'type': 'seater',
			'seat_no': 'A3',
			'status': 'false'
		}, {
			'bus': 3,
			'type': 'seater',
			'seat_no': 'A4',
			'status': 'false'
		}, {
			'bus': 4,
			'type': 'seater',
			'seat_no': 'A5',
			'status': 'false'
		}],
		[{
			'bus': 5,
			'type': 'seater',
			'seat_no': 'B1',
			'status': 'false'
		}, {
			'bus': 6,
			'type': 'seater',
			'seat_no': 'B2',
			'status': 'false'
		}, {
			'bus': 7,
			'type': 'seater',
			'seat_no': 'B3',
			'status': 'false'
		}, {
			'bus': 8,
			'type': 'seater',
			'seat_no': 'B4',
			'status': 'false'
		}, {
			'bus': 9,
			'type': 'seater',
			'seat_no': 'B5',
			'status': 'false'
		}],
		[],
		[],
		[]
	],
	'canceltime': '0',
	'singleP': [],
	'Stoppoints': [],
	'singleD': [],
	'duration': 12
}]";	
class RestHandler extends SimpleRest {

	function Select_Bus() {	

		$roure = new Route();
		$rawData = $jstr; //$roure->GetSelectedBus();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["data"] = $rawData;
				
		//if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		//}
	}
	
	function FilterBy()
	{
		$roure = new Route();
		$rawData = $roure->filters();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["data"] = $rawData;
				
		//if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
	}


	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
}
?>