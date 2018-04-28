<?php
require_once("dbcontroller.php");
class Route {

    public function GetSelectedBus()
    {
        $selected_bus = array();
        if(isset($_GET['board_point']) && $_GET['drop_point'])
        {
            $boardPoint = $_GET['board_point'];
            $dropPoint = $_GET['drop_point'];
	        $query = "SELECT * FROM Route WHERE  `board_point` =  '".$boardPoint."' AND  `drop_point` =  '".$dropPoint."'";
        }   
        $dbcontroller = new DBController();
		$this->selected_bus = $dbcontroller->executeSelectQuery($query);
		return $this->selected_bus;
    }

   public function filters()
   {
    $bus_details = array();
    $bp_details = array();
    $dp_details = array();
    $bus_name = array();
    $dbcontroller = new DBController();
    $filter = array();
    if(isset($_GET['board_point']) && $_GET['drop_point'])
    {
        $boardPoint = $_GET['board_point'];
        $dropPoint = $_GET['drop_point'];
        $busInfo =    "SELECT bm.BusId, bm.BusName, bm.BusType, bm.Amenities
                          FROM Route r
                          JOIN BusManagement bm ON bm.BusId = r.BusId
                          WHERE r.board_point =  '".$boardPoint."'
                          AND r.drop_point =  '".$dropPoint."'";
         $bus_details=  $dbcontroller->executeSelectQuery($busInfo);

         $busName = "SELECT BusName AS bus 
                               FROM BusManagement 
                               WHERE BusId IN (SELECT BusId
                                                FROM Route
                                                WHERE board_point =  '".$boardPoint."'
                                                 AND  drop_point =  '".$dropPoint."')";
     
        $bus_name = $dbcontroller->executeSelectQuery($busName);
        $filter["bus_names"] = json_encode($bus_name);
        
        $busType = "SELECT DISTINCT BusType AS bus_type 
                        FROM BusManagement 
                        WHERE BusId IN (SELECT BusId
                                        FROM Route
                                        WHERE board_point =  '".$boardPoint."'
                                        AND  drop_point =  '".$dropPoint."')";

        $bus_type = $dbcontroller->executeSelectQuery($busType);
        $filter["bus_types"] =json_encode($bus_type);

         $str .= "[";
         $bustype = array();
        foreach($dbcontroller->executeSelectQuery($busInfo) as $row)
        {
           $str1 = $row["Amenities"] .=",";
           $str .= $str1;
        }
       $str.="]";
       $filter["Amenities"]  = json_encode($str);
     
        $bPointInfo = "SELECT NewBoardingPoint AS bpoints
                            FROM BoardingPoint
                            WHERE BusId IN (SELECT BusId
                                                FROM Route
                                                WHERE board_point =  '".$boardPoint."'
                                                 AND  drop_point =  '".$dropPoint."')";
       $bp_details = $dbcontroller->executeSelectQuery($bPointInfo);
       $filter["pointss"] = str_replace("\""," ",json_encode($bp_details));

       $dPointInfo = "SELECT NewDroppingPoint AS Stop
                            FROM DropPoint
                            WHERE BusId IN (SELECT BusId
                                                  FROM Route
                                                  WHERE board_point =  '".$boardPoint."'
                                                  AND  drop_point =  '".$dropPoint."')";
        $dp_details = $dbcontroller->executeSelectQuery($dPointInfo);
        $filter["Stoppoint"] = json_encode($dp_details);
        //echo json_encode($filter);
    }
    return $filter;//$this->filter;
   }
   
   public function GetSelectedBusSeatDetails()
   {
    $selected_bus = array();
    if(isset($_GET['board_point']) && $_GET['drop_point'] && $_GET['route_id'])
    {
        $boardPoint = $_GET['board_point'];
        $dropPoint = $_GET['drop_point'];
        $routeId = $_GET['route_id'];
        $query = "SELECT * FROM Route WHERE  `board_point` =  '".$boardPoint."' AND  `drop_point` =  '".$dropPoint."'";
    }   
    $dbcontroller = new DBController();
    $this->selected_bus = $dbcontroller->executeSelectQuery($query);
    return $this->selected_bus;
   }
   

}

?>