<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('res');?>/dist/css/welcome-style.css">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <style type="text/css">
      .bg {
        /* The image used */
        background-image: linear-gradient(0deg, rgba(0,0,0,0.5018382352941176) 0%, 
            rgba(0,0,0,0) 30%, 
            rgba(0,0,0,0) 60%, 
            rgba(0,0,0,0.3) 100%),url(<?php echo base_url('res');?>/assets/images/background/background.jpg);

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
    <!--fonts -->
    <title>Apron Vehicle Monitoring and Tracking | Login</title>
  </head>
<body onload='display_ct()'>
  <div class="bg">
    <div class="container">
      <div class="row info text-white">
          <div class="col-md-6 info" style="">
            <ul class="list-group list-group-horizontal">
            <li class="list-group-item" style="background-color: transparent;border: 0px;">
              <!-- <span class="number" style="color: rgb(251, 84, 43);">972</span> 
              <div class="description">Customers</div> -->
            </li>
            <li class="list-group-item" style="background-color: transparent;border: 0px;">
             <!--  <span class="number" style="color: rgb(176, 47, 251);">7,653</span> 
              <div class="description">Assets Tracked</div> -->
            </li>
            <li class="list-group-item" style="background-color: transparent;border: 0px;">
             <!--  <span class="number" style="color: rgb(132,222,2);">382</span> 
              <div class="description">Online Users</div> -->
            </li>
          </ul>
          </div>
          <div class="col-md-3 offset-md-3 f-s-60 text-right">
            <span class="time" id="ct"></span>
          </div>
      </div>
      <div class="d-flex justify-content-center p-t-75">
        <div class="content-bottom">
          <?php echo $this->session->flashdata('message');?>
          <form id="loginform" method="post" action="<?php echo base_url('auth/login');?>">
            <div class="field-group">
              <span class="fa fa-user" aria-hidden="true"></span>
              <div class="wthree-field">
                <input name="username" id="username" type="text" placeholder="Username" required="">
              </div>
            </div>
            <div class="field-group">
              <span class="fa fa-lock" aria-hidden="true"></span>
              <div class="wthree-field">
                <input name="password" id="password" type="Password" placeholder="Password" required="">
              </div>
            </div>
            <div class="wthree-field">
              <button type="submit" class="btn" >Login</button>
            </div>
          </form>
        </div>
      </div>
        <div class="row info p-t-75 text-white">
          <div class="col-md-6 info f-s-12">
            <div>Photo by <a href="https://www.Pexels.com">Pexels</a></div>
          </div>
          <div class="col-md-3 offset-md-3 text-right f-s-12">
            <!-- <a href="#" style="text-decoration: none;">Customer Support</a> -->
          </div>
        </div>
    </div>
  </div>
</body>
<script type="text/javascript"> 
function display_c(){
  var refresh=1000; // Refresh rate in milli seconds
  mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
  var x = new Date()
  // time part //
  var hour=x.getHours();
  var minute=x.getMinutes();
  var second=x.getSeconds();
  if(hour < 10 ){hour='0'+hour;}
  if(minute < 10 ) {minute='0' + minute; }
  if(second< 10){second='0' + second;}
  var x3 = hour+':'+minute;
  document.getElementById('ct').innerHTML = x3;
  display_c();
}
</script>
</html>