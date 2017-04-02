<?php
class Config{
    public static function get($path=null){ //by defalte path set null
        if($path){ //if path set
            $config=$GLOBALS['config']; //this put $GLOBALS['config'] value to $config from init.php
            
            $path= explode('/', $path); //explode tack charachter if you whant explode and = array back
            
            foreach ($path as $bit) { //this loop throw  $GLOBALS['config'] array $bit as array item
               if(isset($config[$bit]))
               {
                   $config=$config[$bit];
               }
            }
            return $config;
        }
        return false;
    }
}

