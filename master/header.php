<?php ob_start() //Turn on output buffering , help as use header(location: ) after html element  ?>

<?php require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/core/init.php';   ?>

<?php
 
$title = "ILSP-final project";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/ILSP-group-final-project/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="/ILSP-group-final-project/lib/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/ILPS-group-final-project/lib/css/font-awesome.min.css" > 
        <link rel="stylesheet" href="/ILPS-group-final-project/lib/css/font-awesome.css" > 
        <link rel="stylesheet" href="/ILSP-group-final-project/css/custom-css.css">
        <link rel="stylesheet" href="/ILSP-group-final-project/css/slider.css">
        <script src="/ILSP-group-final-project/lib/js/jquery.min.js"></script>
        <script src="/ILSP-group-final-project/lib/js/bootstrap.min.js"></script>
        <script src="/ILSP-group-final-project/js/custom-js.js"></script>
         <script src="/ILSP-group-final-project/js/slider.js"></script>
         
    </head>
    <!--head section end her --->
    <body id="myPage">
        <?php 
     
     
    $user= new User();
    
  if($user->isLoggedIn()){
   ?>
      <header >

         <!--this for navigation -->
            <nav class="navbar navbar-default navbar-fixed-top" id="navbar" >
                <div class="container-fluid">
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>
                        <a class="navbar-brand" href="#myPage">Logo</a>
                    </div>
      <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav">
                            <li class="active"><a href="/ILSP-group-final-project/index.php">Home</a></li>
                            
                            <!--the link for registration to home page contact is not working -->
                            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Service
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Add service</a></li>
                        <li><a href="#">updated service</a></li>
                    </ul>
                     
                 </li> 
                            
                        </ul>
            <ul class="nav navbar-nav navbar-right">
  
<a class="fa fa-globe">
  <span class="fa fa-comment"></span>
  <span class="num">2</span>
</a>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <strong><?php echo escape($user->data()->username);  ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                        <sup><span class="badge badge-info glyphicon glyphicon- ">3</span></sup>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-left"><strong>eyob zenebe</strong></p>
                                        <p class="text-left small">eyobzenebe9@gmail.com</p>
                                        
                                    </div>
                                </div>
                             <a href="/ILSP-group-final-project/Acount/index.php" >Profile</a>   
                            </div>
                        </li>
                        <li class="divider navbar-login-session-bg"></li>
                         <li><a href="/ILSP-group-final-project/Acount/acountsting.php">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                         <li><a href="#">notifications <span class="glyphicon  pull-right"></span></a></li>   
           
            
            <li class="divider"></li>
            <li><a href="/ILSP-group-final-project/pages/logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
        
         
                
</nav>
        </header>
  <?php  
  }else {
 
  ?>
  
<header >

            <!--this for navigation -->
            <nav class="navbar navbar-default navbar-fixed-top" id="navbar" >
                <div class="container-fluid">
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>
                        <a class="navbar-brand" href="#myPage">Logo</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/ILSP-group-final-project/index.php">Home</a></li>
                            <li><a href="javascript:void(0)"  onclick="ilps_open_nav()" id="navbtn_category">category

                                    <i class="glyphicon glyphicon-menu-down" style="display: none;"></i>

                                    <i class="glyphicon glyphicon-menu-up" style="display: inline;"></i>

                                </a></li>
                            <!--the link for registration to home page contact is not working -->
                           
                        </ul>
                        <ul class="nav navbar-nav navbar-right" >
                            <li><a href="/ILSP-group-final-project/pages/request_for_reg.php"><span class="glyphicon glyphicon-registration-mark"></span> Registration</a></li>
                            <li id="ul"><a id="a_login" href="/ILSP-group-final-project/pages/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <!-- data-toggle="modal" data-target="#myModal"  -->   
                        </ul> 
                    </div>
                </div>
                
             <!--this for category list navbar-->
        <nav id="nav_category" class="navbar" navbar-default style="display: none">
            <div class="container-fluid">
                <span style="float:right" onclick="ilps_close_nav()" class="glyphicon glyphicon-remove"></span><br>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">hotel</a></li>
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
            </div>
        </nav>   
                
                        
            </nav>
        </header>
        
        
  <?php
      
  }
        ?>
        
        <!--this div for search 
        <div id="forsearch">
            <div class="jumbotron" text-center >
                <div class="container text-center">
                    <br>
                    <p>search organization by category or name</p>
                    <nav class="navbar navbar-light bg-faded">
                        <form class="form-inline">

                            <div class="form-group" >

                                <label for="search">What you want?:</label>
                                <input id="search" class="form-control mr-sm-2" type="text" placeholder="Search organization"/>

                                <label for="location"> &nbsp; Where?:</label>
                                <input id="location" class="form-control mr-sm-2" type="text" placeholder="location"/>
                            </div>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                <span class="glyphicon glyphicon-search"></span> Search
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
   -->
        
 