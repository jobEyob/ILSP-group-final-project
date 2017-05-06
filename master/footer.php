
<style>
    footer {
        background-color: #555;
        color: white;
        padding: 15px;
        
    }
   

</style>
<!--page on should have one body tag-->
<div id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <footer class="container-fluid text-center" id="fo" >
        
        <a class="up-arrow" href="#myPage"  title="TO TOP"  >    
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
     
  <br>
        
  
  
        <?php
        echo "<p>Copyright &copy; 2017-" . date("Y") . " einfo.com</p>";
        ?>
    </footer> 
   
</div>

<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFeO0plq2ej2d-aSIyMx_tTgXz5YYstnU&callback=initMap">
    </script>
</body>
</html>
