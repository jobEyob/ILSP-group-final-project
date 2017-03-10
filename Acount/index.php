<div style="display: none">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
</div>
<style>
    .navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
   /*
   ..........................................
   The for notefecation 
   ............................................
   */
   a.fa-globe {
  position: relative;
  font-size: 2em;
  color: grey;
  cursor: pointer;
}
span.fa-comment {
  position: absolute;
  font-size: 0.6em;
  top: -4px;
  color: red;
  right: -4px;
}
span.num {
  position: absolute;
  font-size: 0.3em;
  top: 1px;
  color: #fff;
  right: 2px;
}

#ac
{
   padding-top: 80px;
    padding-bottom: 5px;
}


#ac h2
{
     
     
}


    
</style>
    
    
    
    
 
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a target="_blank" href="#" class="navbar-brand">My Acount.</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
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
                        <strong>Eyob</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                        <sup><span class="badge badge-info glyphicon glyphicon- ">3</span></sup>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>eyob zenebe</strong></p>
                                        <p class="text-left small">eyobzenebe9@gmail.com</p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">Profile</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider navbar-login-session-bg"></li>
                         <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                         <li><a href="#">notifications <span class="glyphicon  pull-right"></span></a></li>   
           
            
            <li class="divider"></li>
            <li><a href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--organazetional info--> 
<div class="jumbotron" id="ac" text-center >
    <form class="form-inline">
    
        <label><img  src="/ILSP-group-final-project/image/natu-pension.jpg"  alt="logo" width="204" height="136" > </label>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <label><h2 > organization name:</h2> </label>
    
    </form>
</div>

<div class="container">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Basic information</a></li>
    <li><a data-toggle="tab" href="#menu1">Service information</a></li>
    <li><a data-toggle="tab" href="#menu2">map View</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    
      
  </div>
</div>