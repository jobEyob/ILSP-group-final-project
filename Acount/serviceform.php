<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
 ?>
<div id="ac">
    
<?php
$nameError ="";
$emailError ="";
$passwordError="";
$password_confirmError="";


   $in= new Input();
   
 if(Token::check($in::get('token'))){ /*this tack token from input send to check method in Token class*/
     if ($in::exists()) {
         
         $validate = new Validate();
        $validation = $validate->check($_POST, array(
            /* $item */ 'org_name' => array(
                'required' => true,
                'min' => 2,
                'max' => 35,
                
            ),
            /* $item */ 'region' => array(
                'required' => true,
                'min' => 2,
            ),
            'phone' => array(
                'required' => true,
                'min' => 10
            ),
            'tell' => array(
                'required' => true,
                'min' => 10
            ),
            
            'fax' => array(
                'required' => true,
                'min' => 10,
            ),
            'city' => array(
                'required' => true,
                'min' => 2,
            ),
            'sub_city' => array(
                'required' => true,
                'min' => 2,
            ),
            'website' => array(
                'required' => true,
                'min' => 2,
            ),
            'org_dec' => array(
                'required' => true,
                'min' => 2,
            ),
           'category'=>array( 'required' => true  ),
           'service_in_day' =>array('required' => true),
           'service_in_week' =>array('required' => true),
           'open_time' =>array('required' => true),
           'close_time'=>array('required' => true),
           'service_year'=>array('required' => true),
           'service_dec' =>array( 'required' => true,
               'min'=>2 ),
           'latitude' =>array('required'=>true ) ,
           'longitude' =>array('required'=>true)
            
        ));
        if ($validation->passed()) {
            $fname='';$fpath=''; $ftype='';
            $user=new User();
         
            try {
                if(Input::getfile('submit_to')){
                    $filetmp=$_FILES['org_logo']['tmp_name'];
                    $filename=$_FILES['org_logo']['name'];
                    $filetype=$_FILES['org_logo']['type'];
                    $filepath=$_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/image/orgLogo/'.$filename;
                    $filepath_db='/ILSP-group-final-project/image/orgLogo/'.$filename;
                    move_uploaded_file($filetmp, $filepath);
                    
                    $fname=$filename;
                    $fpath=$filepath_db; 
                    $ftype=$filetype;
                   
       }
                
                $user->create('organizetions', array(
                    
                   'user_id'=> $user->data()->id,
                   'org_name'=> Input::get('org_name'),
                   'org_description'=> Input::get('org_dec'),
                   'logo_name'=>$fname,
                   'logo_path'=>$fpath,
                   'logo_type'=>$ftype 
                   
                 
                )); //
                $user->multiplyfinde('organizetions','user_id');

                // echo($user->multiplydata()->id);  
                
                  $user->create('address', array(
                    
                   'org_id'   => $user->multiplydata()->id,
                   'website'  => Input::get('website'),
                   'fax'      => Input::get('fax'),
                   'po_box'  =>4,
                   'phone_number'=> Input::get('phone'),
                    'tell_phone'  => Input::get('tell')
                   
                )); //
                
                $user->create('services', array(
                    'org_id' => $user->multiplydata()->id,
                    'category_id'     => Input::get('category'),
                    'service_in_day'  => Input::get('service_in_day'),
                    'service_in_week' => Input::get('service_in_week'),
                    'open_time'       => Input::get('open_time'),
                    'close_time'      => Input::get('close_time'),
                    'service_year'    => Input::get('service_year'),
                    'service_des'     => Input::get('service_dec')
                )); //
                $user->create('locations', array(
                    
                    'org_id'        => $user->multiplydata()->id,
                    'latitude'      => Input::get('latitude'),
                    'longitude'     => Input::get('longitude'),
                    'location_name' => 'test',
                    'region'        => Input::get('region'),
                    'city'          => Input::get('city'),
                    'sub_city'      => Input::get('sub_city')
                    
                ));  

                Session::flash('success', 'your acount crated Successfull');
                    //header("Location: ../index.php");
                    header("location: ../well.php");
                    
                    
                    ob_end_flush();// this is opstional is for Turn of output buffering we Turn on biging of header.php
                    
            } catch (Exception $exc) {
                die ($exc->getMessage());
            }  
                    
            
        } else {
          foreach ($validation->errors() as $error) {
            echo $error . ',';
                
          }
           
        }
    }
}



    ?>
