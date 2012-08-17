/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){  
	//global vars
	var form = $("#form_register");

	var nationality = $("#nationality");
	var nationalityInfo = $("#nationalityInfo");
	var residence = $("#residence");
	var residenceInfo = $("#residenceInfo");
	var gender = $("#gender");
	var genderInfo = $("#genderInfo");	
	var born_y = $("#born_y");
	var born_yInfo = $("#born_yInfo");
	var born_d = $("#born_d");
	var born_dInfo = $("#born_dInfo");
	var born_m = $("#born_m");
	var born_mInfo = $("#born_mInfo");
          	
	//On blur
	nationality.blur(validateNationality);
	residence.blur(validateResidence);
	gender.blur(validateGender);
	born_y.blur(validateBornY);
	born_d.blur(validateBornD);
  born_m.blur(validateBornM);
    	
	//On Submitting
	form.submit(function(){   
		if(validateNationality() & validateResidence() & validateGender() & validateBornY() & validateBornD() & validateBornM() )
			return true
		else
			return false;
	});
	
	function validateNationality(){
		//if it's NOT valid
		if(nationality.val() == ''){
			nationality.addClass("error");
			nationalityInfo.text("Please choose a nationality!");
			nationalityInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			nationality.removeClass("error");
			nationalityInfo.text("");
			nationalityInfo.removeClass("error");
			return true;
		}
	}	

	function validateResidence(){
		//if it's NOT valid
		if(residence.val() == ''){
			residence.addClass("error");
			residenceInfo.text("Please choose a residence!");
			residenceInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			residence.removeClass("error");
			residenceInfo.text("");
			residenceInfo.removeClass("error");
			return true;
		}
	}		

  function validateGender(){
		//if it's NOT valid
		if(gender.val() == ''){
			gender.addClass("error");
			genderInfo.text("Please choose a gender!");
			genderInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			gender.removeClass("error");
			genderInfo.text("");
			genderInfo.removeClass("error");
			return true;
		}
	}		

  function validateBornY(){
		//if it's NOT valid
		if(born_y.val() == ''){
			born_y.addClass("error");
			born_yInfo.text("");
			born_yInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			born_y.removeClass("error");
			born_yInfo.text("");
			born_yInfo.removeClass("error");
			return true;
		}
	}		

  function validateBornM(){
		//if it's NOT valid
		if(born_m.val() == ''){
			born_m.addClass("error");
			born_mInfo.text("");
			born_mInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			born_m.removeClass("error");
			born_mInfo.text("");
			born_mInfo.removeClass("error");
			return true;
		}
	}	

  function validateBornD(){
		//if it's NOT valid
		if(born_d.val() == ''){
			born_d.addClass("error");
			born_dInfo.text("");
			born_dInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			born_d.removeClass("error");
			born_dInfo.text("");
			born_dInfo.removeClass("error");
			return true;
		}
	}	
    	
});