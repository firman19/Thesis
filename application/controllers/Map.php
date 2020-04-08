<?php

class Map extends CI_Controller {
      function __construct(){
	     parent::__construct();		

           if($this->session->userdata('login') != true){
                  redirect(base_url("welcome"));
            }     

            $this->user_id = $this->session->userdata('user_id');
		$this->url=base_url();
		$this->res=base_url().'res/';
	}

	public function index(){
	     $page_css = array(
                  '<!-- Custom CSS -->',
                  '<link href="'.$this->res.'assets/extra-libs/c3/c3.min.css" rel="stylesheet" type="text/css" >',
			
                  // sweet alert
                  '<link href="'.$this->res.'assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">',
                  '<link href="'.$this->res.'dist/css/style.min.css" rel="stylesheet">',
                  
                  // leaflet css
                  // '<link rel="stylesheet" href="'.$this->res.'leaflet/leaflet-1.6.0.css" />',
                  '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
                  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
                  crossorigin=""/>',
                  
                  // context menu css
                  // '<link rel="stylesheet" href="'.$this->res.'dist/css/leaflet_contextmenu/leaflet.contextmenu.css"/>',
                  
                  // draw css
                  // '<link rel="stylesheet" href="'.$this->res.'dist/js/pages/leaflet/leaflet_draw/leaflet.css"/>',
                  // '<link rel="stylesheet" href="'.$this->res.'dist/js/pages/leaflet/leaflet_draw/src/leaflet.draw.css"/>',
                  
                  // sidebar css
                  '<link rel="stylesheet" href="'.$this->res.'leaflet/leaflet-sidebar-v2/css/leaflet-sidebar.css"/>',
                  
                  // date time pciker css
                  '<link href="'.$this->res.'dist/js/pages/datetime/bootstrap-datetimepicker.css" rel="stylesheet">',
                  
                  // playback css
                  '<link rel="stylesheet" href="'.$this->res.'leaflet/Leaflet.TrackPlayBack/dist/control.playback.css">'
            );

		$page_js = array(
			'<script src="'.$this->res.'dist/js/pages/datetime/moment.js"></script> </br>',
                  '<script src="'.$this->res.'dist/js/pages/datetime/collapse.js"></script> </br>',
                  '<script src="'.$this->res.'dist/js/pages/datetime/bootstrap.js"></script> </br>',
                  '<script src="'.$this->res.'dist/js/pages/datetime/bootstrap-datetimepicker.js"></script> </br>',
                  '<script src="'.$this->res.'dist/js/pages/datetime/script.js"></script> </br>',

			'<script src="'.$this->res.'leaflet/leaflet-1.6.0.js"></script>',

			'<!-- JSZIP -->',
                  // '<script src="'.$this->res.'dist/js/pages/leaflet/jszip.min.js"></script>',

                  '<!-- @tmcw/togeojson -->',
                  // '<script src="'.$this->res.'dist/js/pages/leaflet/togeojsons.min.js"></script>',

                  '<!-- geojson-vt -->',
                  // '<script src="'.$this->res.'dist/js/pages/leaflet/geojson-vt.js"></script>',

                  '<!-- Leaflet-SVG-Marker-Icon -->',
                  // '<script src="'.$this->res.'dist/js/pages/leaflet/svg-icon.js"></script>',

                  '<!-- Leaflet-Rotated-Marker -->',
                  // '<script src="'.$this->res.'dist/js/pages/leaflet/leaflet.rotatedMarker.js"></script>',

                  '<!-- Leaflet-Marker-SlideTo -->',
                  // '<script src="'.$this->res.'dist/js/pages/leaflet/Leaflet.Marker.SlideTo.js"></script>',

                   '<!-- Leaflet contextmenu -->',
                  // '<script src="'.$this->res.'dist/js/leaflet_contextmenu/leaflet.contextmenu.js"></script>',
                  // '<script src="'.$this->res.'dist/js/leaflet_contextmenu/Map.ContextMenu.js"></script>',
                  // '<script src="'.$this->res.'dist/js/leaflet_contextmenu/Mixin.ContextMenu.js"></script>',

			//leaflet Sidebar v2
                  '<script src="'.$this->res.'leaflet/leaflet-sidebar-v2/js/leaflet-sidebar.js"></script>',
			
                  // leaflet trackplayback ctrl
			'<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/control.trackplayback/control.playback.js"></script>',
			
                  // leaflet trackplayback
			'<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/leaflet.trackplayback/util.js"></script>',
                  '<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/leaflet.trackplayback/clock.js"></script>',
                  '<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/leaflet.trackplayback/track.js"></script>',
                  '<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/leaflet.trackplayback/tracklayer.js"></script>',
                  '<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/leaflet.trackplayback/trackcontroller.js"></script>',
                  '<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/leaflet.trackplayback/draw.js"></script>',
                  '<script src="'.$this->res.'leaflet/Leaflet.TrackPlayBack/src/leaflet.trackplayback/trackplayback.js"></script>',

                  //datatable
                  // '<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>',
                  // '<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js" type="text/javascript"></script>',
                  // '<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>',
                  // '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>',
                  // '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>',
                  // '<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>',
                  // '<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" type="text/javascript"></script>',

                  //sweet alert
                  '<script src="'.$this->res.'assets/libs/sweetalert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>',

                  //tracksymbol
                  '<script src="'.$this->res.'dist/js/pages/leaflet/leaflet-tracksymbol/tracksymbol.js"></script>',

                  '<script src="'.$this->res.'dist/js/pages/map.js"></script>',
                  '<script src="'.$this->res.'dist/js/pages/sidebar-0-init.js"></script>',
                  '<script src="'.$this->res.'dist/js/pages/sidebar-1-destination.js"></script>',
                  '<script src="'.$this->res.'dist/js/pages/sidebar-2-playback.js"></script>',
                  '<script src="'.$this->res.'dist/js/pages/sidebar-3-user.js"></script>',
                  '<script src="'.$this->res.'dist/js/pages/playback.js"></script>',

		);
            
            $sql = "SELECT * FROM coordinate";
            $coordinate = $this->db->query($sql)->result();

            $data['coordinate'] =$coordinate;
		$data['page_css'] = $page_css;
            $data['page_js']  = $page_js;
		$this->load->view('map',$data);
	}

      function setDest(){
            $destination_id = $this->input->post('destination_id');
            $data = array(
                  'destination_id' => $destination_id,
            );
            $this->db->where('id', 1);
            if($this->db->update('vehicle', $data)){
                echo json_encode("Update Sukses : ".$this->db->insert_id());
            }else{
                echo json_encode("Update error : ".mysql_error());
            }
      }

      function getDestinationList(){
            $sql = "SELECT * FROM dest_list";
            $result = $this->db->query($sql)->result();
            echo json_encode($result); 
      }

      function getLastPosition(){
            $sql = "SELECT * FROM `coordinate`, `vehicle` WHERE time = (SELECT MAX(time) from `coordinate`) AND
                        vehicle.id = coordinate.vehicle_id AND vehicle.id = 1";
            $result = $this->db->query($sql)->row();
            echo json_encode($result);
      }

      function getPlayback(){
            $from=$this->input->post('from');
            $to=$this->input->post('to');

            $query = "SELECT * from coordinate where `time` between '$from' and '$to'";
            $result = $this->db->query($query)->result();

            echo json_encode($result);
    }
}
