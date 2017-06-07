<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/function.php';
  $user=DB::getInstance();
  $last_log_time=Session::get('last_log_time');

//collected data selection
$total_view_count;
$return_visitor=0;
$new_user;

    //total visitor
    $user->getAll('count(DISTINCT ip)','stattracker');
    $total_view=$user->results();
  //  print_r($total_view);
    foreach ($total_view as $key => $value) {

      foreach ($value as $key => $value) {
        $total_visitor_count=$value;
      }
    }

 /* //return visitor counter
    $user->getCount("SELECT COUNT(`ip`) FROM `stattracker` WHERE  `return_times`>0");
  $return_visitor=$user->results();
    foreach ($return_visitor as $key => $value) {
      # code..
        foreach ($value as $key ) {
          # code...
          $return_visitor= $key;
        }
    }
//new user counter
  $user->getCount("SELECT count(`id`) FROM `stattracker` WHERE `return_times` =1");
  $new_user=$user->results();
  foreach ($new_user as $key => $value) {
    # code...
      foreach ($value as $key ) {
        # code...
        $new_user= $key;
      }
  }
*/
?>
<script src="/ILSP-group-final-project/lib/js/Chart.min.js"></script>

<style>

.activity_list{
  width: 100%;
  background-color: white;

}

</style>

<div class="col-md-10 admin-body">
  <span class="page-header">New Activity</span>
  <!-- collapsable head -->
  <div class="row">

    <?php



    //total usre registered
    $total_user_reg=select($sql = "SELECT id,username FROM `users` WHERE reg_date>'".Session::get('last_log_time')."' ");

//
//     // select oll user data
//   //should be selected all data form all user tabel
//     $org_total=select($sql = "SELECT  `user_id`, `org_name`, `org_description`, `logo_name`,  `account_status` FROM `organizetions` WHERE `user_id`=".Session::get('user_id'));
//     $org_total=select($sql = "SELECT  `user_id`, `org_name`, `org_description`, `logo_name`,  `account_status` FROM `organizetions` WHERE `user_id`=".Session::get('user_id'));
//
//
//   print_r($total_user_reg);
// echo Session::get('user_id');
//
//     $single_user_profile=profile_file_count($org_total);
//   //echo $single_user_profile;
    $organizetions_id_table=single_array_decoder(select($sql = "SELECT  `id`  FROM `organizetions` WHERE `user_id`=".Session::get('user_id')));
    $organizetions_table=select($sql = "SELECT  `org_name`, `org_description`, `logo_name`  FROM `organizetions` WHERE `user_id`=".Session::get('user_id'));
    $address_table=select($sql = "SELECT  `website`, `fax`, `po_box`, `phone_number`, `tell_phone` FROM `address` WHERE `org_id`='$organizetions_id_table'");
    $location_table=select($sql = "SELECT `latitude`, `longitude`, `location_name`, `region`, `city`, `sub_city` FROM `locations` WHERE `org_id`='$organizetions_id_table'");
    $services_table=select($sql = "SELECT  `category`, `service_in_day`, `service_in_week`, `open_time`, `close_time`, `service_year`, `service_des` FROM `services` WHERE `org_id`='$organizetions_id_table'");


    $tbl1=profile_file_count($organizetions_table);
    $tbl2=profile_file_count($address_table);
    $tbl3=profile_file_count($location_table);
    $tbl4=profile_file_count($services_table);
   $profile_completed=profile_percent($tbl1+$tbl2+$tbl3+$tbl4);
     $profile_uncompleted=100-$profile_completed;



   //session value 
      $last_log_time=Session::get('last_log_time');
    //total request 
    $total_req=select($sql = "SELECT `id`,`org_name`,`org_email` FROM `request` WHERE `account_status`='newRequest' And date(`request-date`) > '".$last_log_time."' ");


