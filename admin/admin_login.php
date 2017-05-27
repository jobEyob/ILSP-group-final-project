<div style="display:none;">
<?php

include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
</div>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info_location_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//error_reporting(0); to stop show the error to the user of the system error
//and we can pass our error message to the user instade of the php output
//or die("sorry, we\'re experiencing connection problems.');
// Check connection
if ($conn->connect_error) {
    echo '<script language="javascript">';
    echo 'alert("Connection Failed Try Agein")';
    echo '</script>';
}

$errorMsg = "";
$validUser ="";
if(isset($_POST["sub"])) {
  $validUser = $_POST["username"] == "admin" && $_POST["password"] == "password";
    //print_r($_POST);
        $error = "";
        $sql = "SELECT  `username`, `password` FROM `admin` WHERE `username`='".$_POST['username']."' AND `password`='".$_POST['password']."' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['admin-user']=$_POST['username'];
            Session::put('admin-user',$_POST['username'] );
          //echo Session::get('admin-user');
        header("Location: /ILSP-group-final-project/admin/index.php");
      exit();
        } else {
            $error='error';
        }

    if ($error != "") {
        echo $error;
        exit();
    }

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <title>Login</title>
</head>
<body>
  <form name="input" action="" method="post">
    <label for="username">Username:</label><input type="text" value="<?= $_POST["username"] ?>" id="username" name="username" />
    <label for="password">Password:</label><input type="password" value="" id="password" name="password" />
    <div class="error"><?= $errorMsg ?></div>
    <input type="submit" value="Home" name="sub" />
  </form>
</body>
</html>
