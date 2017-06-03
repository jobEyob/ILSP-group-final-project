<?php require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/core/init.php';   ?>
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
    echo '<div class="container">
   <p> Data Not Found </p>
     <br><br><br><br>
     <br><br><br><br><br>
    </div>';
      } else {
          
          //print_r($user->results());
          $datas=$user->results();
          foreach ($datas as $data){
             // echo $data->org_name;
              $lat=$data->latitude;$long=$data->longitude;
              $orgname=$data->org_name;
              /*
               * this for to count how many time organization is visited
               */
              $no_ofvisit=$data->no_ofView;
              $id=$data->org_id;
              $newVisit=$no_ofvisit+1;
              $user->update('organizetions','id',$id,array(
                    
                   'no_ofView'=> $newVisit
                  
                ));
              //end
          
   ?>
      

<style>
    h4{
        padding: 10px;
         font-family: "Times New Roman", Times, serif;
         font-weight: bold;
    }
   
</style> 
<div class="container">
                        <!-- === END HEADER === -->
                        <!-- === BEGIN CONTENT === -->
            <div class="row margin-vert-30">
            <div class="col-md-12 margin-top-30">
    
<div >
    <div class="container" style="margin-bottom: 20px;" >
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              
           <?php  $logo=$data->logo_path;  
           echo '<img  src="/ILSP-group-final-project/'.$logo.'" class="img-circle" alt="logo" width="160" height="160"  >' 
                   ?>    

            </div>
            <div class="col-md-6">
                <h2><?php echo escape( $data->org_name) ?></h2>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    
    <div  >
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Basic information</a></li>
    <li><a data-toggle="tab" href="#menu1">Service information</a></li>
    <li><a data-toggle="tab" href="#menu2">map View</a></li>
    
  </ul>

  <div class="tab-content" id="org_profile">
    <div id="home" class="tab-pane fade in active">
      <ul class="list-unstyled">
        <li>
        <i class="fa-mobile-phone color-primary"></i><?php echo escape($data->phone_number);  ?></li>
        <li>
        <li>
        <i class="fa-phone color-primary"></i><?php echo escape($data->tell_phone);  ?></li>
        <li>   
            <i class="fa-envelope color-primary"></i>info@example.com</li>
        <li>
            <i class="fa-globe color-primary"></i><?php echo escape($data->website);  ?></li>
          
    </ul>
    <ul class="list-unstyled">
       <li>
            <strong class="color-primary">po_box:</strong><?php echo escape($data->po_box);  ?></li>
        <li>
            <strong class="color-primary">fax:</strong><?php echo escape($data->fax);  ?></li>    
        <li>
            <strong class="color-primary">region:</strong><?php echo escape($data->region);  ?></li>
        <li>
            <strong class="color-primary">sub city:</strong><?php echo escape($data->sub_city);  ?></li>
        <li>
            <strong class="color-primary">description</strong> <br> 
            <p><?php echo escape($data->org_description);  ?></p>
            </li>
    </ul>
    </div>
    <div id="menu1" class="tab-pane fade">
     <p>Service category:<?php echo escape($data->category);  ?>
     <p>service Time in day:<?php echo escape($data->service_in_day);  ?> 
     <p>service day in week's:<?php echo escape($data->service_in_week);  ?>
     <p>service year:<?php echo escape($data->service_year).'  year';   ?> 
     <p>open time:<?php echo escape($data->open_time);  ?> &nbsp; close time:<?php echo escape($data->close_time);  ?>     
      <p>service description:<?php echo escape($data->service_des);  ?></p>
    </div>
    <div id="menu2" class="tab-pane fade">
     
     
      <style>

 #maplocation  {
   width: 100%;
   height: 400px;
   
 }
 
  #floating-panel {
        display: none;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto","sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }
.modal-open .modal {
    
    z-index: 9999;
} 
#inlines {
    
 display: inline-block;
    
 } 
.nav-tabs > li > a {
    
    color: initial;
}          
 
</style>
 <button  onclick="initialize()" class="btn btn-success" data-toggle="modal" data-target="#myModal">show on map?</button>  
 

 <!--   
<div id="maplocation">
   
</div>  -->
     <!-- Modal -->
  <div class="modal fade animate" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div id="inlines">
          
          </div>
          <div id="inlines">
          <button class="btn btn-info" id="getdirection" onclick="getDirectionsLocation()" >get Direction</button>
            </div>
            <div id="inlines">
                <div id="floating-panel" >
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
    </div>
            </div>
           <div id="errorlocation"></div>
            
        </div>
        <div class="modal-body">
         
          <div id="maplocation">
   
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    </div>
    
      
  </div>
</div> 
</div>
                </div>
    </div>
</div>
<?php
          }
     // echo $output;
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
  
  $("#myModal").on("shown.bs.modal", function () {
    google.maps.event.trigger(map, "resize");
    map.setCenter(orgLatlng);
});
 
  } 
//display diraction from curant location

//directionsPage
   var oLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>); 
   var directionsService = new google.maps.DirectionsService;
   var z = document.getElementById("maolocation");    
   var watchID;    
    function getDirectionsLocation() {
    console.log("getDirectionsLocation");
    if (navigator.geolocation) {
        //navigator.geolocation.getCurrentPosition(showDirectionsPosition);
   watchID = navigator.geolocation.watchPosition(showDirectionsPosition,handleError,{enableHighAccuracy: true});
    } else {
        z.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function clearTracking(){
    if(watchID>0){
        navigator.geolocation.clearWatch(watchID);
    }
}
    
function showDirectionsPosition(position) {
	console.log("showDirectionsPosition");
    directionsLatitude = position.coords.latitude;
    directionsLongitude = position.coords.longitude;
    directionsLatLng = new google.maps.LatLng(directionsLatitude,directionsLongitude);
    getDirections();
} 
    
function handleError(error){
    var container = document.getElementById('errorlocation');
    switch(error.code) {
        case error.PERMISSION_DENIED:
            container.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            container.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            container.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            container.innerHTML = "An unknown error occurred."
            break;
    }
}
    
    function getDirections() {
         document.getElementById("floating-panel").style.display = "block";
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
            window.alert('Directions request failed due to Mode Travel not available  ' + status);
          }
        });
      }
    
    //}
    </script>
    