/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

  
  
$(document).ready(function(){

	//global vars
	var form = $("#form_register");

	var email = $("#email");
	var emailInfo = $("#emailInfo");

  var email2 = $("#email_check");
	var email2Info = $("#email2Info");
	
	var pass1 = $("#pw");
	var pass1Info = $("#pass1Info");

  var pass2 = $("#pw_check");
	var pass2Info = $("#pass2Info");

	var reg = $("#reg");     
	//On key press
	//name.keyup(validateName);


	//On blur
	email.blur(validateEmail);
	email2.blur(validateEmail2);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);


	//On Submitting
	form.submit(function(){  

	 if (validateEmail() & validateEmail2() & validatePass1() & validatePass2() ) {   	
        reg.click();  
        return false;     
   }

		else return false;  
	
	});


	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){		
    		var d=new Date();
    
        var email_existing = $.ajax({
                    type: "GET",
                    url: root_dir+"lib/jquery_functions.php?s=check_email&email="+a+"&t="+d.getTime(),
                    async: false
                       }).responseText;
                           
                 
         if (email_existing == 0) { 
           		email.removeClass("error");
          		emailInfo.text("");
          	  emailInfo.removeClass("error");
              return true; 
         }
         else { 
        			email.addClass("error");
              emailInfo.text("taken");
              emailInfo.addClass("error"); 
              return false;
         } 
                               
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("not valid");
			emailInfo.addClass("error");
			return false;
		}
	}
	
  	function validateEmail2(){
		var a = $("#email");
		var b = $("#email_check");
		//are NOT valid
		if( email.val() != email2.val() ){
			email2.addClass("error");
			email2Info.text("no match!");
			email2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			email2.removeClass("error");
			email2Info.text("");
			email2Info.removeClass("error");
			return true;
		}
	} 
	
	function validatePass1(){
		var a = $("#pw");
		var b = $("#pw_check");

		//it's NOT valid
		if(pass1.val().length <5){
			pass1.addClass("error");
			pass1Info.text("too short");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			pass1.removeClass("error");
			pass1Info.text("");
			pass1Info.removeClass("error");
		//	validatePass2();
			return true;
		}
	}  
	
	function validatePass2(){
		var a = $("#pw");
		var b = $("#pw_check");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("no match!");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{     
			pass2.removeClass("error");
			pass2Info.text("");
			pass2Info.removeClass("error");
			return true;
		}
	} 
  
});

