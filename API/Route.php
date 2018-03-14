<?php
require_once("dbcontroller.php");
class Route {
    private $selected_bus = array();

    public function GetSelectedBus()
    {
        if(isset($_GET['board_point']) && isset($_GET['drop_point']))
        {
            $boardPoint = $_GET['board_point'];
            $dropPoint = $_GET['drop_point'];
			$query = 'SELECT * FROM Route WHERE board_point = '.$boardPoint.'';
        }
        $dbcontroller = new DBController();
		$this->selected_bus = $dbcontroller->executeSelectQuery($query);
		return $this->selected_bus;
    }
}
?>