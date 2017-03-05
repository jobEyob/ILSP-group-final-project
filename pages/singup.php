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
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="uname" placeholder="Enter user name">
                        </div> <div class="col-sm-3"> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div> <div class="col-sm-3"> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pwd">Password:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                        </div> <div class="col-sm-3"> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="cpwd">confirm Password:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="cpwd" placeholder="Enter password again">
                        </div> <div class="col-sm-3"> </div>
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
