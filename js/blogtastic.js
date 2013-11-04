$( document ).ready(function() {
	alert("OK");
	$("#form_signup").submit(function(e){
		if (!validateSignUpFields()){
			e.preventDefault();
		}
	});

	$("#form_signin").submit(function(e){
		if (!validateSignInFields()){
			e.preventDefault();
		}
	});

	$("#form_newpost").submit(function(e){
		if (!validateNewPost()){
			e.preventDefault();
		}
	});

});

function validateNewPost(){
	if ($('#newpost_content').val().length >200){
		alert("Please limit your post content to maximum 200 characters");
		return false;
	}
	if ($('#newpost_content').val().length <= 0){
		alert("Your post cannot be empty!");
		return false;
	}
	return true;
}

function validateSignInFields(){
	if ($.trim($('#signin_email').val()) == '' || $.trim($('#signin_password').val()) == ''){
		alert("Email and Password Fields May Not Be Empty");
		return false;
	}
	if ($.trim($('#signin_email').val()).indexOf("@") == -1){
		alert("You did not enter a valid email.");
		return false;
	}
	return true;
}

function validateSignUpFields(){
	if ($.trim($('#signup_firstname').val()) == '' || $.trim($('#signup_lastname').val()) == ''
		|| $.trim($('#signup_email').val()) == '' || $.trim($('#signup_password').val()) == ''){
		alert("No Fields May Be Empty");
		return false;
	}
	if ($.trim($('#signup_email').val()).indexOf("@") == -1){
		alert("Please enter a valid email.");
		return false;
	}
	if ($('#signup_password').val().length <6){
		alert("Your password should be at least six characters");
		return false;
	}
	return true;
}

function checkUnsupportedCharacters(){
	//^[\w ]+$
	//$('input[class^="player-"]').filter(function() {
    //return((" " + this.className + " ").match(/\splayer-\d+\s/) != null);
}


