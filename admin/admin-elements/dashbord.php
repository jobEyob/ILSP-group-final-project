<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/function.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>




<style>

.activity_list{
  width: 100%;
  background-color: white;

}

</style>

<div class="col-md-10 admin-body">

  <span class="page-header">New Activity</span>
  <div class="row">
    <div class="col-md-4">
      <?php
      $user=DB::getInstance();


      $total_view_count;
      $return_visitor;
      $new_user;
      $user->getAll('id,user_id,org_name,org_description','organizetions');
      //print_r( $user->results());

      $org_total=$user->results();
      $single_user_profile=profile_percent($org_total);
      $total_user_profile_completion=$single_user_profile*100/count($org_total);
      //print_r($org_total);

      //total visitor
      $user->getAll('count(DISTINCT ip)','stattracker');
      $total_view=$user->results();

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
      <div class="row">



      </div>
      <div class="displayer activity_tabs">
        <span class="glyphicon glyphicon-registration-mark"></span>New register organization
        <sup><span class="badge"><?php echo count($org_total);?></span></sup>
        <a href="#registration_list" data-toggle="collapse"><span class="glyphicon glyphicon-th-list pull-right"></span></a>
      </div>

    </div>
    <div class="col-md-4">
      <?php

      $user->get('request',array('verify', '=', '0' ));
      $request_num=$user->results();
      //print_r($request_num);

      ?>
      <div class="displayer activity_tabs"><span class="glyphicon glyphicon-registration-mark"></span>New request<sup>
          <span class="badge"><?php echo count($request_num); ?></span></sup>
        <a href="#request_list" data-toggle="collapse"><span class="glyphicon glyphicon-th-list pull-right"></span></a>
      </div>

    </div>
    <div class="col-md-4">
      <div class="displayer activity_tabs"><span class="glyphicon glyphicon-comment"></span>New Comment
        <sup><span class="badge">4</span></sup>
        <a href="#comment_list" data-toggle="collapse"><span class="glyphicon glyphicon-th-list pull-right"></span></a>
      </div>

    </div>
  </div>
  <div class="row disctiption_displayer">

    <div class="col-md-4">
      <div class="activity_list collapse" id="registration_list">
        <?php foreach ($org_total as $key): ?>
          <li class="activity_list_li"><a href="/ILSP-group-final-project/Acount/index.php?user_id=<?php echo $key->user_id ?>"><?php echo $key->id ;?>      <?php echo $key->org_name; ?></a></li>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="activity_list collapse" id="request_list">
        <?php foreach ($request_num as $key): ?>
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
        Quick setting<br>
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="10" aria-valuemax="100" style="width: <?php echo floor($total_user_profile_completion/100); ?>%;">
          </div>
        </div>
        <p class=""><?php echo floor($total_user_profile_completion*3/100) ?> % of user Profile completed!!</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="wrapper displayer">
        Device usage:<br>
        <ul class="device_usage">
          <li>Mobile user:
            <span class="mobile_icon">2%</span>
          </li>
          <li>Desktop user:
            <span class="desktop_icon">98%</span>
          </li>
          <ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="wrapper displayer">
            <ul class="device_list">
              <li>Mobile user:
                <span class="mobile_icon"></span>
                <li><ul class="mobile_type">
                  <li>IOS</li>
                  <li>samsunge</li>
                  <li>other</li>
                </ul>
              </li>
              <li>Desktop user:
                <span class="desktop_icon"></span>
                <ul class="desktop_browse">
                    <?php $browser_data=select($sql = "SELECT count(browser),browser FROM `stattracker` GROUP by browser");
                      //  print_r($browser_data);

                    ?>
                  <li>firefox</li>
                  <li>opera</li>
                  <li>other</li>
                </ul>
              </li>
              <ul>
              </div>
            </div>
          </div>
          <!--lode counter in cookies-->
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
                  <li class="finished">Total user {count(DISTINCT ip)}
                      <?php  echo $total_visitor_count; ?>
                  </li>
                  <li class="finished" >total Page Views {count(id)}
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/hitcounter.php'; ?>
                  </li>
                  <li class="finished">New Visits{count(ip(last logout time>new visite->log_time) }<?php echo $new_user;?></li>
                  <li class="finished">New Visitor{count(DISTINCT ip)where(last logout time>new visite->log_time)}</li>
                  <li>Return visitor{count(ip->existe>1)}<?php echo $return_visitor;?></li>
                  <li>Return visit{count(id) where ip->exist>1 AND last}<?php echo $return_visitor;?></li>
                  <li class="finished">new visite after last log out(not new user)
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="wrapper displayer">
                <div class="page-header"><h4>Traffic Graph</h4></div>
                <div class="traffic_graph">  <canvas id="myChart" ></canvas>this is the web traffic graph</div>
              </div>
            </div>

          </div>

          <div class="row">
            <h3>new test lab</h3><br>
            <div class="row finished">
              <h4>total user </h4><?php  single_array_decoder(select($sql = "SELECT count(DISTINCT ip) FROM `stattracker` "));?>
            </div>
            <div class="row finished">
              <h4>total page view</h4><?php  single_array_decoder(select($sql = "SELECT  count(ip) FROM `stattracker` "));?>
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




        </div>
