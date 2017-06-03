<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php'; ?>

<?php

if(empty($_GET['id']) && empty($_GET['code']))
{
    Redirect::to('../index.php');
}
$pass_newError='';$pass_confirmError='';

if(Input::get('id') && Input::get('code'))
{
    $db = DB::getInstance();
 $id = base64_decode(Input::get('id'));
 $code = Input::get('code');   // code is salt value it pass from Fpass.php
 
 $db->get('users', array('id', '=', $id)); 
 
 
 if ($db->count())
 {
     $datas=$db->results();
     foreach ($datas as $data){
         
     }
     
     if(Input::exists()){
    if(Token::check(Input::get('token'))){
    $validate = new Validate();
        $validation = $validate->check($_POST, array(
           
            /* $item */ 'password_new' => array(
                'required' => true,
                'min' => 6
                
            ),
            /* $item */ 'password_confirm' => array(
                'required' => true,
                'min' => 6,
                'matches'=>'password_new'
                
            )
            
        ));
        if ($validation->passed()) {
            
            try {
                  
                      $salt= Hash::salt(32);
                      $db->update('users','id', $data->id, array(
                          'password'=> Hash::make(Input::get('password_new'), $salt),
                          'salt'=>$salt
                          
                          
                      ));
                 
                
           Session::flash('passchanged', 'Your password <strong> changed Successfull !</strong> Now login with new password');
                    //header("Location: ../index.php");
                    header("location: login.php");
               
           
            } catch (Exception $exc) {
                die ($exc->getMessage());
            }  
                    
            
        } else {
            foreach ($validation->errors() as $x=>$x_value) {
               
                switch ($x){
                   
                    case 'password_new':
                        $pass_newError=$x_value;
                        break;
                    
                    case 'password_confirm':
                        $pass_confirmError=$x_value;
                        break;
                    default :
                        break;
                    
                }
                
            }
        }
    }
}
     
 } 

}
?>
<div class="container">
     <div class='alert alert-success'>
   <strong>Hello !</strong>  <?php echo $data->username ?> you are here to reset your forgetton password.
  </div>
        <form class="form-horizontal" action="" method="post">
        <h3 class="form-signin-heading">Password Reset.</h3><hr />
        <?php
        if(isset($msg))
  {
   echo $msg;
  }
  ?>
        <div class="form-group">
            <label class="col-md-3 control-label">New Password:</label>
            <span class="error"> <?php echo $pass_newError; ?></span>
            <div class="col-md-8">
                <input class="form-control" name="password_new" type="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <span class="error"> <?php echo $pass_confirmError; ?></span>
            <div class="col-md-8">
                <input class="form-control" name="password_confirm"  type="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <br>
                <hr>
                <button class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Reset Your Password</button>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >

            </div>
        </div>
     
        
        
      </form>

    </div> <!-- /container -->
    <br> <br> 
    <?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';