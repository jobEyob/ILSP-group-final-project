<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';

$user =new User();
if(!$user->isLoggedIn()){
    Redirect::to(' ../pages/login.php');
}

?>

<?php 
/*$user =new User();
if(!$user->isLoggedIn()){
    Redirect::to(' ../pages/login.php');
} */
$username_Error='';$email_Error='';

if(Input::exists()){
    if(Token::check(Input::get('token'))){
    $validate = new Validate();
        $validation = $validate->check($_POST, array(
            /* $item */ 'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            /* $item */ 'email' => array(
                'required' => true
            )
            
        ));
        if ($validation->passed()) {
            
            try {
                  $user->update('users',array(
                    
                   'username'=> Input::get('username'),
                   'email'=> Input::get('email'),
                   
                 
                ));
                
                 Session::flash('success', 'your acount updated Successfull');
                    //header("Location: ../index.php");
                    header("location: index.php");
                    
                    
                    ob_end_flush();// this is opstional is for Turn of output buffering we Turn on biging of header.php
                    
            } catch (Exception $exc) {
                die ($exc->getMessage());
            }  
                    
            
        } else {
            foreach ($validation->errors() as $x=>$x_value) {
               
                switch ($x){
                    case 'username':
                        $username_Error=$x_value;
                        break;
                    
                    case 'email':
                        $email_Error=$x_value;
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

            <fieldset id="first">

                <div class="panel-success">
                    <div class="panel-heading">
                        <p>Generale account sting</p>
                    </div>
                    <div class="panel-body">

                        <!----......................
                            form
                        .............................-->
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Full name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="name" value="eyob zenebe" type="text">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <span class="error"> <?php echo $email_Error;?></span>
                                <div class="col-lg-8">
                                    <input class="form-control" name="email" value="<?php echo escape($user->data()->email);  ?>" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Username:</label>
                                <span class="error"> <?php echo $username_Error;?></span>
                                <div class="col-md-8">
                                    <input  class="form-control" name="username" value="<?php echo escape($user->data()->username);  ?>" type="text">
                                </div>
                            </div>
                            
                           
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" value="Save Changes" type="submit">
                                    <input type="hidden" name="token" value="<?php echo Token::generate();  ?>" >
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

