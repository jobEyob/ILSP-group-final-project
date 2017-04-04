<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/element/search.php'; ?>

<div >
    <?php
    
$nameError ="";
$emailError ="";
$phoneError="";
$locationError="";
$autopaperError="";
    
    $in= new Input();
      if(Token::check($in::get('token'))){ 
     if ($in::exists()) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            /* $item */ 'org_name' => array(
                'required' => true,
                'min' => 2,
                
            ),
            /* $item */ 'email' => array(
                'required' => true
            ),
            'org_phone' => array(
                'required' => true,
                'min' => 10
            ),
            'org_location' => array(
                'required' => true,
                
            )
           
            
        ));
        if ($validation->passed()) {
            $user=new User();
         
            try {
                
                if(Input::getfile('submit_to')){
                    $filetmp=$_FILES['auto_paper']['tmp_name'];
                    $filename=$_FILES['auto_paper']['name'];
                    $filetype=$_FILES['auto_paper']['type'];
                    $filepath=$_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/image/request/'.$filename;
                    $filepath_db='/image/request/'.$filename;
                    move_uploaded_file($filetmp, $filepath);
                    
                   //  echo $filename."<br>".$filetype."<br>".$filepath."<br>";
                    $fname=$filename;
                    $fpath=$filepath_db; 
                    $ftype=$filetype;
                   
       }
               
                $user->create('request', array(
                    
                   'org_name'=> Input::get('org_name'),
                   'org_email'=> Input::get('email'),
                   'org_phone'=> Input::get('org_phone'), 
                   'org_location' => Input::get('org_location'),
                   'auto_paper_path'=>$fpath,
                   'verify'=>0   
                   
                 
                )); // 
                
                 Session::flash('request', 'your Request sent Successfull');
                    //header("Location: ../index.php");
                   // header("location: /request_for_reg.php");   
                    
                    
                    ob_end_flush();// this is opstional is for Turn of output buffering we Turn on biging of header.php
                    
            } catch (Exception $exc) {
                die ($exc->getMessage());
            }  
                    
            
        } else {
            foreach ($validation->errors() as $x=>$x_value) {
              // echo "Key=" . $x . ", Value=" . $x_value;
               //echo "<br>";
               switch ($x) {
                   case 'org_name':
                   
                   $nameError=$x_value;
                       break;
                   case 'email':
                    $emailError=$x_value;
                    break;
                   case 'org_phone':
                    $phoneError=$x_value;
                    break;
                   case 'org_location':
                    $locationError=$x_value;   
                    break;
                   default:
                       break;
               }
            
                
            }
           // print_r($validation->errors());
           /* $nameError=$validation->errors()[0];
            $emailError=$validation->errors()[1];
            $phoneError=$validation->errors()[2];
            $locationError=$validation->errors()[3];
            //$autopaperError=$validation->errors()[4];  */
        }
         
    }
      }
      
      ///
      
      if(Session::exists('request')){
         echo Session::flash('request');
     }
      
      
    ?> 

</div>

<div >
    <div class="container">
        <h3>step 1</h3>
        <div class="panel panel-primary">
            <div class="panel-heading" ><h4>Request for Registration required</h4> </div>
            <div class="panel-body">

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >

                    <div class="form-group" >
                        <label class="control-label col-sm-3" for="org_name">Organization name:</label>
                         <span class="error">* <?php echo $nameError;?></span>
                        <div class="col-sm-5" id="div_name">
                            <input type="text" class="form-control" id="org_name" name="org_name" placeholder="Enter organization name" 
                                   value="<?php echo escape(Input::get('org_name')) ?>"      >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Email:</label>
                         <span class="error">* <?php echo $emailError;?></span>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" 
                                value="<?php echo escape(Input::get('email')) ?>"    >

                            <span name="error" id="email_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_phone">Phone number: </label>
                         <span class="error">* <?php echo $phoneError;?></span>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="org_phone"  name="org_phone" placeholder="Enter phone number" 
                                value="<?php echo escape(Input::get('org_phone')) ?>"    >
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_location">Location: </label>
                         <span class="error">* <?php echo $locationError;?></span>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="org_location" name="org_location" placeholder="Enter city" 
                              value="<?php echo escape(Input::get('org_location')) ?>"      >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_paper">authorization paper: </label>
                        <div class="col-sm-5">
                            <input name="auto_paper" type="file"  id="org_paper"   >
                            <span class="help-block">that ...</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="hidden" name="token" value="<?php echo Token::generate() ?>" >
                            <input type="submit" name="submit_to" class="btn btn-primary" value="Submit" >
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
