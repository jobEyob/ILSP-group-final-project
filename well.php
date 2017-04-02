
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
 ?>
<div id="ac">
<?php
 /*if(Session::exists('success')){
         echo Session::flash('success');
     } */
/*
$user=DB::getInstance();

        $user->getAll('category_name','services_category');
      
      if ($user->count()){
          
         // print_r($user->results());
       
          $val=$user->results();
       
          //asort($val);
         foreach ($val as $x_value) {
            $category= $x_value->category_name;   
            print_r($x_value->category_name);
           echo "<br>"; 
          
          
         }                 
      }
      */
      
                       $fname='';
                       $fpath='';
                       $ftype=''; 

       $user=new User();
      
       if(Input::getfile('submit_to')){
                    $filetmp=$_FILES['org_logo']['tmp_name'];
                    $filename=$_FILES['org_logo']['name'];
                    $filetype=$_FILES['org_logo']['type'];
                    $filepath="image/".$filename;
                   
                    move_uploaded_file($filetmp, $filepath);
                    
                    echo $filename."<br>".$filetype."<br>".$filepath."<br>";
                 
                    $fname=$filename;
                    $fpath=$filepath; 
                    $ftype=$filetype;
       }
       
      /* $user->create('organizetions', array(
                    
                   'user_id'=> 2,
                   'org_name'=> 'test',
                   'org_description'=>'des',
                   'logo_name'=>$fname,
                   'logo_path'=>$fpath,
                   'logo_type'=>$ftype
                   
                 
                ));  */
      
      ?>
    <style>
        #output_image
{
 max-width:300px;
}
     </style>   
      
      


    <form class="form-horizontal" action="well.php" method="post" enctype="multipart/form-data" >



                           
                       <input  name="org_logo"    type="file" id="org_paper" accept="image/*" onchange="preview_image(event)" >
                            <br>
                            <input type="submit"  value="Upload" name="submit_to" >
                       
      
</form>
    
    <img id="output_image"/>
    
</div>
<?php

/*

$user= new User();

$user->multiplyfinde('organizetions','user_id');

echo($user->multiplydata()->id);  

/*$user=DB::getInstance()->insert('address', array(
                    
                   'org_id'   => 2,
                   'website'  => 'tes', 
                  
                  
                ));
 
        
  $user=DB::getInstance()->insert('services', array(
           
           'org_id'       =>16,
           'category_id'  =>  3,
           'service_in_day' =>'2017-03-08 00:00:00',
           'service_in_week' =>6,
           'open_time' =>'2017-03-08 00:00:00',
           'close_time'=>'2017-03-08 00:00:00',
           'service_year'=>15, 
           'service_des'=>'test'
                   
                ));    */
