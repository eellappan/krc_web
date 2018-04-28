<?php
require_once("SimpleRest.php");
require_once("Route.php");
$jstr ="";

class RestHandler extends SimpleRest {

	function Select_Bus() {	
$businfo =array( array('bus_id' => 1,
				  'totel_seat' => 10,
				  'layout' => '{\'0\':[{\'bus\':0,\'type\':\'seater\',\'seat_no\':\'A1\'},{\'bus\':1,\'type\':\'seater\',\'seat_no\':\'A2\'},{\'bus\':2,\'type\':\'seater\',\'seat_no\':\'A3\'},{\'bus\':3,\'type\':\'seater\',\'seat_no\':\'A4\'},{\'bus\':4,\'type\':\'seater\',\'seat_no\':\'A5\'}],\'1\':[{\'bus\':5,\'type\':\'seater\',\'seat_no\':\'B1\'},{\'bus\':6,\'type\':\'seater\',\'seat_no\':\'B2\'},{\'bus\':7,\'type\':\'seater\',\'seat_no\':\'B3\'},{\'bus\':8,\'type\':\'seater\',\'seat_no\':\'B4\'},{\'bus\':9,\'type\':\'seater\',\'seat_no\':\'B5\'}],\'2\':[],\'3\':[],\'4\':[]}',
				  'route_id' =>1,
				  'bus_name' => 'ADVENTURE',
					'board_point' => 'chennai',
					'drop_point' => 'madurai',
					'fare' => 350,
					'board_time' => '04:00 AM',
					'drop_time' => '04:00 PM',
					'bus_type' => 'Non AC',
					'cancel_time' => null,
					'percentage' => null,
					'flat' => null,
					'type' => null,
					'points' => '',
					'droppoints' => '',
					'gallery' => [],
					'amenities' => ['Snacks'],
					'AvgPrice' => null,
					'existseat' => '',
					'bus_quality' => null,
					'punctuality' => null,
					'Staff_behaviour' => null,
					'Dpoints' => array(
						 array(
							"time" => "02:15 PM",
							"dplace" => "Kuchiung Sentrakl",
							"landmark" => "GG",
							"address" => "GG,123",
							"board_id" => "121"
						 ),
						 array(
							"time" => "02:16 PM",
							"dplace" => "sed Sentrakl",
							"landmark" => "GG",
							"address" => "GG,123",
							"board_id" => "121"
						 )
					),
					'seat_layout' => array(
						array(
							array(
							'bus' => 0,
							'type' => 'lseater',
							'seat_no' => 'A1',
							'status'=> 'false'
							),
							array(
							'bus' => 1,
							'type' => 'lseater',
							'seat_no' => 'A2',
							'status' => 'false'
							),
							array(
							'bus' => 2,
							'type' => 'seater',
							'seat_no' => 'A3',
							'status' => 'false'
							), array(
							'bus' => 3,
							'type' => 'seater',
							'seat_no' => 'A4',
							'status' => 'false'
							), array (
							'bus' => 4,
							'type' => 'seater',
							'seat_no' => 'A5',
							'status' => 'false'
							),array (
								'bus' => 5,
								'type' => 'seater',
								'seat_no' => 'A6',
								'status' => 'false'
							),array (
								'bus' => 6,
								'type' => 'seater',
								'seat_no' => 'A7',
								'status' => 'true'
							),array (
								'bus' => 7,
								'type' => 'seater',
								'seat_no' => 'A8',
								'status' => 'false'
							),array (
								'bus' => 8,
								'type' => 'seater',
								'seat_no' => 'A9',
								'status' => 'false'
							),array (
								'bus' => 9,
								'type' => 'seater',
								'seat_no' => 'A10',
								'status' => 'true'
							),array (
								'bus' => 10,
								'type' => 'seater',
								'seat_no' => 'A11',
								'status' => 'false'
							),array (
								'bus' => 11,
								'type' => 'seater',
								'seat_no' => 'A12',
								'status' => 'false'
							)
						),
					    array(
							array(
							'bus' => 12,
							'type' => 'lseater',
							'seat_no' => 'B1',
							'status' => 'false'
							), array(
							'bus' => 13,
							'type' => 'lseater',
							'seat_no' => 'B2',
							'status' => 'false'
							), array(
							'bus' => 14,
							'type' => 'seater',
							'seat_no' => 'B3',
							'status' => 'false'
							), array(
							'bus' => 16,
							'type' => 'seater',
							'seat_no' => 'B4',
							'status' => 'false'
							), array(
							'bus' => 17,
							'type' => 'seater',
							'seat_no' => 'B5',
							'status' => 'false'
							), array(
							'bus' => 18,
							'type' => 'seater',
							'seat_no' => 'B6',
							'status' => 'false'
							),array(
								'bus' => 19,
								'type' => 'seater',
								'seat_no' => 'B7',
								'status' => 'false'
							),array(
								'bus' => 20,
								'type' => 'seater',
								'seat_no' => 'B8',
								'status' => 'false'
							),array(
								'bus' => 21,
								'type' => 'seater',
								'seat_no' => 'B9',
								'status' => 'false'
							),array(
								'bus' => 22,
								'type' => 'seater',
								'seat_no' => 'B10',
								'status' => 'false'
							),array(
								'bus' => 23,
								'type' => 'seater',
								'seat_no' => 'B11',
								'status' => 'false'
							),array(
								'bus' => 24,
								'type' => 'seater',
								'seat_no' => 'B12',
								'status' => 'false'
								)
						),
							array(
								array(
								'bus' => 25,
								'type' => 'lseater',
								'seat_no' => 'C1',
								'status' => 'false'
								), array(
								'bus' => 26,
								'type' => 'lseater',
								'seat_no' => 'C2',
								'status' => 'false'
								), array(
								'bus' => 27,
								'type' => 'seater',
								'seat_no' => 'C3',
								'status' => 'false'
								), array(
								'bus' => 28,
								'type' => 'seater',
								'seat_no' => 'C4',
								'status' => 'false'
								), array(
								'bus' => 29,
								'type' => 'seater',
								'seat_no' => 'C5',
								'status' => 'false'
								),array(
									'bus' => 30,
									'type' => 'seater',
									'seat_no' => 'C6',
									'status' => 'false'
								),array(
									'bus' => 31,
									'type' => 'seater',
									'seat_no' => 'C7',
									'status' => 'true'
								),array(
									'bus' => 32,
									'type' => 'seater',
									'seat_no' => 'C8',
									'status' => 'false'
								),array(
									'bus' => 33,
									'type' => 'seater',
									'seat_no' => 'C9',
									'status' => 'false'
								),array(
									'bus' => 34,
									'type' => 'seater',
									'seat_no' => 'C10',
									'status' => 'true'
								),array(
									'bus' => 35,
									'type' => 'seater',
									'seat_no' => 'C11',
									'status' => 'false'
								),array(
									'bus' => 36,
									'type' => 'seater',
									'seat_no' => 'C12',
									'status' => 'false'
									)
							),
								array(
									array(
									'bus' => 37,
									'type' => 'lseater',
									'seat_no' => 'D1',
									'status' => 'false'
									), array(
									'bus' => 38,
									'type' => 'lseater',
									'seat_no' => 'D2',
									'status' => 'false'
									), array(
									'bus' => 39,
									'type' => 'seater',
									'seat_no' => 'D3',
									'status' => 'false'
									), array(
									'bus' => 40,
									'type' => 'seater',
									'seat_no' => 'D4',
									'status' => 'false'
									), array(
									'bus' => 41,
									'type' => 'seater',
									'seat_no' => 'D5',
									'status' => 'false'
									),array(
										'bus' => 42,
										'type' => 'seater',
										'seat_no' => 'D6',
										'status' => 'false'
									),array(
										'bus' => 43,
										'type' => 'seater',
										'seat_no' => 'D7',
										'status' => 'false'
									),array(
										'bus' => 44,
										'type' => 'seater',
										'seat_no' => 'D8',
										'status' => 'false'
									),array(
										'bus' => 45,
										'type' => 'seater',
										'seat_no' => 'D9',
										'status' => 'false'
									),array(
										'bus' => 46,
										'type' => 'seater',
										'seat_no' => 'D10',
										'status' => 'false'
									),array(
										'bus' => 47,
										'type' => 'seater',
										'seat_no' => 'D11',
										'status' => 'false'
									),array(
										'bus' => 48,
										'type' => 'seater',
										'seat_no' => 'D12',
										'status' => 'false'
										)
									)
						),
							'canceltime' => '0',
							'singleP' => array(),
							'Stoppoints' => array(),
							'singleD' => array(),
							'duration' => 12
					

	));	
	

     
		$roure = new Route();
		$rawData = $roure->GetSelectedBus();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["data"] = json_encode($businfo);//$rawData;
				
		//if(strpos($requestContentType,'application/json') !== false){
			$response =$this->encodeJson($result);
			echo json_encode($businfo);
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
		
		$result = $rawData;
				
		//if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
	}

