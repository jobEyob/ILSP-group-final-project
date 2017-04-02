<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';


$user =new User();
if(!$user->isLoggedIn()){
    Redirect::to(' ../pages/login.php');
}

?>


<style>
    .navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
   /*
   ..........................................
   The for notefecation 
   ............................................
   */
   a.fa-globe {
  position: relative;
  font-size: 2em;
  color: grey;
  cursor: pointer;
}
span.fa-comment {
  position: absolute;
  font-size: 0.6em;
  top: -4px;
  color: red;
  right: -4px;
}
span.num {
  position: absolute;
  font-size: 0.3em;
  top: 1px;
  color: #fff;
  right: 2px;
}

#ac
{
   padding-top: 80px;
    padding-bottom: 5px;
}


#ac h2
{
     
     
}


    
</style>
    
 
 
<!--organazetional info--> 
<div class="jumbotron" id="ac" text-center >
    <form class="form-inline">
           <?php  $user->multiplyfinde('organizetions','user_id');
          // echo $user->multiplydata()->logo_path; 
             $logo=$user->multiplydata()->logo_path;
             $org_name=$user->multiplydata()->org_name;
           ?>
        <label> <?php echo '<img  src="'.$logo.'"  alt="logo" width="160" height="160"  >' ?></label>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <label><h2 > organization name:<?php echo escape($org_name);  ?> </h2> </label>
    
    </form>
</div>
<div>
  <?php
 if(Session::exists('success')){
         echo  Session::flash('success') ;
     }  ?>  
    
</div> 


<div class="container" id="acount_index">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Basic information</a></li>
    <li><a data-toggle="tab" href="#menu1">Service information</a></li>
    <li><a data-toggle="tab" href="#menu2">map View</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    
      
  </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>