/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//this js for automatic scrolling the page
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $("#navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  });
  
  
  // this for category navegation with close option
  function ilps_open_nav(x) {
  if (document.getElementById("nav_" + x).style.display == "block") {
    ilps_close_nav(x);
  } else {
     ilps_close_nav("category");
    
    document.getElementById("nav_" + x).style.display = "block";
    if (document.getElementById("navbtn_" + x)) {
      document.getElementById("navbtn_" + x).getElementsByTagName("i")[0].style.display = "none";
      document.getElementById("navbtn_" + x).getElementsByTagName("i")[1].style.display = "inline";
    } 
    if (x == "search") {
      if (document.getElementById("gsc-i-id1")) {document.getElementById("gsc-i-id1").focus(); }
    }
  }
}
function ilps_close_nav(x) {
  document.getElementById("nav_" + x).style.display = "none";
  if (document.getElementById("navbtn_" + x)) {
    document.getElementById("navbtn_" + x).getElementsByTagName("i")[0].style.display = "inline";
    document.getElementById("navbtn_" + x).getElementsByTagName("i")[1].style.display = "none";
  }
}

// This for form validation 

//function formValidation(){
    //var org_name =document.getElentById("org_name").value;
    //var org_name =document.myform.org_name.value;
    //var  org_email=document.getElentById("email").value;
      //var  org_phone=document.getElentById("org_phone").value;
        //var  org_location=document.getElentById("org_location").value;
       
       function formValidation()  
    {  
    var uname = document.registration.org_name;
    var uemail = document.registration.email;    
    var uadd = document.registration.org_location;  
    var uzip = document.registration.org_phone;  
    
    

    
    if(chack_empty(uname))  
    { 
    if(validateemail(uemail))  
    { 
    if(location_validate(uadd))  
    {   
    if(phonenumber_validate(uzip))  
    {   
    }  
    }   
    }  
    }   
   
    return false;  
      
    }        

        function chack_empty(filde_id) {
              var Myvalue = document.getElementById(filde_id);

                if (Myvalue.value == "" || Myvalue.value == null)
                {
               
               alert("the filde not be empty")
                //displayError(Myvalue , Myvalue.parentNode.id, "filde is empty" );
                filde_id.focus(); 
                return false;                              
                }
                else{
                return true;
            }
            }

            function validateemail(email_id)
            {
                var x = document.getElementById(email_id).value;
                var atposition = x.indexOf("@");
                var dotposition = x.lastIndexOf(".");
                if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
                    alert("Please enter a valid e-mail address \n atpostion:" + atposition + "\n dotposition:" + dotposition);
                    email_id.focus();
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
                    org_phone_id.focus();
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
                    
                } else
                {
                    alert('location must have alphabet characters only');
                    //document.getElementById("location_error").innerHTML="location must have alphabet characters only";
                    org_location_id.focus();
                    return false;
                }
            }
    
    
    
        
   /** this display error massge
 function displayError(filede_id , parent_div, messag ){
    
    var para= document.createElement("p");
    var error_msg =document.createTextNode(messag);
                           
    para.appendChild(error_msg);
    
    document.getElementById(parent_div).appendChild(para);
    
} */  
