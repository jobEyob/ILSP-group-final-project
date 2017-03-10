<div style="display: none">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
    ?>
</div>
<style>
    .main{


        margin-top:80px;
    }    

    #progressbar{
        margin:0;
        padding:0;
        font-size:18px;
    }

    #active1{
        color:red;
    }    

    li{
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
    h2,p{
        text-align:center;
        font-family: 'Droid Serif', serif;
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
    /*---------------------------------------------------------*/


//Function that executes on click of first next button
    function next_step1() {
        document.getElementById("first").style.display = "none";
        document.getElementById("second").style.display = "block";
        document.getElementById("active2").style.color = "red";
    }

//Function that executes on click of first previous button	
    function prev_step1() {
        document.getElementById("first").style.display = "block";
        document.getElementById("second").style.display = "none";
        document.getElementById("active1").style.color = "red";
        document.getElementById("active2").style.color = "gray";
    }

//Function that executes on click of second next button	
    function next_step2() {
        document.getElementById("second").style.display = "none";
        document.getElementById("third").style.display = "block";
        document.getElementById("active3").style.color = "red";
    }

//Function that executes on click of second previous button 
    function prev_step2() {
        document.getElementById("third").style.display = "none";
        document.getElementById("second").style.display = "block";
        document.getElementById("active2").style.color = "red";
        document.getElementById("active3").style.color = "gray";
    }

</script>

<div class="container">
    <div  class="main">
        <ul id="progressbar">
            <li id="active1">basic information </li>
            <li id="active2">service information </li>
            <li id="active3">map location</li>
        </ul>
        <form class="form-horizontal">
            <fieldset id="first"> 
                <h2 class="title">basic information</h2>
                <p class="subtitle">Step 1</p>   
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
                    <label class="col-md-4 control-label">Address</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="address" placeholder="Address" class="form-control" type="text">
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
                    <label class="col-md-4 control-label">Tel #</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="(011).." class="form-control" type="text">
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
                            <input name="sub city" placeholder="sub city" class="form-control"  type="text">
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

                        <select  class="form-control" id="category">
                            <option>--Select list--</option>
                            <option>Hotel</option>
                            <option>Education</option>
                            <option>hospital</option>
                            <option>shop</option>
                        </select><br/>
                    </div>
                </div>

        
      <link rel="stylesheet" href="/ILSP-group-final-project/lib/css/jquery-ui.css">
      
      <script src="/ILSP-group-final-project/lib/js/jquery-ui.js"></script>
                
                
      <div class="form-group">
          <label class="col-md-4 control-label">Service time</label>  
          <div class="col-md-2 inputGroupContainer">
              

              <input id="service_time" placeholder="hour in day" class="form-control" type="number" max="24" min="1" value="" >
          </div> 
  
          <div class="col-md-2 inputGroupContainer">
              

              <input id="service_time" placeholder="day in wick" class="form-control" type="number" max="7" min="1" value="" >
                 
                  
          </div>
      </div>
              
                    
      <div class="form-group">
                    <label class="col-md-4 control-label">open time</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input id="o_time" name="open_time" placeholder="open time" class="form-control" type="text">
                        </div>
                    </div>
                </div>
      
      <div class="form-group">
                    <label class="col-md-4 control-label">close time</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                            <input id="c_time"name="close_time" placeholder="close time" class="form-control" type="text">
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
                        <input type="button" name="next" id="next_btn2" value="Next" onclick="next_step2()" />
                    </div>
                </div>

            </fieldset>

            <fieldset id="third">
                <h2 class="title">Map location</h2>
                <p class="subtitle">Step 3</p>

                <div class=" form-inline">

                    <label class="col-md-4 control-label" for="latitud">latitude:</label>
                    <input type="latitude" class="form-control" id="Latitude" value="">

                    <label  for="logtude">longitude:</label>
                    <input type="logtude" class="form-control" id="Longitude" value="">
                </div>
                <div id="formap">
                    <div id="map"></div>

                </div>
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/Acount/map.php';
                ?>



                <div class="form-group">
                    <label class="col-md-4 control-label"> </label>  
                    <div class="col-md-4 inputGroupContainer"> 

                <input type="button" id="pre_btn2" value="Previous" onclick="prev_step2()"/>
                <input type="submit" class="submit_btn" value="Submit" onclick="validation(event)"/>
                    </div>
                    </div>
            </fieldset>

        </form>

        
         <script>
$(function() {
 $( "#o_time" ).datepicker({ 
     
              timeFormat: "hh:mm tt"
         });
});
                  </script>
        
        
    </div>

</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>