</div>  

<style>
   #service_main{


        margin-top:30px;
    }    

    #progressbar{
        margin:0;
        padding:0;
        font-size:18px;
    }

    #active1{
        color:greenyellow;
    }    

   #progressbar li{
        margin-right:52px;
        display:inline;
        color:#c1c5cc;
        font-family: 'Droid Serif', serif;

    }
    fieldset{
        display: none;

    }

    #first{
        display:block;

    }
    #third {
        display: none;
    }
    input[type=submit],
    input[type=button]{
        width: 120px;
        margin:15px 25px;
        padding: 5px;
        height: 40px;
        background-color: sienna;
        border: none;
        border-radius: 4px;
        color: white;
        font-family: 'Droid Serif', serif;
    }       
   fieldset h2,p{
        text-align:center;
        font-family: 'Droid Serif', serif;
    }   
    /******************************
    * image prviwe
    *******************************/
 #output_image
 {
 max-width:120px;
 max-height: 120px;
}

    /*------------------------------------------
    for map
    ............................................*/
    #formap
    {
        height: 100%;
        margin: 0;
        padding: 7px;

    }

    #map {
        width:100%;
        height:500px

    }

</style>




<script>
      function initMap() {
          
            var mapCanvas = document.getElementById("map");
            var mapOptions = {
                center: new google.maps.LatLng(8.981426501752072, 38.75933647155762),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.HYBRID
            };
            
                
            
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            
            var map = new google.maps.Map(mapCanvas , mapOptions);
               map.setTilt(45);

              
            google.maps.event.addListener(map, 'click', function (e) {
                confirm("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
               var lati = e.latLng.lat(); var long = e.latLng.lng();
               document.getElementById("Latitude").value=lati;
               document.getElementById("Longitude").value=long;
            });                                    
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBfNj154XXsUT8pOYTI26rg5UhpI5DWDo&callback=initMap">
    </script>

<div class="container">
    <div  class="main" id="service_main">
        <ul id="progressbar">
            <li id="active1"><strong>Basic information </strong></li>
            <li id="active2"><strong>service information</strong> </li>
            <li id="active3"><strong>map location</strong></li>
        </ul>
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
            <fieldset id="first"> 
                <div class="row"> <!-- for preview   -->
                    <div class="col-md-4"></div> 
                    <div class="col-md-4">  
                <h2 class="title">Basic information</h2>
                <p class="subtitle">Step 1</p> 
                    </div>
                    <div class="col-md-4">   <img id="output_image"/> </div> 
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Organization Name</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="org_name" placeholder="org Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label">Organization Logo</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
                     <input  name="org_logo"  class="form-control"  type="file" accept="image/*" onchange="preview_image(event)"  >
                        </div>
                    </div>
                    
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Region</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="region" placeholder="region" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Phone #</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="(+251).." class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Tell #</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="tell" placeholder="(011).." class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">fax</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="fax" placeholder="(010).." class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">City</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="city" placeholder="city" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">sub City</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="sub_city" placeholder="sub city" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Website or domain name</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input name="website" placeholder="Website or domain name" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">organization Description</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="org_dec" placeholder="organization Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <input type="button" id="next_btn1" value="Next" onclick="next_step1()" />  
                        </div>
                    </div>
                </div>

            </fieldset> 

            <fieldset id="second">
                <h2 class="title">Service information</h2>
                <p class="subtitle">Step 2</p>

               <div class="form-group">
                    <label class="col-md-4 control-label" for="category"  >select category</label>
                    <div class="col-md-4 inputGroupContainer">   

                        <select  class="form-control" id="category" name="category" >
                            <option>--Select list--</option>
                       
                       <?php 
                       $user=DB::getInstance();

        $user->getAll('category_name','services_category');
      
      if ($user->count()){
          
         // print_r($user->results());
       
          $val=$user->results();
       
          asort($val);
         foreach ($val as $x_value) {
            $category= $x_value->category_name;   
            echo'<option>'. $x_value->category_name .'</option>';
           echo "<br>"; 
          
          
         }                 
      } ?>     
                        </select><br/>
                    </div>
                </div>

        
      <link rel="stylesheet" href="/ILSP-group-final-project/lib/css/jquery-ui.css">
      <link rel="stylesheet" href="/ILSP-group-final-project/lib/css/jquery-ui-timepicker-addon.css">
       <script src="/ILSP-group-final-project/lib/js/jquery-ui.js"></script>
       <script src="/ILSP-group-final-project/lib/js/jquery-ui-timepicker-addon.js"> </script>   
       
           
               
             
       
       <div class="form-group">
                    <label class="col-md-4 control-label">Service time</label>  
                    <div class="col-md-2 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="service_t" name="service_in_day" placeholder="hour in day" class="form-control" type="text">
                        </div>
                    </div>
                   <div class="col-md-2 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input id="service_d" name="service_in_week" placeholder="day in week" class="form-control" type="number" max="7" min="1" value="" >
                        </div>
                    </div>
                </div>
              
                    
      <div class="form-group">
                    <label class="col-md-4 control-label">open time</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="o_time" name="open_time" placeholder="open time" class="form-control" type="text">
                        </div>
                    </div>
                </div>
      
      <div class="form-group">
                    <label class="col-md-4 control-label">close time</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="c_time" name="close_time" placeholder="close time" class="form-control" type="text">
                        </div>
                    </div>
                </div>
       <div class="form-group">
                    <label class="col-md-4 control-label">service year</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="s_year" name="service_year" placeholder="service year" class="form-control" type="text">
                        </div>
                    </div>
                </div>
      
      <div class="form-group">
                    <label class="col-md-4 control-label">service Description</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="service_dec" placeholder="service Description"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label"> </label>  
                    <div class="col-md-4 inputGroupContainer">    
                        <input type="button" id="pre_btn1" value="Previous" onclick="prev_step1()"/>
                        <input type="button" name="next" id="next_btn2" value="Next" onclick="next_step2(); initMap();" />
                    </div>
                </div>

            </fieldset>

            <fieldset id="third">
                <h2 class="title">Map location</h2>
                <p class="subtitle">Step 3</p>

                <div class=" form-inline">

                    <label class="col-md-4 control-label" for="latitud">latitude:</label>
                    <input type="latitude" name="latitude" class="form-control" id="Latitude" value="">

                    <label  for="longitude">longitude:</label>
                    <input type="longitude" name="longitude" class="form-control" id="Longitude" value="">
                </div>
                <div id="formap"  >
                    <div id="map" >
                        
                    </div>

                </div>
                
                  


                <div class="form-group">
                    <label class="col-md-4 control-label"> </label>  
                    <div class="col-md-4 inputGroupContainer"> 

                <input type="button" id="pre_btn2" value="Previous" onclick="prev_step2()" >
                 <input type="hidden" name="token" value="<?php echo Token::generate()?>" >
                 <input type="submit" class="submit_btn" value="Submit" name="submit_to" onclick="validation(event)" >
                    </div>
                    </div>
            </fieldset>

        </form>

        
         <script>
             
 $('#service_t').timepicker({
	hourMin: 1,
	hourMax: 24,
        timeFormat: 'hh:mm:ss tt ' 
    });
    
 $('#o_time').timepicker({
	hourGrid: 4,
	minuteGrid: 10,
	timeFormat: 'hh:mm:ss tt '
});
$('#c_time').timepicker({
	hourGrid: 4,
	minuteGrid: 10,
	timeFormat: 'hh:mm:ss tt '
});

                  </script>
        
        
    </div>

</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>