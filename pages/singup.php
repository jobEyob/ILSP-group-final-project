<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?> 
<div>
    <div class="container">

        <div class="panel panel-primary">    
            <div class="panel-heading"> <h3>sign up</h3> </div>  
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="uname">username:</label>
                        <div class="col-sm-6" inputGroupContainer>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>    
                            <input type="text" class="form-control" id="uname" placeholder="Enter user name">
                        </div> <div class="col-sm-3"> </div>
                        </div>
                    </div>
                    <!-- ...email..... -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">Password:</label>
                        <div class="col-sm-6" inputGroupContainer>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-eye-open"></i></span>   
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                         
                            </div>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="cpwd">confirm Password:</label>
                        <div class="col-sm-6" inputGroupContainer >
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-eye-open"></i></span>     
                            <input type="password" class="form-control" id="cpwd" placeholder="Enter password again">
                        </div> <div class="col-sm-3"> </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div> 

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
