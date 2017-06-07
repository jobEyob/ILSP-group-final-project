
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>

<div>
    
<?php
$incoract="";   
$nameError ="";
$passwordError="";
    
if(Token::check(Input::get('token'))){
    if(Input::exists()){
        $validate= new Validate();
        $validation=$validate->check($_POST, array(
            'username'=>array(
                'required' => true 
                ),
            
            'password' => array(
                'required' => true,
                 )
            
            
        ));
    }

if($validation->passed()){
    $user=new User();
    $remember=(Input::get('remember') === 'on') ? true: false;
     $login=$user->login(Input::get('username'), Input::get('password'), $remember);
     if($login){
        // $path=$_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/';
         $last_log_time = $user->data()->last_LogoutTime;
        $user_id=$user->data()->id;

        Session::put("last_log_time",$last_log_time );
        Session::put("user_id",$user_id );
        
        if($user->hasPermission('admin')){

          //echo '<p>you have administerater</p>';
            Redirect::to('/ILSP-group-final-project/admin/index.php');
        }else{
            
            //$data = $user->data()->username;
             
            
         Redirect::to('../Acount/index.php');
            
        }
     } else {
         //echo 'User Name or password incoract';
         $incoract='User Name or password incoract';
     }
    
} else {
    foreach ($validation->errors() as $x=>$x_value) {
               
                switch ($x){
                    case 'username':
                        $nameError=$x_value;
                        break;
                    
                    case 'password':
                        $passwordError=$x_value;
                        break;
                    
                    default :
                        break;
                    
                }
                
            }
}
}
 ?>
</div>
<style>
    /*@import url(http://fonts.googleapis.com/css?family=Roboto);

/****** LOGIN MODAL ******/
#login{
    margin-top: -22px;
    
}

.loginmodal-container {
  padding: 30px;
  
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.5em;
  font-family: roboto;
}

.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 12px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
  
}
.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}    
    
    
</style>



<div class="container">
                        <!-- === END HEADER === -->
                        <!-- === BEGIN CONTENT === -->
<div class="container">
    
     <!--  this for show flash massage if user change new password    -->
      <?php
     if(Session::exists('passchanged')){
         ?>
       <div class=" alert alert-success">
           <?php
             echo  Session::flash('passchanged') ;
             ?>
             </div>
       <?php  }  ?>  

<div class="row margin-vert-30">
                                <!-- Login Box -->
<!-- Modal -->
<div class="modal-dialog" id="login" >
    <!-- Modal content-->
    <div class="loginmodal-container login-page" style="padding-top: 15px;" >
      <div class="modal-header">
        
        <h1>Login to Your Account</h1><br>
        <span class="error"> <?php echo $incoract;?></span>
      </div>
        <form  role="form" id="ModalForm" action="" method="post">
      <div class="modal-body">
          <div class="form-group">
           <span class="error"> <?php echo $nameError;?></span>
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
          <div class="form-group">
            <span class="error"> <?php echo $passwordError;?></span>
              <input  type="password"name="password" class="form-control" id="pwd" placeholder="password">
        </div>
      </div>
          <div class="checkbox">
              <label for="remember">
                  <input name="remember" type="checkbox" id="remember"> Remember Me
		</label>
	 </div> 
           
      <div class="modal-footer">
        <input type="hidden" name="token" value="<?php echo Token::generate()?>" >  
        <input type="submit" name="login" class="login loginmodal-submit" value="Login" > 
        
      </div>
    </form>
        <div class="forgot-password">
	<a href="/ILSP-group-final-project/pages/Fpass.php">Forgot Password</a>
        </div>
        
        
    </div>

     </div>
</div>
</div>  
    </div>


<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php'; ?>