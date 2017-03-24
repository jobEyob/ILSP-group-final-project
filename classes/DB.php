<?php

class DB {

    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct() {
        try {
            
            $username = config::get('mysql/username');
            $pasword = config::get('mysql/password');
            
      $this->_pdo =  new PDO ('mysql:host='.config::get('mysql/host').'; dbname=' . config::get('mysql/db') , $username, $pasword);
        
             
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance= new DB();
        }
        return self::$_instance;
    }
    
    public function query($sql, $params = array()) {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
          
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);

                    $x++;
                }
            }
            if ($this->_query->execute()) {

                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ); //results is storde here
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        
        
        return $this;
    }
    //this function do teack action like select,update delete ..
    public function action($action, $table, $where = array() ){
        if(count($where)===3){
            $operators= array('=', '>', '<', '>=', '=<');
            
            $filed    =$where[0]; 
            $operator =$where[1];
            $value    =$where[2];
            
            if (in_array($operator, $operators)) {
                //$sql="SELECT* FROM user WHERE username=eyob ";
                 $sql="{$action} FROM {$table} WHERE {$filed} {$operator} ?";//? replesed by value then pass to array($value)
                 
                if(!$this->query($sql, array($value))->error()){           
                    return $this;
                }
            } 
        }
        return false;
    }
    //get function do select opration
   public function get($table, $where){
       return $this->action('SELECT *', $table, $where); 
   } 
   public function results(){
       return $this->_results;
   }
   public function first(){
       return $this->results()[0];
   }
   
   public function insert($tabel, $fileds=array()){
       if(count($fileds)){
           $keys   = array_keys($fileds);
           $values ='';
           $x=1;
           //this for crate ' ? '
           foreach ($fileds as $filed){
               $values .='?';                 
             
               if ($x < count($fileds))  //this for cracte ',' end of ? like this ?,?,?,?
               {
                   $values .=',';
               }
               $x++;
           }
          // die($values); output like this ?,?,?,?
           
           $sql="INSERT INTO {$tabel} (`". implode('`,`',$keys)."`) VALUES ({$values})";
             //  INSERT INTO users(`username`,`email`,`password`,`salt`)
          
          // echo $sql; output  INSERT INTO users (`username`,`email`,`password`,`salt`) VALUES (?,?,?,?)
           
           if(!$this->query($sql, $fileds)->error()){
               return true;
           }
           return false;
       }
       
   }
   
   public function update($tabel, $id, $fileds=array()){
       $set='';
       $x=1;
       
       foreach ($fileds as $name=>$value){
           $set .="{$name}= ?";
           if($x < count($fileds)){
               $set .=', ';
           }
           $x++;
       }
      // die($set); username= ?,email= ?
      //$sql = "UPDATE users SET usermane= newusername WHERE id=2";
       
       $sql = "UPDATE {$tabel} SET {$set} WHERE id={$id}";
       
    //echo $sql; UPDATE users SET username= ? , email= ? WHERE id=2
       
       if(!$this->query($sql, $fileds)->error()){
           return true;
       }
       return false;
   }

   public function delete($table, $where){
      return $this->action('DELETE', $table, $where);  
   }

    public function error() {
        return $this->_error;
    }
    
     public function count() {
        return $this->_count;
    }

}
