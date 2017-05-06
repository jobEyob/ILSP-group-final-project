<?php require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/core/init.php';   ?>
?>

<?php 
$item_per_page = 1;
$category_val= Input::get('cate_val');
$location_val= Input::get('loca_val');
Session::put('category_val', $category_val);
Session::put('location_val', $location_val);

//echo 'ty'.$category_val.','.$location_val;

 $user->getAll('*','organizetions');
if (!$user->count()){
    //Redirect::to("../index.php");
    echo 'Data Not Found';
      } else {
    $pages_datas=$user->results(); 
    //print_r($pages_datas);
    //breaking total records into pages
    $total_row= count($pages_datas); 
   //$total_row= 2;
$pages = ceil($total_row / $item_per_page);
//echo $pages;
}

?>

<div>
 
            <script>  
 $(function() {
    $( "#orgname" ).autocomplete({
        
        source: '/ILSP-group-final-project/pages/element/backend-search.php',
        minLength: 1//search after one characters
        

    });
});
 $(document).ready(function(){
 
         //alert("Enter some text..");
         function search(){
           var inputval = $('#orgname').val(); 
           
           //alert(query);
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
                                           
                                           $("#after_search").fadeOut();
                                            //window.location.href="/ILSP-group-final-project/pages/org-details.php";
                                        },

                                error: function (xhr) {
                                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                                }

                            });
                    }
         }
         $("#btn-search").click(function(){ 
             search();
         });
      
      $("#orgname").keyup(function(e){ 
          if(e.keyCode == 13){
             search();
         }
         });
         
      $(document).on('click', '#category_list li', function(){  
             var query = $(this).text();
            //alert(query);
      }); 
      
       $('#category_list li').click(function(){ 
              var cate_val = $(this).text();
              var loca_val = $('#location').val();
           
            //alert(query);
             var data_string = "cate_val="+cate_val + '&loca_val='+loca_val;
               if(data_string !== ''){
                   
                    
                                            $.ajax({
                                                url: '',
                                                type: 'post',
                                                data:data_string,
                                                success: function () {
                                                   // $('#div-second-dropdown').html(html);
               
                $.ajax({ 
                                type: 'post',
                                url: "/ILSP-group-final-project/pages/search-results.php",
                                //method:"POST",

                                //datatype: 'html'
                               data:data_string,
                                        success: function (data)
                                        {
                                            //alert(cate_val);
                                            //alert(loca_val);
                                           $('#result').html(data);
                                          // $("#orgname").val("");
                                           $("#after_search").fadeOut();
                                            //window.location.href="/ILSP-group-final-project/pages/org-details.php";
                                           
  $(document).ready(function() {
 //$("#result").load("/ILSP-group-final-project/pages/search-results.php" ); 
  
 $(".pagination").bootpag({
    total: <?php echo $pages; ?>,
    //page: 1, //initial page
    //maxVisible: 5 //maximum visible links
 }).on("page", function(e, num){
  e.preventDefault();
   
  $("#result").prepend('<div class="loading-indication"><img src="/ILSP-group-final-project/image/ajax-loader.gif"> Loading...</div>');
  $("#result").load("/ILSP-group-final-project/pages/search-results.php", {'page':num});
    
   /* var page = num;
    //alert(page);
    $.ajax(
            {
        url:'/ILSP-group-final-project/pages/search-results.php',
        method:"POST",
        data:"page="+page,
        
        success: function (){
            //alert(page);
            
        },
        error: function (xhr) {
                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                        }
        
    }); */
    
    
 });

});  
                                             
                                        
                                            
                                        },//

                                error: function (xhr) {
                                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                                }

                            });
                            
                         }//
                                            });//      
                            
                            
                    }
         });
     
     
        
         
   });

/*$(document).ready(function(e){
    $('#mnu-category').find('a').click(function(e) {
        e.preventDefault();
        var cat = $(this).text();
        $('#srch-category').text(cat);
        $('#txt-category').val(cat);
    });
}); */
    
    $(document).ready(function(){

        $('input[type="checkbox"]').click(function(){

            if($(this).prop("checked") == true){

                alert("Checkbox is checked.");

            }

            else if($(this).prop("checked") == false){

                //alert("Checkbox is unchecked.");

            }

        });

    });
             
         
         
 </script> 
           <style>  
     
        #btn-search {
        
        border: 0;
        /*background: none; */
        border-radius: 0 13px 13px 0;
            
            
    }  
    #location {
        border-radius: 0 13px 13px 0;
        
    }
    #orgname {
        border-radius: 0 4px 4px 0;
    }            
    #nearto{
         margin-left: 20px;          
     }
   
               
               
           </style>  
</div> 
 <div class="jumbotron">
  
           <br /><br />  
            <p>search organization by category or name</p>
           <div class="container"  >  
                
                  <div class="row">
  <div class="col-md-2" >
                    </div>                 
     
  <div class="col-md-4">
   
    <div class="input-group">
        <span class="input-group-btn">
        <button class="btn btn-default" type="button">Where?</button>
      </span>
      <input type="text" name="location" id="location" class="form-control" aria-label="..." placeholder="Where?"  autocomplete="off">
      
    </div><!-- /input-group -->
   <div id="nearto">
   <label  for="test">Near to Me</label>
<label class="myCheckbox" >
    <input type="checkbox" name="test" id="myCheckbox" >
    <span></span>
</label>
      </div>
  </div><!-- /.col-lg-6 --> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           
  <div class="col-md-5">
    <div class="input-group">
   <!--   <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span id="srch-category">Category</span> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" id="mnu-category" >
          <li><a href="#">hotel</a></li>
          <li><a href="#">education</a></li>
          <li><a href="#">hosptal</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div><!-- /btn-group 
      -->
      <input type="hidden" id="txt-category"><!-- /this is for test -->
     
      <input type="text" name="orgname" id="orgname" class="form-control"  aria-label="..." placeholder="search By Name or keyword">
      
      <div class="input-group-btn">
       <span class="input-group-btn">
            <button id="btn-search" type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
      </div><!-- /btn-group -->
      
      
    </div><!-- /input-group -->
     
  </div><!-- /.col-lg-6 -->
    
  <div class="col-md-1">
        
        </div>
  
</div><!-- /.row -->  
                 
                
           </div>  
</div>
