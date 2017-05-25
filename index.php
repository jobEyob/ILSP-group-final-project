<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
  
<div id="after">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/slide.php'; ?>
    <br>
    </div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/element/search.php'; ?>
 

<div id="result"></div>
<div id="paginations">
        <p> <div class="pagination" id="pagination" ></div> 
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

<div class="container-fluid">
    <!-- Container (advertasemant Section) -->
    <div id="portfolio" class="container-fluid text-center bg-grey">
        <h2>Most visited</h2><br>
        <h4>What we have created</h4>
        <div class="row text-center slideanim">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="/ILSP-group-final-project/image/free-wallpaper-9.jpg" alt="Paris" width="400" height="300">
                    <p><strong>Paris</strong></p>
                    <p>Yes, we built Paris</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                     <img src="/ILSP-group-final-project/image/free-wallpaper-9.jpg" alt="Paris" width="400" height="300">
                    <p><strong>New York</strong></p>
                    <p>We built New York</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                     <img src="/ILSP-group-final-project/image/free-wallpaper-9.jpg" alt="Paris" width="400" height="300">
                    <p><strong>San Francisco</strong></p>
                    <p>Yes, San Fran is ours</p>
                </div>
            </div>
        </div>
    </div>
    <br>

<div class="container">
    <!-- Container (Contact Section) -->
   
    
</div>
<!--for sher as -->
<!-- Container (advertasemant Section) -->
    <div id="portfolio" class="container-fluid text-center bg-grey">
        <h2>Portfolio</h2><br>
        <h4>What we have created</h4>
        <div class="row text-center slideanim">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="/ILSP-group-final-project/image/free-wallpaper-9.jpg" alt="Paris" width="400" height="300">
                    <p><strong>Paris</strong></p>
                    <p>Yes, we built Paris</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="/ILSP-group-final-project/image/free-wallpaper-9.jpg" alt="Paris" width="400" height="300">
                    <p><strong>New York</strong></p>
                    <p>We built New York</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="/ILSP-group-final-project/image/free-wallpaper-9.jpg" alt="Paris" width="400" height="300">
                    <p><strong>San Francisco</strong></p>
                    <p>Yes, San Fran is ours</p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
