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
