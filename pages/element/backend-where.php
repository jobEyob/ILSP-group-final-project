<?php require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/core/init.php';   ?>

<?php
 
$user=DB::getInstance();

       
     $bar = Input::get('term');
   // $bar=$_GET['term'];//term is buliten matode of jquer-ui
      if( $bar ){
     
 
    //$user->serarch_data('organizetions', 'org_name', $bar);
    $user->get('locations', array('city', 'LIKE', '%'.$bar.'%'));
    
    
     if ($user->count()>0) {
        $val=$user->results();
        
         foreach ($val as $x_value) {
             
     $output[] =$x_value->city; 
    }
    }
   else  
      {  
           $output[] = 'Not mach Found';  
      }  
       
      echo json_encode($output);
}

     
?>
