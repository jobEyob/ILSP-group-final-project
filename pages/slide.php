<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="/ILSP-group-final-project/image/free-wallpaper-9.jpg" height="6px" alt="Image">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
     <img src="/ILSP-group-final-project/image/background-wallpapers-7.jpg" height="6px" alt="Image">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<style>
    /*
  this css is used before search and before cliking category. must plased in slide.php b/c slide.php is fade out
    */
    .search {
         margin-top: -25% !important;
         
            }
    @media screen and (max-width: 1270px) and (min-width: 922px) {
    .search {
         margin-top: -30%;
            }}
   @media screen and (max-width: 923px) and (min-width: 800px) {
    .search {
         margin-top: -48%;
            }}
   @media screen and (max-width: 799px) and (min-width: 700px) {
    .search {
         margin-top: -56%;
         
            }}
   @media screenc and (max-width: 400px) and (min-width: 118px) {
    .search {
         margin-top: -200%;
        
            }}        
    #nav_category{
     padding-top: 94px;
}        
</style>

