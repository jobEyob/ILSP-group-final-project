<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php'; ?>

<?php
$user =new User();
if(!$user->isLoggedIn()){
    Redirect::to(' ../pages/login.php');
} else {
    if ($user->hasPermission('admin')) {

        if (!$username = Input::get('user_id')) {
            Redirect::to('../index.php');
        } else {
            $user = new User($username);
            if (!$user->exists()) {
                Redirect::to(404);
            } else {
                $data = $user->data();
            }
        }
    }
}
?>

<!--organazetional info--> 
           <div class="container">
                            <!-- === END HEADER === -->
                            <!-- === BEGIN CONTENT === -->
    <div class="row margin-vert-30">
     <div class="col-md-12 margin-top-30">


        <div class="container" style="margin-bottom: 20px;" >
           <h3>profile</h3>
           <hr>

           <?php $org_name=''; 

           $user->multiplyfinde('organizetions','user_id');
          // echo $user->multiplydata()->logo_path; 
            $exist=$user->multiplydata(); //to chack recored exist about organazation
           if($exist == ''){
               echo '<h2>you have no record about your organizetion </h2>
               <br><br><br><br><br><br><br><br><br>
               </div></div></div>
               ';
           }else{
             $logo=$user->multiplydata()->logo_path;
             $org_name=$user->multiplydata()->org_name;


           ?>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">

               <?php   
               echo '<img  src="/ILSP-group-final-project/'.$logo.'"  alt="logo" width="160" height="160"  >' 
                       ?>    

                </div>
                <div class="col-md-6">
                <h2><?php echo $org_name;?></h2>
            </div>
            <div class="col-md-3"></div>

            </div>
           
            <?php } ?>
        </div>

         <div class="container">
      <?php
     if(Session::exists('success')){
             echo  Session::flash('success') ;
         }  ?>  

    </div> 
    <?php 
    $db= DB::getInstance();
    if(!$org_name == ""){
    $db->joinget($org_name);
    //print_r($db->results());
    $datas=$db->results();
    foreach ($datas as $value) {

    }
    ?>

    <div class="container" >
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Basic information</a></li>
            <li><a data-toggle="tab" href="#menu1">Service information</a></li>
            <li><a data-toggle="tab" href="#menu2">map View</a></li>

          </ul>

            <div class="tab-content" id="org_profile">
            <div id="home" class="tab-pane fade in active">
              <p>Phone Number:<?php echo escape($value->phone_number);  ?>
              <p>Tell Phone:<?php echo escape($value->tell_phone);  ?>
              <p>Po_Box:<?php echo escape($value->po_box);  ?>
              <p>website :<?php echo escape($value->website);  ?>
              <p>fax :<?php echo escape($value->fax);  ?>
              <p>region :<?php echo escape($value->region);  ?>
              <p>sub city :<?php echo escape($value->sub_city);  ?>
              <p>description :<?php echo escape($value->org_description);  ?>.
            </div>
            <div id="menu1" class="tab-pane fade">
             <p>Service category:<?php echo escape($value->category);  ?>
             <p>service Time in day:<?php echo escape($value->service_in_day);  ?> 
             <p>service day in week's:<?php echo escape($value->service_in_week);  ?>
             <p>service year:<?php echo escape($value->service_year).'  year';   ?> 
             <p>open time:<?php echo escape($value->open_time);  ?> &nbsp; close time:<?php echo escape($value->close_time);  ?>     
              <p>service description:<?php echo escape($value->service_des);  ?></p>
            </div>
            <div id="menu2" class="tab-pane fade">
              <h2><p>organization location</h2>
              <div id="map">

              </div>
            </div>

          </div>
        </div>

</div>
</div>
</div>

<?php }  ?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