	function ViewSeats() {

 $Seats = array( 
	        "0" => array(
				"bus_id" => "197",
				"bus_name"=> "Abc",
				"pickup_point" => "Gaibandha",
				"pickup_time" => "10:30 AM",
				"board_point" => "AB",
				"drop_point" => "CD",
				"fare" => "350",
				"board_time" => "09:15 AM",
				"drop_time" => "02:40 PM",
				"bus_type" => "mercedes",
				"points" => "Gaibandha<#>10:30 AM",
				"gallery" => ""
			),
           "Dpoints" => array(
							array(
								"time" => "09:15 PM",
								"dplace" => "Bhagwan Medical,Kaly"
							)
			),
		   "seat_layout" => array(
						  "0" =>array(
									array(
										"bus" => 0,
										"type" => "seater",
										"seat_no" => "A1"
									),
									array(
										"bus" => 1,
										"type" => "seater",
										"seat_no" => "A2"
									),
									array(
										"bus" => 2,
										"type" => "seater",
										"seat_no" => "A3"
									),
									array(
										"bus" => 3,
										"type" => "seater",
										"seat_no" => "A4"
									)
							  ),
						"1" => array(
									array(
										"bus" => 4,
										"type" => "seater",
										"seat_no" => "B1"
									),
									array(
										"bus" => 5,
										"type" => "seater",
										"seat_no" => "B2"
									),
									array(
										"bus" => 6,
										"type" => "seater",
										"seat_no" => "B3"
									),
									array(
										"bus" => 7,
										"type" => "seater",
										"seat_no" => "B4"
									)
							),
							"2" => array(
										array(
											"bus" => 8,
											"type" => "seater",
											"seat_no" => "C1"
										),
										array(
											"bus" => 9,
											"type" => "seater",
											"seat_no" => "C2"
										),
										array(
											"bus" => 10,
											"type" => "seater",
											"seat_no" => "C3"
										),
										array(
											"bus" => 11,
											"type" => "seater",
											"seat_no" => "C4"
										)
								),
								"3" => array(
											array(
												"bus" => 12,
												"type" => "seater",
												"seat_no" => "D1"
											),
											array(
												"bus" => 13,
												"type" => "seater",
												"seat_no" => "D2"
											),
											array(
												"bus" => 14,
												"type" => "seater",
												"seat_no" => "D3"
											),
											array(
												"bus" => 15,
												"type" => "seater",
												"seat_no" => "D4"
											)
									),
									"4" => array(
										array(
											"bus" => 16,
											"type" => "seater",
											"seat_no" => "E1"
										),
										array(
											"bus" => 17,
											"type" => "seater",
											"seat_no" => "E2"
										),
										array(
											"bus" => 18,
											"type" => "seater",
											"seat_no" => "E3"
										),
										array(
											"bus" => 19,
											"type" => "seater",
											"seat_no" => "E4"
										)
									)
				),
        "paypals" => array(
				"id" => "1",
				"title" => "TRUE BUS",
				"logo" => "assets\/uploads\/logo\/1522818781_tb-logo.png",
				"favicon" => "assets\/uploads\/favicons\/1522039295_favicon.png",
				"smtp_username" => "no-reply@techlabz.com",
				"smtp_host" => "mail.techlabz.in",
				"smtp_password" => "k4$_a4%eD?Hi",
				"sender_id" => "101",
				"sms_username" => "Trippin",
				"sms_password" => "676",
				"payment_option" => "PayPal,Cash",
				"paypal" => "https:\/\/www.sandbox.paypal.com\/cgi-bin\/webscr",
				"paypalid" => "shajeermhmmd@gmail.com",
				"app_key" => "my_key"
		)
 );

		$roure = new Route();
		$rawData = $roure->GetSelectedBus();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result = $rawData;
				
		//if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo json_encode($Seats);
	}
	   
	




	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
}
?>