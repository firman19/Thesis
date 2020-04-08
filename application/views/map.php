<!doctype html>
<html>
	<head>
		<title>Apron Vehicle Monitoring and Tracking</title>
		
		<?php
		    if(isset($page_css)){
		        foreach ($page_css as $css) {
		            print $css;
		        }
		    }
		?>

		<link href="<?php echo base_url('res');?>/assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />

	    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->res;?>/apex/img/ico/apple-icon-60.png">
	    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->res;?>/apex/img/ico/apple-icon-76.png">
	    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->res;?>/apex/img/ico/apple-icon-120.png">
	    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->res;?>/apex/img/ico/apple-icon-152.png">
	    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->res;?>/apex/img/ico/favicon.ico">
	    <link rel="shortcut icon" type="image/png" href="<?php echo $this->res;?>/apex/img/ico/favicon-32.png">

		<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->res;?>/apex/fonts/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->res;?>/apex/fonts/feather/style.min.css">
    	<link rel="stylesheet" type="text/css" href="<?php echo $this->res;?>/apex/fonts/simple-line-icons/style.css">

    	<link rel="stylesheet" type="text/css" href="<?php echo $this->res;?>/apex/vendors/css/perfect-scrollbar.min.css">
    	<link rel="stylesheet" type="text/css" href="<?php echo $this->res;?>/apex/vendors/css/prism.min.css">

		<link rel="stylesheet" type="text/css" href="<?php echo $this->res;?>/apex/css/app.css">
    <!-- <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script> -->
	</head>
	<body>
		<style>
			#mapid { min-height: 700px; }
		</style>
		<div id="mapid"></div>
	</body>
	<script src="<?php echo $this->res;?>/apex/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <!-- old template -->
    <script src="<?php echo $this->res;?>/apex/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCERobClkCv1U4mDijGm1FShKva_nxsGJY" type="text/javascript"></script> -->
    <!-- <script src="<?php //echo $this->res;?>/apex/vendors/js/gmaps.min.js" type="text/javascript"></script> -->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?php echo $this->res;?>/apex/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- <script src="<?php echo $this->res;?>/apex/js/maps.js" type="text/javascript"></script> -->
    <!-- END PAGE LEVEL JS-->
    <!-- datatable -->
    <script src="<?php echo $this->res;?>/apex/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->res;?>/apex/js/data-tables/datatable-basic.js" type="text/javascript"></script>
    <!-- modal --->
    <script src="<?php echo $this->res;?>/apex/js/components-modal.min.js" type="text/javascript"></script>
	<?php
    if(isset($page_js)){
        foreach ($page_js as $js) {
            print $js;
        }
    }
    ?>
	
</html>
