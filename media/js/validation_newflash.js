/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){  
	//global vars
	var form = $("#form_flash");

	var question = $("#question");
	var questionInfo = $("#questionInfo");
	var category = $("#category");
	var categoryInfo = $("#categoryInfo");
    	
	//On blur
	question.blur(validateQuestion);
	category.blur(validateCategory);

	//On Submitting
	form.submit(function(){  
		if(validateQuestion() & validateCategory())
			return true
		else
			return false;
	});
	

	function validateQuestion(){
		//if it's NOT valid
		if(question.val().length < 4){
			question.addClass("error");
			questionInfo.text("Please enter a question!");
			questionInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			question.removeClass("error");
			questionInfo.text("");
			questionInfo.removeClass("error");
			return true;
		}
	}
	function validateCategory(){
		//if it's NOT valid
		if(category.val() == ''){
			category.addClass("error");
			categoryInfo.text("Please choose a category!");
			categoryInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			question.removeClass("error");
			questionInfo.text("What's your name?");
			questionInfo.removeClass("error");
			return true;
		}
	}	
	

	function validateMessage(){
		//it's NOT valid
		if(message.val().length < 10){
			message.addClass("error");
			return false;
		}
		//it's valid
		else{			
			message.removeClass("error");
			return true;
		}
	}
});