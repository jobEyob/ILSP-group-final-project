<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
<script>
   $(document).ready(function(){
       
      $("#pagination").fadeOut(); 
       
   });

</script>
<?php 
$data='';$output='';

$user=DB::getInstance();

     //$name= $_POST["inputval"];
      $name=Input::get('inputval');
     $orgs_name= escape($name); //senetazeation 
$user->joinget($orgs_name);
if (!$user->count()){
    //Redirect::to("../index.php");
    echo 'Data Not Found';
      } else {
          
          //print_r($user->results());
          $datas=$user->results();
          foreach ($datas as $data){
             // echo $data->org_name;
              $lat=$data->latitude;$long=$data->longitude;
              $orgname=$data->org_name;
          
   $output .= '      
      

<style>
    h4{
        padding: 10px;
         font-family: "Times New Roman", Times, serif;
         font-weight: bold;
    }
   #home p{
        margin-left:-90%;
    }
</style>   
<div id="ac" style="background-color:#f5f5f0;">
    <div class="container" style="margin-bottom: 20px;" >
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">

            <img  src="'.$data->logo_path.'"  alt="logo" width="160" height="160"  >

            </div>
            <div class="col-md-6">
                <h2>'.$data->org_name.'</h2>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    
    <div class="container" >
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Basic information</a></li>
    <li><a data-toggle="tab" href="#menu1">Service information</a></li>
    <li><a data-toggle="tab" href="#menu2">map View</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        &nbsp;&nbsp;
        <h4>phone:'.$data->phone_number.'</h4>
        <h4>tell:'.$data->tell_phone .'</h4>
        <h4>fax:'.$data->fax .'</h4>
        <h4>city:'.$data->city .'</h4>
        <h4>po_box:'.$data->po_box .'</h4> 
        <h4>About  '.$data->org_name .'</h4>
        <p> '.$data->org_description .'</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
     
      <style>

 #maplocation  {
   width: 100%;
   height: 400px;
   
 }
 
  #floating-panel {
        position: absolute;
        top: 119%;
        left: 72%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto","sans-serif";
        line-height: 30px;
        padding-left: 10px;
      } 
 
</style>
<h4> <button onclick="initialize()">show on map?</button> <button id="getdirection" onclick="getDirectionsLocation()" >get Direction</button> </h4>
<div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
    </div>
<div id="maplocation"></div>


      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    
      
  </div>
</div> 
</div>
';
          }
      echo $output;
      }
      ?>


<script>
    function initialize() {
    var orgLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
    var myOptions = {
      zoom: 14,
      center: orgLatlng,
      mapTypeId: google.maps.MapTypeId.HYBRID
    }
    var map = new google.maps.Map(document.getElementById("maplocation"), myOptions);

    var marker = new google.maps.Marker({
        
        map: map,
        draggable: true,
        animation: google.maps.Animation.BOUNCE,
        position: orgLatlng, 
        title:"<?php echo $orgname; ?>"
       
    });  
    marker.addListener('click', toggleBounce);
    
    function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

    // Zoom to 9 when clicking on marker
  google.maps.event.addListener(marker,'click',function() {
    map.setZoom(16);
    map.setCenter(marker.getPosition());
  });
  } 
//display diraction from curant location

//directionsPage
   var oLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>); 
   var directionsService = new google.maps.DirectionsService;
   var z = document.getElementById("maolocation");    
    
    function getDirectionsLocation() {
	console.log("getDirectionsLocation");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showDirectionsPosition);
    } else {
        z.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showDirectionsPosition(position) {
	console.log("showDirectionsPosition");
    directionsLatitude = position.coords.latitude;
    directionsLongitude = position.coords.longitude;
    directionsLatLng = new google.maps.LatLng(directionsLatitude,directionsLongitude);
    getDirections();
} 
    
    function getDirections() {
        console.log("getDirections");
        var directionsDisplay = new google.maps.DirectionsRenderer;
        
        
        //console.log('getDirections');
       // var orgLatlng = new google.maps.LatLng(37.7699298, -122.4469157);
        
        var myOptions2 = {
      zoom: 14,
      center: oLatlng,
      mapTypeId: google.maps.MapTypeId.HYBRID
    }
        
        var map2 = new google.maps.Map(document.getElementById('maplocation'),myOptions2 );
        directionsDisplay.setMap(map2);
        
        calculateAndDisplayRoute(directionsService, directionsDisplay);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
        
    }
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var selectedMode = document.getElementById('mode').value;
 var start = directionsLatLng;
 var end = oLatlng;
  var request = {
    origin:start,
    destination:end,
    travelMode: google.maps.TravelMode[selectedMode]
  };
          
          
        directionsService.route(request, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    
    //}
    </script>
    