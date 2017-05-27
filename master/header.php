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
        
        <link rel="stylesheet" href="/ILSP-group-final-project/assets/css/bootstrap.css" rel="stylesheet"> 
    <link rel="stylesheet" href="/ILSP-group-final-project/assets/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="/ILSP-group-final-project/assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="/ILSP-group-final-project/assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="/ILSP-group-final-project/assets/css/responsive.css" rel="stylesheet">
                                     
        <link rel="stylesheet" href="/ILSP-group-final-project/css/custom-css.css">
        
        <script src="/ILSP-group-final-project/lib/js/jquery.min.js"></script>
        <script src="/ILSP-group-final-project/lib/js/bootstrap.min.js"></script>
        <script src="/ILSP-group-final-project/js/custom-js.js"></script>
        <script src="/ILSP-group-final-project/js/slider.js"></script>
        <link rel="stylesheet" href="/ILSP-group-final-project/lib/css/jquery-ui.css">
        <link rel="stylesheet" href="/ILSP-group-final-project/lib/css/jquery-ui-timepicker-addon.css">
        <script src="/ILSP-group-final-project/lib/js/jquery-ui.js"></script>
        <script src="/ILSP-group-final-project/lib/js/jquery-ui-timepicker-addon.js"></script>
        <script src="/ILSP-group-final-project/lib/js/jquery.bootpag.min.js"></script> 
         
                                                      
    </head>
    <!--head section end her --->
    <body id="myPage">
    <div id="body_bg">
        <?php 
     
     
    $user= new User();
    
  if($user->isLoggedIn()){
   ?>
    <div id="container_header" class="container">
                <div id="header" class="row">
                    <div class="col-md-12 margin-top-40">
                        <!-- Header Social Icons -->
                        
                        <!-- End Header Social Icons -->
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
     <div class="primary-container-group">
    <!-- Background -->
      <div class="primary-container-background">
    <div class="primary-container"></div>
          <div class="clearfix"></div>
       </div>
                <!--End Background -->
     <div class="primary-container">
      <header >
           <!--this for navigation -->
            <nav class="navbar navbar-fixed-top" id="navbar" >
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
                        <li><a href="/ILSP-group-final-project/Acount/serviceform.php" >Add service</a></li>
                        <li><a href="/ILSP-group-final-project/Acount/updateService.php">updated service</a></li>
                    </ul>
                     
                 </li> 
                            
                        </ul>
            <ul class="nav navbar-nav navbar-right">
  

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <strong><?php echo escape($user->data()->username);  ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                        <sup><span class="badge badge-info glyphicon glyphicon- ">3</span></sup>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            
                                
                             <a href="/ILSP-group-final-project/Acount/index.php" >Profile</a>   
                           
                        </li>
                        
                       <li><a href="/ILSP-group-final-project/Acount/acountsting.php">
                        Account Settings </a></li>
                        
                         <li><a href="#">notifications </a></li>
                           
           
            
            
            <li><a href="/ILSP-group-final-project/pages/logout.php">Sign Out </a></li>
                    </ul>
                </li>
                
                <li> &nbsp;&nbsp;&nbsp;&nbsp;</li>
            </ul>
            
           
        </div>
    </div>
        
         
                
</nav>
        </header>
  <?php
       //$us = new User();
   if($user->hasPermission('admin')){
 
     //echo '<p>you have administerater</p>';
      // Redirect::to('/ILSP-group-final-project/Admin/index.php');
   }       
    
  }else {
 
  ?>
  <div id="container_header" class="container">
                <div id="header" class="row">
                    <div class="col-md-12 margin-top-63">
                        <!-- Header Social Icons -->
                        <ul class="social-icons circle pull-right">
                            <li class="social-rss">
                                <a href="#" target="_blank" title="RSS"></a>
                            </li>
                            <li class="social-twitter">
                                <a href="#" target="_blank" title="Twitter"></a>
                            </li>
                            <li class="social-facebook">
                                <a href="#" target="_blank" title="Facebook"></a>
                            </li>
                            <li class="social-googleplus">
                                <a href="#" target="_blank" title="GooglePlus"></a>
                            </li>
                        </ul>
                        <!-- End Header Social Icons -->
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
    <div class="primary-container-group">
    <!-- Background -->
      <div class="primary-container-background">
    <div class="primary-container"></div>
          <div class="clearfix"></div>
       </div>
                <!--End Background -->
     <div class="primary-container">
       <header >

            <!--this for navigation -->
            <nav class="navbar  navbar-fixed-top" id="navbar" >
                <div id="container_hornav" class="container-fluid ">
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
                
             <!--this for category list navbar--
        <nav id="nav_category" class="navbar" navbar-default style="display: none">
            <div class="container-fluid">
                <span style="float:right" onclick="ilps_close_nav()" class="glyphicon glyphicon-remove"></span><br>
                <ul class="nav navbar-nav" id="category_list">
                   <?php /*
                       $user=DB::getInstance();

        $user->getAll('category_name','services_category');
      
      if ($user->count()){
          $val=$user->results();
       
          asort($val);
         foreach ($val as $x_value) {
            $category= $x_value->category_name;   
            
           // echo '<li><a href="/ILSP-group-final-project/pages/search-results.php?name='. $x_value->category_name .'">'. $x_value->category_name .'</a></li>';
              echo '<li  ><a href="#">'. $x_value->category_name .'</a></li>';
            
         }                 
      } */?> 
                </ul>
               
            </div>
        </nav>     -->
            
             
              </div>
            </nav>
        </header>
        
        
  <?php
      
  }
        ?>
        
        
        
 