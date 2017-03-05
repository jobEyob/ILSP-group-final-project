<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
?>
<!-- validation fanction
        <script>
            function chack_empty(filde_id) {
                var Myvalue = document.getElementById(filde_id).value;

                if (Myvalue == "" || Myvalue == null)
                {
                    alert("empty");

                }

            }

            function validateemail(email_id)
            {
                var x = document.getElementById(email_id).value;
                var atposition = x.indexOf("@");
                var dotposition = x.lastIndexOf(".");
                if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
                    alert("Please enter a valid e-mail address \n atpostion:" + atposition + "\n dotposition:" + dotposition);
                    return false;
                }
            }
      /// validate phone numbers
            function phonenumber_validate(org_phone_id)
            {
                var phone = document.getElementById(org_phone_id).value;
                var phoneno = /^\d{10}$/;
                var phoneno_s2 = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/; // to use a + sign before the number
                if (phone.match(phoneno) || phone.match(phoneno_s2))
                {
                    return true;
                } else
                {
                    alert('phone number must have numeric characters only');
      //document.getElementById("phone_error").innerHTML="phone number must have numeric characters only";
                    return false;
                }
            }
      // location validation

            function location_validate(org_location_id)
            {
                var location = document.getElementById(org_location_id).value;
                var letters = /^[A-Za-z]+$/;
                if (location.match(letters))
                {
                    return true;
                } else
                {
                    alert('location must have alphabet characters only');
                    //document.getElementById("location_error").innerHTML="location must have alphabet characters only";
                    return false;
                }
            }

        </script>
-->


<div ><!--onload="document.myform.org_name.focus();"-->
    <div class="container">
        <h3>step 1</h3>
        <div class="panel panel-primary">
            <div class="panel-heading">request for Registration required </div>
            <div class="panel-body">

                <!-- this for request form  -->


                <form class="form-horizontal" name="registration" onSubmit="return formValidation();" >
                    <div class="form-group" >
                        <label class="control-label col-sm-3" for="org_name">Organization name:</label>
                        <div class="col-sm-9" id="div_name">
                            <input type="text" class="form-control" id="org_name" name="org_name" placeholder="Enter organization name" onblur="chack_empty('org_name')" required>

                            <span name="error" id="name_error" style="display: none" > organization name should not be empty </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                   onblur="chack_empty('email'); validateemail('email')" required>
                            <span name="error" id="email_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_phone">Phone number: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="org_phone"  name="org_phone" placeholder="Enter pone number"  onblur="chack_empty('org_phone'); phonenumber_validate('org_phone')" required>
                            <span name="error" id="phone_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_location">Location: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="org_location" name="org_location" placeholder="Enter city"  onblur="chack_empty('org_location'); location_validate('org_location')"
                                   onkeyup="location_validate('org_location')" required>
                            <span name="error" id="location_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="org_paper">authorization paper: </label>
                        <div class="col-sm-9">
                            <input name="authorization paper" type="file"  id="org_paper"  required>
                            <span class="help-block">that ...</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
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
