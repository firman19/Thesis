<?php

class GetGPS extends CI_Controller {
	
	public function getData($lat,$lng,$hdg){
                date_default_timezone_set("Asia/Jakarta");
                $date = date('Y-m-d H:i:s');
                $data = array(
                        'vehicle_id' => 1,
                        'lat' => $lat,
                        'lng' => $lng,
                        'hdg' => $hdg,
                        'time'=> $date
                );
                $this->db->insert('coordinate',$data);
	}
}
