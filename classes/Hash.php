<?php
class Hash{
    public static function make($string, $salt = ''){
        return hash('sha256', $string . $salt);
    }
    
    public static function salt($length){
        
        //return mcrypt_create_iv($length) ;
        return random_bytes($length);
    }
    
    public static function uniqid(){
        
        return self::make(uniqid());
       
    }
}