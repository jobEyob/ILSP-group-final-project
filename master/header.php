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

        <link rel="stylesheet" href="/ILSP-group-final-project/css/custom-css.css">
        <script src="/ILSP-group-final-project/lib/js/jquery.min.js"></script>
        <script src="/ILSP-group-final-project/lib/js/bootstrap.min.js"></script>
        <script src="/ILSP-group-final-project/js/custom-js.js"></script>
    </head>
    <!--head section end her --->
    <body id="myPage">
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
                            <li><a href="javascript:void(0)"  onclick="ilps_open_nav('category')" id="navbtn_category">category

                                    <i class="glyphicon glyphicon-menu-down" style="display: none;"></i>

                                    <i class="glyphicon glyphicon-menu-up" style="display: inline;"></i>

                                </a></li>
                            <!--the link for registration to home page contact is not working -->
                            <li><a href="/ILSP-group-final-project/index.php#contact">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/ILSP-group-final-project/pages/request_for_reg.php"><span class="glyphicon glyphicon-registration-mark"></span> Registration</a></li>
                            <li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul> 
                    </div>
                </div>
                
             <!--this for category list navbar-->
        <nav id="nav_category" class="navbar" navbar-default style="display: none">
            <div class="container-fluid">
                <span style="float:right" onclick="ilps_close_nav('category')" class="glyphicon glyphicon-remove"></span><br>
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
        <!--this div for search -->
        <div>
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

        
