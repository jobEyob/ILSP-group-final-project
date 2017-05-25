<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>

<?php 
$item_per_page = 1;$location_val='';$data='';$output='';


$user= DB::getInstance();
if(isset($_POST["cate_val"])){
$category_val= Input::get('cate_val');
$location_val= Input::get('loca_val');
$lat_val=Input::get("lat_val");
$lng_val=Input::get("lng_val");
} else {
   $category_val=Session::get('category_val'); 
   $location_val=Session::get('location_val'); 
   $lat_val= Session::get('lat_val');
   $lng_val= Session::get('lng_val');
}


?>

 <style>
        @import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";

#SearchResults { margin-top: 20px; }
.mb20 { margin-bottom: 20px; } 

hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }
section article {  border: 1px solid #ccc; margin-bottom: 20px; margin-left: 0px; margin-right: 0px; }
#section li:hover {
  background: #eee;
  cursor: pointer;
}
#section ul {
  list-style-type: none;
}

#section li a img {
  float: left;
  margin: 0 15px 0 0;
}

/*#section:hover{color: aquamarine} 
     #section {transition: 1s ease;} 
    
     #section section:hover{-webkit-transform: scale(1.1);
-ms-transform: scale(1.1);
transform: scale(1.1);
transition: 1s ease;}  */

.search-result .thumbnail { border-radius: 0 !important; }
.search-result:first-child { margin-top: 0 !important; }
.search-result { margin-top: 20px; }
.search-result .col-md-2 { border-left: 1px dotted #ccc; min-height: 140px; }
.search-result ul { padding-left: 0 !important; list-style: none;  }
.search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
.search-result ul li i { padding-right: 5px; }
.search-result .col-md-7 { position: relative; }
.search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
.search-result h3 > a, .search-result i { color: #248dc1 !important; }
.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 

.search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
    </style>
   
<script>
$(function () {
      $("#section h3 a").click(function () {
       // alert("HTML: " + $("#Container").html());
        //alert("Text: " + $(this).text());
        var inputval = $(this).text();  
          
          if(inputval !== ''){
               
                $.ajax({ 
                                type: 'post',
                                url: "/ILSP-group-final-project/pages/org-details.php",
                                //method:"POST",

                                //datatype: 'html'
                                data:"inputval="+inputval,
                                        success: function (data)
                                        {
                                           $('#result').html(data);
                                           $("#orgname").val("");
                                           $('#after').remove();
                                           $("#after_search").fadeOut();
                                            //window.location.href="/ILSP-group-final-project/pages/org-details.php";
                                        },

                                error: function (xhr) {
                                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                                }

                            });
                    }
       
      });
    });
    
   
</script>
     

<?php
/* $location_val='';$data='';$output='';


$user= DB::getInstance();

$category_val= Input::get('cate_val');
$location_val= Input::get('loca_val');
//echo 'ty'.$category_val.','.$location_val;

 $user->andget($category_val,$location_val);
if (!$user->count()){
    //Redirect::to("../index.php");
    echo 'Data Not Found';
      } else {
    $pages_datas=$user->results(); 
    
    //breaking total records into pages
    $total_row= count($pages_datas); 
   $total_row= 2;
$pages = ceil($total_row / $item_per_page);
echo $pages;
}*/

//sanitize post value
$page=Input::get("page");

//$category_val=Session::get('category_val');
//echo 'p:',$page.'<br>',$category_val;

if(isset($_POST["page"])){
    $page_number = filter_var($page, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);

    if($lat_val =="undefined" || $lng_val =="undefined" ){
       $user->andget($category_val,$location_val,$position, $item_per_page);
    }else{
       $user->neartogat($category_val,$lat_val,$lng_val,$position, $item_per_page);
    }

if (!$user->count()){
    //Redirect::to("../index.php");
    echo 'Data Not Found';
    
      } else {
    $datas=$user->results();
    
           ?>
<div class="container" id="SearchResults">       
    <hgroup class="mb20">
		<h1>Search Results</h1>
                
		<h2 class="lead"><strong class="text-danger"><?php echo count($datas); ?></strong> results were found for the search for <strong class="text-danger"><?php echo $category_val ?></strong></h2>								
	</hgroup>
         
          <?php          
          //print_r($user->results());
          
          foreach ($datas as $data){
             // echo $data->org_name.'<br>';
             $output .='
      
    <div id="section">
    <section class="col-xs-12 col-sm-6 col-md-12"> 
    <ul>
       <li>
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/people" alt="Lorem ipsum" /></a>
			</div>
			
			<div  class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3 > <a   href="#" >'.$data->org_name.'</a></h3>
                <div class="addreas"><h5>'.$data->city.' , '.$data->sub_city.'</h5></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>						
                
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
					<li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
					<li><i class="glyphicon glyphicon-tags"></i> <span>People</span></li>
				</ul>
			</div>
			<span class="clearfix borda"></span>
		</article>
        </li>
        </ul>
	</section>
        
    </div>
    
   ';
         }
    echo $output;
      }
?>
         
        
         
</div>          
    
<script>
   $(document).ready(function(){
       
      $("#pagination").fadeIn() 
       
   });

</script>