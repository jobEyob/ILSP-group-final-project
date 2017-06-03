<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
<?php
$user =new User();

 $db=DB::getInstance();




if(Token::check(Input::get('token'))){ /*this tack token from input send to check method in Token class*/
     if (Input::exists()) {
 //$email = $_POST['email'];
 $email = Input::get('email');       
 
 $db->get('users', array('email', '=', $email));    
 if ($db->count())
 {
  $datas=$db->results();
  foreach ($datas as $data){
  $id = base64_encode($data->id);
  $code = $data->salt;
  //echo($id);
  //print_r($datas);
  
  $message= "
       Hello , $email
       <br /><br />
       We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
       <br /><br />
       Click Following Link To Reset Your Password 
       <br /><br />
       <a href='http://localhost:80/ILSP-group-final-project/pages/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
       <br /><br />
       thank you :)
       ";
  $subject = "Password Reset";
  
  $user->send_mail($email,$message,$subject);
  require_once ($_SERVER['DOCUMENT_ROOT'].'/ILSP-group-final-project/lib/Mailer/PHPMailerAutoload.php');
  $mail = new PHPMailer();
  
  if($mail->send()) {
  
  $msg = "<div class='alert alert-success'>
     <button class='close' data-dismiss='alert'>&times;</button>
     We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
      </div>";
  }
  
 }
     }
 else
 {
  $msg = "<div class='alert alert-danger'>
     <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry!</strong>  this email not found. 
       </div>";
 }
}
}
?>

 
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Forgot Password</h2><hr />
        
         <?php
   if(isset($msg))
   {
    echo $msg;
   }
   else
   {
    ?>
               <div class='alert alert-info'>
    Please enter your email address. You will receive a link to create a new password via email.!
    </div>  
                <?php
   }
   ?>
        
        <input class="form-control" name="email" id="email" placeholder="E-Mail Address" type="email" value="<?php echo escape(Input::get('email')); ?>" required >
         <input type="hidden" name="token" value="<?php echo Token::generate()?>" >
      <hr />
        <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Create new Password</button>
       
      </form>
        <br> <br> <br> <br> <br> <br>
    </div> <!-- /container -->
 <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
 ?>
    