<?php

class Destination extends CI_Controller {
	
	public function index(){
		$sql="SELECT dest_list.lat, dest_list.lng from dest_list,curr_dest WHERE destination_id=dest_list.id and vehicle_id=1";
        $query = $this->db->query($sql);
        $result = $query->result();
        foreach($result as $row) {
              echo $row->lat.",".$row->lng;
        }
	}
}
