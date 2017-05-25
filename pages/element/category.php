<?php    ?>
<!--this for category list navbar-->
&nbsp;
      <nav>
            <div class="container" id="nav_category"  style="display: block" >
               <!-- <span style="float:right" onclick="ilps_close_nav()" class="glyphicon glyphicon-remove"></span> -->
                <ul  id="category_list">
                   <?php 
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
      } ?> 
                </ul>
               
            </div>
      </nav>


