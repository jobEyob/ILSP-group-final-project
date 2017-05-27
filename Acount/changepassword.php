<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';

$user =new User();
if(!$user->isLoggedIn()){
    Redirect::to(' ../pages/login.php');
}
?>

<?php 


/******************************
 * for change password
 ******************************/
 $pass_currentError='';$pass_newError='';$pass_confirmError='';
  

if(Input::exists()){
    if(Token::check(Input::get('token'))){
    $validate = new Validate();
        $validation = $validate->check($_POST, array(
            /* $item */ 'password_current' => array(
                'required' => true,
                'min' => 6
                
            ),
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
                  if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
                      echo 'your current password is wrong';  
                  } else {
                      $salt= Hash::salt(32);
                      $user->update('users', array(
                          'password'=> Hash::make(Input::get('password_new'), $salt),
                          'salt'=>$salt
                          
                          
                      ));
                 
                
               Session::flash('success', 'your password changed Successfull');
                    //header("Location: ../index.php");
                    header("location: index.php");
               
            }  
            } catch (Exception $exc) {
                die ($exc->getMessage());
            }  
                    
            
        } else {
            foreach ($validation->errors() as $x=>$x_value) {
               
                switch ($x){
                    case 'password_current':
                        $pass_currentError=$x_value;
                        break;
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



?>




<div class="container">
        <!-- === END HEADER === -->
        <!-- === BEGIN CONTENT === -->
 <div class="row margin-vert-30">
            <!-- Begin Sidebar Menu -->
    <div class="col-md-3">
         <ul class="list-group sidebar-nav" id="sidebar-nav">
                    <li class="list-group-item">
                        <a href="/ILSP-group-final-project/Acount/acountsting.php"  >
                            
                            General
                        </a>
                    </li>
                   <li class="list-group-item">
                        <a href="/ILSP-group-final-project/Acount/changepassword.php">
                           
                            Change password
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" onclick="third()">
                            
                            third
                        </a>
                    </li>
                    
                </ul> 
    </div>
    <!-- End Sidebar Menu -->
    
    <div class="col-md-9">
      
           
            <!-- field set 2 -->
            <fieldset id="second">

                <div class="panel-success">
                    <div class="panel-heading">
                        <p>Change password</p>
                    </div>
                    <div class="panel-body">

                        <!----......................
                            form
                        .............................-->
                        <form class="form-horizontal" action="" method="post">
                            

                            <div class="form-group">
                                <label class="col-md-3 control-label">Current password:</label>
                                <span class="error"> <?php echo $pass_currentError;?></span>
                                <div class="col-md-8">
                                    <input class="form-control" name="password_current" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password:</label>
                                <span class="error"> <?php echo $pass_newError;?></span>
                                <div class="col-md-8">
                                    <input class="form-control" name="password_new" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm password:</label>
                                <span class="error"> <?php echo $pass_confirmError;?></span>
                                <div class="col-md-8">
                                    <input class="form-control" name="password_confirm"  type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" value="Save Changes" type="submit">
                                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
                                    <span></span>
                                    <input class="btn btn-default" value="Cancel" type="reset">
                                </div>
                            </div>

                        </form>
                    </div>

                </div> 

            </fieldset>   
            

        </div>   
        <!-- above this is content -->
    
   </div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>