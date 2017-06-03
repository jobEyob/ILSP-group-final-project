<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
<div id="container_hornav" class="container no-padding">
                       
                        <!-- Slogan -->
                        <p class="site-slogan">WHAT YOU WANT</p>
                        <!-- End Slogan -->
                        <!-- Top Menu -->
                        <div class="row">
                            <div class="hornav-block">
                                
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/element/search.php';?>         
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End Top Menu -->
                    </div>
<!--this for category list navbar-->
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
<div class="container no-padding">
 
 <div class="row">  
                       
<div id="after">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/slide.php'; ?>
    
    </div>

 

 </div>
 </div>

<div id="result"></div>
<div id="paginations">

        <p> <div class="paginations" id="pagination" ></div> 
</div>

<div id="after_search">
    <?php $user->mostvisitgat();
          if ($user->count()){
          $datas=$user->results();
          foreach ($datas as $data){
              //echo $data->org_name.'..'.$data->no_ofView.'<br>';
          }
          
           } 
            ?>
           <div class="container no-padding gridgallery">
                        <!-- Portfolio Header Text -->
                        <div class="row">
                            <div class="col-md-12 padding-vert-30">
                                <h2 class="subtitle text-center">Most visted organization</h2>
                                <h3 class="subtitle text-center"></h3>
                            </div>
                        </div>
                        <!-- End Portfolio Header Text -->
                        <!-- Portfolio Images -->
                        <div class="portfolio-group">
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image1.jpg" alt="image1">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image2.jpg" alt="image2">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image3.jpg" alt="image3">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image4.jpg" alt="image4">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image5.jpg" alt="image5">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image6.jpg" alt="image6">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image7.jpg" alt="image7">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <!-- Portfolio Item -->
                            <div class="portfolio-item col-md-3 col-sm-6 col-xs-6 animate fadeInUp">
                                <div class="image-hover">
                                    <a href="#">
                                        <figure>
                                            <img src="image/portfolio/image8.jpg" alt="image8">
                                            <figcaption>
                                                <h3>Quam putamus</h3>
                                                <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <!-- //Portfolio Item// -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- End Portfolio Images -->
                       
                    </div> 
       <!-- === END CONTENT === -->           
    <div id="base" class="container padding-vert-30">
                        <div class="row">
                            <!-- Disclaimer -->
                            <div class="col-md-6">
                                <h3 class="margin-bottom-10">Disclaimer</h3>
                                <p>All stock images on this template demo are for presentation purposes only, intended to represent a live site and are not included with this template.</p>
                                <p>Most of the images used here are available from
                                    <a class="nobold" href="http://www.shutterstock.com/" target="_blank">shutterstock.com</a>. Links are provided if you wish to purchase them from their copyright owners.</p>
                                <div class="clearfix"></div>
                            </div>
                            <!-- End Disclaimer -->
                            <!-- Contact Details -->
                            <div class="col-md-3">
                                <h3 class="margin-bottom-10">Contact Details</h3>
                                <p>Quay View,
                                    <br />Mullaghmore,
                                    <br />Co. Sligo,
                                    <br />Ireland
                                </p>
                                <p>Email:
                                    <a href="mailto:info@website.com">info@website.com</a>
                                    <br />Website:
                                    <a href="http://www.website.com">www.website.com</a>
                                </p>
                            </div>
                            <!-- End Contact Details -->
                            <!-- Sample Menu -->
                            <div class="col-md-3">
                                <h3 class="margin-bottom-10">Sample Menu</h3>
                                <ul class="menu">
                                    <li>
                                        <a class="fa-tasks" href="#">Placerat facer possim</a>
                                    </li>
                                    <li>
                                        <a class="fa-users" href="#">Quam nunc putamus</a>
                                    </li>
                                    <li>
                                        <a class="fa-signal" href="#">Velit esse molestie</a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <!-- End Sample Menu -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- Footer Menu -->
                    <div id="footermenu" class="container">
                        <div class="row">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a class="fa-shopping-cart" href="#" target="_blank">Sample Link</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- End Footer Menu -->                


</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