?>
<script>
$(document).ready(function(){
  Morris.Donut({
    element: 'profile_Chart',
    data: [
      {value: <?php echo $profile_completed;?>, label: 'completed'},
      {value: <?php echo $profile_uncompleted;?>, label: 'uncompleted'}
    ],
    backgroundColor: '#ccc',
    labelColor: '#060',
    colors: [
      '#0BA462',
      '#39B580'
    ],
    formatter: function (x) { return x + "%"}
  });
});


</script>

    <div class="col-md-4">
      <!-- new registerd user  -->
      <div class="displayer activity_tabs">
        <span class="glyphicon glyphicon-registration-mark"></span>New register organization
        <sup><span class="badge"><?php echo count($total_user_reg);   ?></span></sup>
        <a href="#registration_list" data-toggle="collapse"><span class="glyphicon glyphicon-th-list pull-right"></span></a>
      </div>

    </div>

    <div class="col-md-4">
      <!-- new request -->
      <div class="displayer activity_tabs"><span class="glyphicon glyphicon-registration-mark"></span>New request<sup>
          <span class="badge"><?php echo  count($total_req); ?></span></sup>
        <a href="#request_list" data-toggle="collapse"><span class="glyphicon glyphicon-th-list pull-right"></span></a>
      </div>

    </div>

    <div class="col-md-4">
      <!-- new comment list n -->
      <div class="displayer activity_tabs"><span class="glyphicon glyphicon-comment"></span>New Comment
        <sup><span class="badge">4</span></sup>
        <a href="#comment_list" data-toggle="collapse"><span class="glyphicon glyphicon-th-list pull-right"></span></a>
      </div>

    </div>

  </div>
  <div class="row disctiption_displayer">

    <div class="col-md-4">
      <div class="activity_list collapse" id="registration_list">
        <?php foreach ($total_user_reg as $key): ?>
          <!-- user name should be change to organizetions name  -->
          <li class="activity_list_li"><a href="/ILSP-group-final-project/Acount/index.php?user_id=<?php echo $key->id ?>"><?php echo $key->id ;?>      <?php echo $key->username; ?></a></li>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="activity_list collapse" id="request_list">
        <?php foreach ($total_req as $key): ?>

          <li class="activity_list_li">
            <a href="/ILSP-group-final-project/admin/admin-elements/request.php">
              <?php echo $key->org_name ;?>      <?php echo $key->org_email; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-4"><div class="activity_list collapse" id="comment_list">new comment list</div></div>
  </div>


  <div class="row">
    <div class="col-md-4">
      <div class="wrapper displayer">
        profile status <br>
        <!-- <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="10" aria-valuemax="100" style="width: <?php echo floor($single_user_profile); ?>%;">
          </div>
        </div> -->
          <style>.pofile_Chart_displayer{height: 150px;}</style>
       <p class="pofile_Chart_displayer" id="profile_Chart">  <!--<?php echo floor($single_user_profile) ?> % of user Profile completed!! the height will be longer </p> -->
      </div>
    </div>
    <div class="col-md-8">
      <div class="wrapper displayer">
        Device usage:<br>
        <ul class="device_usage">
          <?php
          //device usage selection statement
          $device=select($sql = "SELECT  `deviceType`, COUNT(deviceType) AS device_num FROM `stattracker` GROUP by deviceType");
          foreach ($device as $key) {
          // print_r($key);

          echo '<li>'.$key->deviceType.'::' .floor($key->device_num*100/$total_page_view).'% </li>';
          ?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php
          }
          ?>
          <!-- <li>Mobile user:
            <span class="mobile_icon">2%</span>
          </li>
          <li>Desktop user:
            <span class="desktop_icon">98%</span>
          </li> -->
          <ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="wrapper displayer">
            <ul class="device_list">

              <li class="device_list_stat">Browser type:
                <span class="desktop_icon"></span>
                <ul class="desktop_browse">
                    <?php $browser_data=select($sql = "SELECT browser,count(browser) AS browser_num FROM `stattracker` GROUP by browser");
                        //print_r($browser_data);
                        foreach ($browser_data as $key) {
                        // print_r($key);
                          echo '<li>'.$key->browser.'::' .$key->browser_num.'</li>';
                        }

                    ?>

                </ul>
              </li>
              </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="wrapper displayer">
                <ul class="device_list">

                  <li class="device_list_stat">Mobile type:
                    <span class="mobile_icon"></span>
                    <ul class="mobile_list">
                      <li>IOS</li>
                        <br>
                      <li>Blackberry</li>
                    </ul>
                  </li>
                  </ul>
                  </div>
                </div>
          </div>

          <style>

          .finished{
            background-color:red; color:black;
          }

          </style>
          <div class="row">
            <div class="col-md-4">
              <div class="wrapper displayer">
                <div class="page-header"><h4>Traffic overview</h4></div>
                <ul class="traffic_overview">

                  <li>Total visitor : <?php  echo single_array_decoder(select($sql = "SELECT count(DISTINCT ip) FROM `stattracker` ")); ?> </li>
                  <li>Total Page view : <?php echo single_array_decoder(select($sql = "SELECT  count(id) FROM `stattracker` "));?></li>
                  <li>Total Return visit :
                    <?php  $total_returns=select($sql = "SELECT  SUM(`return_times`) AS ReturnTimes FROM `stattracker` group by `ip` ");
                        $total_return_times=0;
                      foreach ($total_returns as $key ) {

                          if($key->ReturnTimes>1)
                            $total_return_times+=$key->ReturnTimes;
                      }
                        echo $total_return_times-1;

                    ?>
                  </li>
                  <!-- <li class="finished" >total Page Views {count(id)}
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/hitcounter.php'; ?>
                  </li>
                  <li class="finished">New Visits{count(ip(last logout time>new visite->log_time) }<?php echo $new_user;?></li>
                  <li class="finished">New Visitor{count(DISTINCT ip)where(last logout time>new visite->log_time)}</li>
                  <li>Return visitor{count(ip->existe>1)}<?php echo $return_visitor;?></li>
                  <li>Return visit{count(id) where ip->exist>1 AND last}<?php echo $return_visitor;?></li>
                  <li class="finished">new visite after last log out(not new user)
                  </li>  -->
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="wrapper displayer">
                <div class="page-header"><h4>Traffic Graph</h4></div>
                <script>
                    .traffic_graph{
                      height:200px;
                    }
                </script>
                <div class="traffic_graph" id="traffic_Chart"></div>
                <script>
                var day_data = [
                  {"period": "2012-10-01", "licensed": 06, "sorned": 60},
                  {"period": "2012-09-30", "licensed": 51, "sorned": 29},
                  {"period": "2012-09-29", "licensed": 69, "sorned": 18},
                  {"period": "2012-09-20", "licensed": 46, "sorned": 61},
                  {"period": "2012-09-19", "licensed": 57, "sorned": 67},
                  {"period": "2012-09-18", "licensed": 48, "sorned": 27},
                  {"period": "2012-09-17", "licensed": 71, "sorned": 60},
                  {"period": "2012-09-16", "licensed": 71, "sorned": 76},
                  {"period": "2012-09-15", "licensed": 01, "sorned": 56},
                  {"period": "2012-09-10", "licensed": 15, "sorned": 22}
                  ];
                  Morris.Line({
                  element: 'traffic_Chart',
                  data: day_data,
                  xkey: 'period',
                  ykeys: ['licensed', 'sorned'],
                  labels: ['Licensed', 'SORN']
                  });

                </script>
              </div>
            </div>

          </div>
          <div class="row">
          <table class="table">

            <?php $visit_report=select($sql = "SELECT thedate_visited,sum(return_times) as return_times FROM `stattracker` GROUP by `thedate_visited` ");
              foreach ($visit_report as $key ) {
                echo '<tr><td>'.$key->thedate_visited.'return visit '.$key->return_times.'</td></tr>';
              }


            ?>
          </table>
          <table class="table">
            <?php $visit_report=select($sql = "SELECT COUNT(id) as total_num,thedate_visited FROM `stattracker` GROUP by `thedate_visited`  ");
              foreach ($visit_report as $key ) {
                echo '<tr><td>'.$key->thedate_visited.'total visit '.$key->total_num.'</td></tr>';
              }


            ?>
          </table>
          </div>
<!--
          <div class="row">
            <h3>new test lab</h3><br>
            <div class="row finished">
              <h4>total user </h4><?php  single_array_decoder(select($sql = "SELECT count(DISTINCT ip) FROM `stattracker` "));?>
            </div>
            <div class="row finished">
              <h4>total page view</h4><?php  single_array_decoder(select($sql = "SELECT  count(id) FROM `stattracker` "));?>
            </div>
            <div class="row finished">
              <h4>new visite after logout time/ new visit (not new user)</h4><?php  single_array_decoder(select($sql = "SELECT COUNT(ip) FROM `stattracker` WHERE `thedate_visited`>'2017/05/24 08:58:03pm' "));?>
            </div>
            <div class="row finished">
              <h4>new visitor after logout time (new user after logout time)</h4><?php  single_array_decoder(select($sql = "SELECT COUNT(DISTINCT ip) FROM `stattracker` WHERE `thedate_visited`>'2017/05/24 08:58:03pm' "));?>
            </div>
            <div class="row finished">
              <h4>return visite||times</h4>
                <?php  $total_returns=select($sql = "SELECT  SUM(`return_times`) AS ReturnTimes FROM `stattracker` group by `ip` ");

                    $total_return_times=0;
                  foreach ($total_returns as $key ) {

                      if($key->ReturnTimes>1)
                        $total_return_times+=$key->ReturnTimes;
                  }
                    echo $total_return_times;

                ?>
            </div>

      for graphp input
            <div class="row ">
              <h4>return visite/day</h4><?php  single_array_decoder(select($sql = "  SELECT ip, SUM(`return_times`) AS ReturnTimes FROM `stattracker` WHERE thedate_visited >  '2017/05/24 09:21:28pm' group by `ip`"));?>
            </div>
            <div class="row ">
              <h4>total page view/day</h4><?php  single_array_decoder(select($sql = "SELECT  count(ip) FROM `stattracker` WHERE thedate_visited >  '2017/05/24 09:21:28pm' "));?>
            </div>
            <div class="row ">
              <h4>new visite/day</h4><?php  single_array_decoder(select($sql = "SELECT COUNT(ip) FROM `stattracker` WHERE `thedate_visited`>'2017/05/24 08:58:03pm' "));?>
            </div>

          </div>


<script>
/*var data = {
    labels: [
        "Red",
        "Blue",
        "Yellow"
    ],
    datasets: [
        {
            data: [300, 50, 100],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ]
        }]
};
var ctx = document.getElementById("myChart");
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: options
});
*/
/*var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["day 1", "day 2", "day 3", "day 4", "day 5", "day 6"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});*//*
$(document).ready(function(){
  $.ajax({
    url: "http://localhost:8080/ILSP-group-final-project/admin/admin-elements/total_visitor.php",
    method:"GET",
    success: function(result) {
      console.log(result);
      var ids=[];
      var ips=[];

      var JSONObject = JSON.parse(result);
          for(var i in JSONObject){
            ids.push(JSONObject[i].id);
            ips.push(JSONObject[i].ip);
      }
      var chartdata={
        lables:'test',
        datasets :[
          {
            label:'test',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            data:ips
          }
        ]
      };
      var ctx=$("#myChart");
      var barchart= new Chart(ctx,{
        type:'bar',
        data:chartdata
      });
      //console.log(ids);console.log(ips);
    },
    error:function(result){
      console.log(result);
    }
  });
});*/
</script>

-->
<script>


</script>

        </div>
<?php echo Session::get('last_log_time');  ;?>
