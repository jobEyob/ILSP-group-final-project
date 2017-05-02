<?php 
/*function escape($string){
    return htmlentities($string, ENT_QUOTES, '' );
} 
*/
function escape($data){
  
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data= htmlentities($data, ENT_QUOTES, '' ); 
    
  return $data;
} 