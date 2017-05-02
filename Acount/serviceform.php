<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
    
    if(!$user->isLoggedIn()){
    Redirect::to(' ../pages/login.php');
}
 ?>
<div id="ac">
    
<?php
$nameError ="";$emailError ="";$regionError="";$phoneError="";$tellError="";$faxError="";$cityError="";
$sub_cityError="";$websiteError="";$org_decError="";$categoryError="";$s_in_dayError="";$s_in_weekError="";
$open_timeError="";$close_timeError="";$s_yearError="";$s_decError="";$latitudeError="";$longitudeError="";


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
                    $filepath_db='/image/orgLogo/'.$filename;
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
                    'category'     => Input::get('category'),
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
          foreach ($validation->errors() as $x=>$x_value) {
            
              switch ($x) {
                  case 'org_name':
                  $nameError=$x_value;
                      break;
                   case 'region':
                  $regionError=$x_value;
                      break;
                   case 'phone':
                  $phoneError=$x_value;
                      break;
                   case 'tell':
                  $tellError=$x_value;
                      break;
                   case 'fax':
                  $faxError=$x_value;
                      break;
                   case 'city':
                  $cityError=$x_value;
                      break;
                   case 'sub_city':
                  $sub_cityError=$x_value;
                      break;
                   case 'website':
                  $websiteError=$x_value;
                      break;
                   case 'org_dec':
                  $org_decError=$x_value;
                      break;
                  case 'category':
                  $categoryError=$x_value;
                      break;
                  case 'service_in_day':
                  $s_in_dayError=$x_value;
                      break;
                  case 'service_in_week':
                  $s_in_weekError=$x_value;
                      break;
                  case 'open_time':
                  $open_timeError=$x_value;
                      break;
                  case 'close_time':
                  $close_timeError=$x_value;
                      break;
                  case 'service_year':
                  $s_yearError=$x_value;
                      break;
                  case 'service_dec':
                  $s_decError=$x_value;
                      break;
                  case 'latitude':
                  $latitudeError=$x_value;
                      break;
                  case 'longitude':
                  $longitudeError=$x_value;
                      break;

                  default:
                      break;
              }
          }
           
        }
    }
}



    ?>
</div>  

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
                    <span class="error"> <?php echo $nameError;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="org_name" placeholder="org Name" class="form-control"  type="text" 
                                    value="<?php echo escape(Input::get('org_name')); ?>" >
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label">Organization Logo</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
                     <input  name="org_logo"    type="file" accept="image/*" onchange="preview_image(event)"  >
                        </div>
                    </div>
                    
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Region</label> 
                     <span class="error"> <?php echo $regionError;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="region" placeholder="region" class="form-control" type="text" 
                                value="<?php echo escape(Input::get('region')); ?>"    >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Phone</label> 
                     <span class="error"> <?php echo $phoneError;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="(+251).." class="form-control" type="text" 
                                  value="<?php echo escape(Input::get('phone')); ?>"  >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Tell</label> 
                     <span class="error"> <?php echo $tellError;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="tell" placeholder="(011).." class="form-control" type="text" 
                                  value="<?php echo escape(Input::get('tell')); ?>"  >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">fax</label>  
                     <span class="error"> <?php echo $faxError ;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="fax" placeholder="(010).." class="form-control" type="text" 
                                  value="<?php echo escape(Input::get('fax')); ?>"  >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">City</label>  
                     <span class="error"> <?php echo $cityError ;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="city" placeholder="city" class="form-control"  type="text" 
                                 value="<?php echo escape(Input::get('city')); ?>"   >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">sub City</label>  
                     <span class="error"> <?php echo $sub_cityError;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="sub_city" placeholder="sub city" class="form-control"  type="text" 
                                  value="<?php echo escape(Input::get('sub_city')); ?>"  >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">website</label>
                     <span class="error"> <?php echo $websiteError;?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input name="website" placeholder="Website or domain name" class="form-control" type="text" 
                                 value="<?php echo escape(Input::get('website')); ?>"   >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">organization Description</label>
                    <span class="error"> <?php echo $org_decError ?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="org_dec" placeholder="organization Description" 
                                   value="<?php echo escape(Input::get('org_dec')); ?>"    ></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group" id="sform" >
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
                    <span class="error"> <?php echo $categoryError ?></span>
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
                    <span class="error"> <?php echo $open_timeError ?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="o_time" name="open_time" placeholder="open time" class="form-control" type="text">
                        </div>
                    </div>
                </div>
      
      <div class="form-group">
                    <label class="col-md-4 control-label">close time</label>  
                    <span class="error"> <?php echo $close_timeError ?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="c_time" name="close_time" placeholder="close time" class="form-control" type="text">
                        </div>
                    </div>
                </div>
       <div class="form-group">
                    <label class="col-md-4 control-label">service year</label> 
                    <span class="error"> <?php echo $s_yearError ?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="s_year" name="service_year" placeholder="service year" class="form-control" type="text">
                        </div>
                    </div>
                </div>
      
      <div class="form-group">
                    <label class="col-md-4 control-label">service Description</label>
                    <span class="error"> <?php echo $s_decError ?></span>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="service_dec" placeholder="service Description"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label"> </label>  
                    <div class="col-md-4 inputGroupContainer" id="sform" >    
                        <input type="button" id="pre_btn1" value="Previous" onclick="prev_step1()"/>
                        <input type="button" name="next" id="next_btn2" value="Next" onclick="next_step2(); initMap();" />
                    </div>
                </div>

            </fieldset>

            <fieldset id="third">
                <h2 class="title">Map location</h2>
                <p class="subtitle">Step 3</p>

                <div class=" form-inline">

                    <label class="col-md-3 control-label" for="latitud">latitude:</label>
                     
                    <input type="latitude" name="latitude" class="form-control" id="Latitude" value=""> 
                     
                    <label  for="longitude">longitude:</label>
                    
                    <input type="longitude" name="longitude" class="form-control" id="Longitude" value=""> 
                    
                </div>
                <!--  for error display    -->
                <div class=" form-inline">
                    <label class="col-md-3 control-label" for="latitud"></label>
                     <span class="error"> <?php echo $latitudeError ?></span> &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                     <input type="hidden" name="latitude" class="form-control" id="Latitude" value=""> 
                     
                    <label  for="longitude">        &#160;&#160;</label>
                  &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;  
                  <span class="error"> <?php echo $longitudeError ?></span>
                    <input type="hidden" name="longitude" class="form-control" id="Longitude" value=""> 
                </div> <!-- end   -->
                <div id="formap"  >
                    <div id="map" >
                        
                    </div>

                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label"> </label>  
                    <div class="col-md-4 inputGroupContainer" id="sform" > 

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