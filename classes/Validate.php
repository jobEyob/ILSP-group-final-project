<?php
class Validate{
    private $_passed = false,
            $_errors = array(),
            $_db =null;
    public function __construct() {
        $this->_db = DB::getInstance();
        
    }
    public function check($sourse, $items=array()){
        foreach ($items as $item => $rules ){
            foreach ($rules as $rule=>$rule_value){
               
          ///  echo "{$item} {$rule} must be {$rule_value} <br>";  
                $value= trim($sourse[$item]);
                $item= escape($item); // senitizetion
                //echo $value;
                if($rule === 'required' && empty($value)){
                    $this->addError($item,"{$item} is required");
                } else {
                    if (!empty($value)) {
                        switch ($rule) {
                            case 'min':
                                if (strlen($value) < $rule_value) {
                                    $this->addError($item,"$item must be minimum of $rule_value");
                                }
                                break;
                            case 'max':
                                if (strlen($value) > $rule_value) {
                                    $this->addError($item,"$item must be maximum of $rule_value");
                                }
                                break;
                            case 'matches':
                                if ($value !== $sourse[$rule_value]){
                                    $this->addError($item,"{$rule_value} is not maches ");
                                }
                                break;
                            case 'unique':
                           // $check= $this->_db->get('users', array('username', '=', 'eyob'));
                              $check= $this->_db->get($rule_value ,array($item , '=', $value ));
                                if($check->count()){ 
                   //$check call DB class metode count. count check if there seame item exist it addError to error array
                                    
                                    $this->addError($item,"{$item} Username already taken. Choose another one ");
                                }
                                break;

                           
                        } //switch end
                    }
                }
            }
            
        }
        if(empty($this->_errors)){ //this chack error array if it is empty set _passed=true
            $this->_passed=true;
        }
        return $this;
        
    }
    private function addError($key,$error){ 
        $this->_errors[$key]=$error;  //this for add error to  $_errors = array() array
    }
    
    public function errors(){
        return $this->_errors;
    }
    public function passed(){
        return $this->_passed;
    }
}