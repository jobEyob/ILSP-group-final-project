<?php


function connection(){
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "info_location_db";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  //  echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo "<br>" . $e->getMessage();
    }

}
  function select($sql){

    $query=connection()->prepare($sql);
    // use exec() because no results are returned
    $query->execute();
    $output=$query->fetchAll(PDO::FETCH_OBJ);
    return $output;
}

function single_array_decoder($data){
    //print_r($data);
    foreach ($data as $key ) {
      # code...
        foreach ($key as $values) {
          # code...
          return $values;
        }
    }

}
$conn = null;
?>
