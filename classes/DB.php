<?php

class DB {

    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0
            ;
    public  $_and='', $position='', $item_per_page='';



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
                   // print_r($this->_query);
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
            $operators= array('=', '>', '<', '>=', '=<','LIKE');
            
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
   public function getAll($filde,$table){
       $sql="SELECT {$filde} FROM {$table}";
       if($this->query($sql)){
           return true;
       }
       return false;
   }
   public function joinget($filde){
       //$sql="SELECT {$filde} FROM {$table}";
       $sql="SELECT `organizetions`.`*`, `address`.`*`,`locations`.`*`,`services`.`*`
FROM `organizetions`
INNER JOIN `address` ON 
`organizetions`.`id`=
`address`.`org_id`
INNER JOIN `locations` ON
`organizetions`.`id`=
`locations`.`org_id`
INNER JOIN `services` ON
`organizetions`.`id`=
`services`.`org_id`
WHERE `org_name`= '$filde'";
       
       if($this->query($sql)){
           return true;
       }
       return false;
   }
   
  public function andget($filde,$_and,$position,$item_per_page){
       //$sql="SELECT {$filde} FROM {$table}";
       $sql="SELECT `organizetions`.`*`, `address`.`*`,`locations`.`*`,`services`.`*`
FROM `organizetions`
INNER JOIN `address` ON 
`organizetions`.`id`=
`address`.`org_id`
INNER JOIN `locations` ON
`organizetions`.`id`=
`locations`.`org_id`
INNER JOIN `services` ON
`organizetions`.`id`=
`services`.`org_id`
WHERE `category`= '$filde' ";
      if($_and!=""){
           $sql .= "AND `city`='$_and' ORDER BY `category` ASC LIMIT $position, $item_per_page ";
       }elseif($item_per_page!=""){
          $sql .="ORDER BY `category` ASC LIMIT $position, $item_per_page";
      } else {
          $sql .="ORDER BY `category` ASC ";
      }
       
       if($this->query($sql)){
           return true;
       }
       return false;
   }
/*   public function andtotalget($filde,$_and){
       //$sql="SELECT {$filde} FROM {$table}";
       $sql="SELECT `organizetions`.`*`, `address`.`*`,`locations`.`*`,`services`.`*`
FROM `organizetions`
INNER JOIN `address` ON 
`organizetions`.`id`=
`address`.`org_id`
INNER JOIN `locations` ON
`organizetions`.`id`=
`locations`.`org_id`
INNER JOIN `services` ON
`organizetions`.`id`=
`services`.`org_id`
WHERE `category`= '$filde' ";
      if($_and!=""){
           $sql .= "AND `city`='$_and' ORDER BY `category`  ";
       }
       
       if($this->query($sql)){
           return true;
       }
       return false;
   }
   /*public function serarch_data($table,$filde,$input){
       $sql= "SELECT * FROM {$table} WHERE {$filde} LIKE:$input ";
      // print_r($sql);
        $term = ". '%'";
       if($this->query($sql, array($term))){
           return true;
       }
       return false;
   } */
 public function neartogat($category,$lat,$lng,$position,$item_per_page){
     $sql="SELECT `organizetions`.`*`, `address`.`*`,`locations`.`*`,`services`.`*`,( 
6371 * acos(
 cos( radians($lat) ) 
 * cos( radians( latitude ) ) 
 * cos( radians( longitude ) - radians($lng) )
 + sin( radians($lat) )
 * sin( radians( latitude ) )
 )
) AS distance 
FROM `organizetions`
INNER JOIN `address` ON 
`organizetions`.`id`=
`address`.`org_id`
INNER JOIN `locations` ON
`organizetions`.`id`=
`locations`.`org_id`
INNER JOIN `services` ON
`organizetions`.`id`=
`services`.`org_id`
WHERE `category` ='$category'
HAVING distance < 10000 
ORDER BY distance LIMIT $position , $item_per_page";
     
     if($this->query($sql)){
           return true;
       }
       return false;
 }
 public function mostvisitgat(){
     $sql="SELECT `organizetions`.`*`, `address`.`*`,`locations`.`*`,`services`.`*`
FROM `organizetions`
INNER JOIN `address` ON 
`organizetions`.`id`=
`address`.`org_id`
INNER JOIN `locations` ON
`organizetions`.`id`=
`locations`.`org_id`
INNER JOIN `services` ON
`organizetions`.`id`=
`services`.`org_id`
ORDER BY `no_ofView` DESC
LIMIT 6";
     if($this->query($sql)){
         return true;
     }
     return false;
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
   
   public function update($tabel, $rowname, $id, $fileds=array()){
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
       
       $sql = "UPDATE {$tabel} SET {$set} WHERE {$rowname}={$id}";
       
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
