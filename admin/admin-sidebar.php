
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/classes/admin_class.php'; ?>
<style>
  .admin-sidebar{
    background-color: #23282D;

    
  }
  .admin-dashbord{
    background-color: #F1F1F1;

  }
.admin-page-header{
  margin-top: 60px;
  background-color: #23282D;
  padding: 10px;

}
.displayer{
  background-color: white;
}
.wrapper{
margin:10px 5px;
padding: 5px;
}
  .admin-body{

    margin:10px 0px;
  }
  .admin-body span{
    margin-right: 10px;
  }
  .page-statics{
    background-color: red;
    margin:20px 0px;
  }
  .admin-sidebar-list{
    list-style: none;
    font-size: 16px;
    padding-left: 0px;
    margin-top:10px;
  }
  .admin-sidebar-list span{
    margin-right: 10px;
  }
  .admin-sidebar-list a{
    text-decoration: none;
    color: white;
  }
  .admin-sidebar-list li:hover{
    background-color: #32373c;
  }
.admin-user-search-form{
margin-top: 10px;
margin-left: 15px;
}

.Pagination_wrapper{
text-align: center;
}
.device_list li{
display: inline;
list-style: none;
}
.mobile_type li{
display: block;
}
.desktop_browse li{
display: block;
}
.device_usage{
padding-left: 10px;
list-style: none;
}
.device_usage li{
display: inline;
}
.page-header{
margin: 0px !important;
}
.traffic_overview li{
list-style: none;
}
.traffic_overview{
padding-left:  10px;
}
.request_replay_controller{
text-align: center;
margin-top: 10px;
padding: 20px 0px;
}
.request_replay_controller button{
margin-left:  15px;
margin-bottom: 10px;
}
#myModal{
margin-top: 50px;
}
.activity_list_li{
list-style: none;
margin-left: 10px;
}
.numerical_report{
color: white;

}
.numerical_report li{
display: inline;
list-style: none;
}

</style>



<div class="container">
<div class="row admin-page-header">

  <div class="col-md-offset-2  ">
    <ul class="numerical_report">
      <li>Total registered ORG. : <?php  echo single_array_decoder(select($sql = "SELECT COUNT(id) FROM `organizetions` "));?></li>
      <li>Total page visitor : <?php  echo single_array_decoder(select($sql = "SELECT count(DISTINCT ip) FROM `stattracker` "));?></li>
      <li>Total page view : <?php  $total_page_view=single_array_decoder(select($sql = "SELECT count(id) FROM `stattracker` ;"));  echo $total_page_view;?></li>
      <!-- <li> new Visitor<sup><span class="badge"> <?php  echo single_array_decoder(select($sql = "SELECT COUNT(DISTINCT ip) FROM `stattracker` WHERE date(`thedate_visited`)>=  '".Session::get('last_log_time')."' "));?></span></sup></li> -->
      <li>new visit <sup><span class="badge">  <?php echo single_array_decoder(select($sql = "SELECT COUNT(id) FROM `stattracker` WHERE date(`thedate_visited`)>'".Session::get('last_log_time')."' "));?></span></sup</li>
    </ul>

  </div>

</div>
  <div class="row admin-dashbord">
    <div class="col-md-2 admin-sidebar">
      <ul class="admin-sidebar-list">
        <li><a href="/ILSP-group-final-project/admin/index.php"><span class="glyphicon glyphicon-dashboard"></span>Dashbord</a></li>
        <li><a  href="/ILSP-group-final-project/admin/admin-elements/view_organization.php"><span class="glyphicon glyphicon-user"></span>View organization</a></li>
        <li><a href="/ILSP-group-final-project/admin/admin-elements/comment.php"><span class="glyphicon glyphicon-comment"></span>Comment</a></li>
        <li><a  href="/ILSP-group-final-project/admin/admin-elements/request.php"><span class="glyphicon glyphicon-registration-mark"></span>request</a></li>
      </ul>
    </div>



<!--admin footer-->
