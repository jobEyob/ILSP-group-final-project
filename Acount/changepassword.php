<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
<div id="ac"  >
<?php 
$user =new User();

/******************************
 * for change password
 ******************************/

  

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
            foreach ($validation->errors() as $error) {
                echo $error . '<br>';
            }
        }
    }
}



?>


</div>

<div class="container-fluid " id="acountsting">


    
    <div class="row">
        <div class="col-sm-2 col-md-3">    
            <div class="nav-container" id="Anav-container">
               <ul class="nav" id="Anav">
                    <li class="active">
                        <a href="/ILSP-group-final-project/Acount/acountsting.php"  >
                            <span class="icon-home"></span>
                            <span class="text" >General</span>
                        </a>
                    </li>
                    <li>
                        <a href="/ILSP-group-final-project/Acount/changepassword.php" >
                            <span class="icon-user"></span>
                            <span class="text">Change password</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" >
                            <span class="icon-headphones"></span>
                            <span class="text">third</span>
                        </a>
                    </li>
                    
                </ul> 
            </div>

        </div>   
        <div class="col-sm-10 col-md-9">

           
            
           
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
                                <div class="col-md-8">
                                    <input class="form-control" name="password_current" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password:</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="password_new" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm password:</label>
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