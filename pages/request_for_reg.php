<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/pages/element/search.php'; ?>

<div ><!--onload="document.myform.org_name.focus();"-->
    <div class="container">
        <h3>step 1</h3>
        <div class="panel panel-primary">
            <div class="panel-heading" ><h4>Request for Registration required</h4> </div>
            <div class="panel-body">

                <!-- this for request form  -->


                <form class="form-horizontal" name="registration" onSubmit="return formValidation();" >
                    <div class="form-group" >
                        <label class="control-label col-sm-3" for="org_name">Organization name:</label>
                        <div class="col-sm-5" id="div_name">
                            <input type="text" class="form-control" id="org_name" name="org_name" placeholder="Enter organization name" onblur="chack_empty('org_name')" required>

                            <span name="error" id="name_error" style="display: none" > organization name should not be empty </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Email:</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                   onblur="chack_empty('email'); validateemail('email')" required>
                            <span name="error" id="email_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_phone">Phone number: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="org_phone"  name="org_phone" placeholder="Enter pone number"  onblur="chack_empty('org_phone'); phonenumber_validate('org_phone')" required>
                            <span name="error" id="phone_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_location">Location: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="org_location" name="org_location" placeholder="Enter city"  onblur="chack_empty('org_location'); location_validate('org_location')"
                                   onkeyup="location_validate('org_location')" required>
                            <span name="error" id="location_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_paper">authorization paper: </label>
                        <div class="col-sm-5">
                            <input name="authorization paper" type="file"  id="org_paper"  required>
                            <span class="help-block">that ...</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" name="btn-submit" class="btn-u btn-primary" >Submit</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

</div>

</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
