
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
        
        <a class="up-arrow" href="#myPage"  title="TO TOP">    
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        
        
  <br>
        
        <?php
        echo "<p>Copyright &copy; 2017-" . date("Y") . " einfo.com</p>";
        ?>
    </footer> 
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/element/login.php'; ?>
</div>
</body>
</html>
