<div style="display: none">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
    ?>
</div>
<style>
    fieldset{
        display: none;

    }

    #first{
        display:block;

    }      

    .panel-success{
        border: 1px solid #555;
    }

    *{
        box-sizing: border-box;
    }
    body{
        height:100%;
        background-color: #eee;
    }
    h1{
        font-size:1em;
        text-align:center;
        color: #eee;
        letter-spacing:1px;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
    }
    .nav-container{
        width:200px;
        margin-top:10px;
        box-shadow: 0 2px 2px 2px black;
        transition: all 0.3s linear;
    }
    .nav{
        list-style-type:none;
        margin:0;
        padding:0;
    }
    
    li{
        height:50px; 
        position:relative;
        background: linear-gradient(#292929, #242424);
    }
    a {
        border-top: 1px solid rgba(255,255,255,0.1);
        border-bottom: 1px solid black;
        text-decoration:none;
        display:block;
        height:100%;
        width:100%;
        line-height:50px;
        color:#bbb;
        text-transform: uppercase;
        font-weight: bold;
        padding-left:25%;
        border-left:5px solid transparent;
        letter-spacing:1px;
        transition: all 0.3s linear;
    }
    .active a{
        color: #B93632;
        border-left:5px solid #B93632;
        background-color: #1B1B1B;
        outline:0;
    }
    li:not(.active):hover a{
        color: #eee;
        border-left: 5px solid #FCFCFC;
        background-color: #1B1B1B;
    }
    span[class ^= "icon"]{
        position:absolute;
        left:20px;
        font-size: 1.5em;
        transition: all 0.3s linear;
    }

    @media only screen and (max-width : 860px){

        .text{
            display:none;
        }

        .nav-container , a{
            width: 70px;

        }

        a:hover{
            width:200px; 
            z-index:1;
            border-top: 1px solid rgba(255,255,255,0.1);
            border-bottom: 1px solid black;
            box-shadow: 0 0 1px 1px black;
        }

        a:hover  .text {
            display:block;
            padding-left:30%;
        }
    }
    @media only screen and (max-width : 480px){
        .nav-container, a{ width:50px;}
        span[class ^= "icon"]{ left:8px;}
    }


</style>
<script>
    $('li').click(function () {

        $(this).addClass('active')
                .siblings()
                .removeClass('active');

    });

    function first() {
        document.getElementById("first").style.display = "block";
        document.getElementById("second").style.display = "none";
        document.getElementById("third").style.display = "none";
    }
    function second() {
        document.getElementById("first").style.display = "none";
        document.getElementById("second").style.display = "block";
        document.getElementById("third").style.display = "none";
    }
    function third() {
        document.getElementById("first").style.display = "none";
        document.getElementById("second").style.display = "none";
        document.getElementById("third").style.display = "block";
    }


</script>

<div class="container-fluid ">


    <h1>Slowly resize screen to see the width transition</h1>
    <div class="row">
        <div class="col-sm-2 col-md-3">    
            <div class="nav-container">
                <ul class="nav">
                    <li class="active">
                        <a href="#" onclick="first()" >
                            <span class="icon-home"></span>
                            <span class="text">home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="second()">
                            <span class="icon-user"></span>
                            <span class="text">about</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="third()">
                            <span class="icon-headphones"></span>
                            <span class="text">Audio</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-picture"></span>
                            <span class="text">Portfolio</span>    
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-facetime-video"></span><span class="text">video</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>   
        <div class="col-sm-10 col-md-9">

            <fieldset id="first">

                <div class="panel-success">
                    <div class="panel-heading">
                        <p>generale account sting</p>
                    </div>
                    <div class="panel-body">

                        <!----......................
                            form
                        .............................-->
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">First name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="Jane" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Last name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="Bishop" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Company:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="janesemail@gmail.com" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Username:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="janeuser" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="11111122333" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm password:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="11111122333" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" value="Save Changes" type="button">
                                    <span></span>
                                    <input class="btn btn-default" value="Cancel" type="reset">
                                </div>
                            </div>

                        </form>
                    </div>

                </div> 

            </fieldset>   
            <!-- field set 2 -->
            <fieldset id="second">

                <div class="panel-success">
                    <div class="panel-heading">
                        <p> second sting</p>
                    </div>
                    <div class="panel-body">

                        <!----......................
                            form
                        .............................-->
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">First name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="Jane" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Last name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="Bishop" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Company:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="janesemail@gmail.com" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Username:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="janeuser" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="11111122333" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm password:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="11111122333" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" value="Save Changes" type="button">
                                    <span></span>
                                    <input class="btn btn-default" value="Cancel" type="reset">
                                </div>
                            </div>

                        </form>
                    </div>

                </div> 

            </fieldset>   
            <!--field set 3 -->
            <fieldset id="third">

                <div class="panel-success">
                    <div class="panel-heading">
                        <p>this is thride sting</p>
                    </div>
                    <div class="panel-body">

                        <!----......................
                            form
                        .............................-->
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">First name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="Jane" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Last name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="Bishop" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Company:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" value="janesemail@gmail.com" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Username:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="janeuser" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="11111122333" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm password:</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="11111122333" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" value="Save Changes" type="button">
                                    <span></span>
                                    <input class="btn btn-default" value="Cancel" type="reset">
                                </div>
                            </div>

                        </form>
                    </div>

                </div> 

            </fieldset>   

        </div>   
        <!-- above this is content -->
    </div>
</div>