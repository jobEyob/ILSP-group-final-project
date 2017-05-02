 <?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/element/search.php'; ?>

<?php
$nameError ="";
$emailError ="";
$passwordError="";
$password_confirmError="";

   $in= new Input();
   
 if(Token::check($in::get('token'))){ /*this tack token from input send to check method in Token class*/
     if ($in::exists()) {
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
            ),
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            'confirm_password' => array(
                'required' => true,
                'matches' => 'password'
            )
        ));
        if ($validation->passed()) {
            $user=new User();
         
        $salt = Hash::salt(32);
        
            try {
                $user->create('users', array(
                    
                   'username'=> Input::get('username'),
                   'email'=> Input::get('email'),
                   'password'=> Hash::make(Input::get('password'), $salt),
                   'salt'=>$salt,
                   'groups'=>1
                 
                ));
                
                 Session::flash('success', 'your acount crated Successfull');
                    //header("Location: ../index.php");
                    header("location: login.php");
                    
                    
                    ob_end_flush();// this is opstional is for Turn of output buffering we Turn on biging of header.php
                    
            } catch (Exception $exc) {
                die ($exc->getMessage());
            }  
                    
            
        } else {
            foreach ($validation->errors() as $x=>$x_value) {
               
                switch ($x){
                    case 'username':
                        $nameError=$x_value;
                        break;
                    case 'email':
                        $emailError=$x_value;
                        break;
                    case 'password':
                        $passwordError=$x_value;
                        break;
                    case 'confirm_password':
                        $password_confirmError=$x_value;
                        break;
                    default :
                        break;
                    
                }
                
            }
           /*print_r($validation->errors()[0]);
            $nameError=$validation->errors()[0];
            //print_r($usename_error);
            $emailError=$validation->errors()[1];
            $passwordError=$validation->errors()[2];
            $password_confirmError=$validation->errors()[3]; */ 
        }
    }
}


    ?>
    


<div>
    <div class="container">

        <div class="panel panel-primary">    
            <div class="panel-heading"> <h3>sign up</h3> </div>  
            <div class="panel-body">
                <form class="form-horizontal" action="" method='post'>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="uname">username:</label>
                       <span class="error">* <?php echo $nameError;?></span>
                        <div class="col-sm-5" inputGroupContainer>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>    
                                <input name="username" type="text" class="form-control" id="uname"
                                       placeholder="Enter user name" value="<?php echo escape($in::get('username')); ?>" >
                            </div> <div class="col-sm-3"> </div>
                        </div>
                    </div>
                    <!-- ...email..... -->
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="email">E-Mail</label>  
                        <span class="error">* <?php echo $emailError;?></span>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" id="email" placeholder="E-Mail Address" class="form-control" 
                                       type="text" value="<?php echo escape($in::get('email')); ?>" >
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="password">Password:</label>
                        <span class="error">* <?php echo $passwordError;?></span>
                        <div class="col-sm-5" inputGroupContainer>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-lock"></i></span>   
                             <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
                         
                            </div>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="cpwd">confirm Password:</label>
                        <span class="error">* <?php echo $password_confirmError;?></span>
                        <div class="col-sm-5" inputGroupContainer >
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-lock"></i></span>     
                            <input name="confirm_password" type="password" class="form-control" id="cpwd" placeholder="Enter password again">
                        </div> <div class="col-sm-3"> </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="hidden" name="token" value="<?php echo Token::generate()?>" >
                            <input type="submit" class="btn btn-default" value="Sing up">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div> 

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
