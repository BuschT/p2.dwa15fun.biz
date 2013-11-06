$( document ).ready(function() {

	//Set the nav
	if($("#nav_hint_latestactivity" + name).length > 0) {
		$("#nav_posts").addClass("active");
	} else if($("#nav_hint_addpost" + name).length > 0) {
		$("#nav_posts_add").addClass("active");
	} else if ($("#nav_hint_users" + name).length > 0) {
		$("#nav_posts_users").addClass("active");
	} else if ($("#nav_hint_manage" + name).length > 0) {
		$("#nav_posts_manage").addClass("active");
	}

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

	$("#form_modifypost").submit(function(e){
		if (!validateEditPost()){
			e.preventDefault();
		}
	});
});

function validateNewPost(){
	if ($('#newpost_content').val().length >200){
		$(".error").html("Please limit your post content to maximum 200 characters");
		return false;
	}
	if ($('#newpost_content').val().length <= 0){
		$(".error").html("Your post cannot be empty!");
		return false;
	}
	return true;
}

function validateEditPost(){
	if ($('#editpost_content').val().length >200){
		$(".error").html("Please limit your post content to maximum 200 characters");
		return false;
	}
	if ($('#editpost_content').val().length <= 0){
		$(".error").html("Your post cannot be empty!");
		return false;
	}
	return true;
}

function validateSignInFields(){
	if ($.trim($('#signin_email').val()) == '' || $.trim($('#signin_password').val()) == ''){
		$(".error").html("Email and Password Fields May Not Be Empty");
		return false;
	}
	if ($.trim($('#signin_email').val()).indexOf("@") == -1){
		$(".error").html("You did not enter a valid email.");
		return false;
	}
	return true;
}

function validateSignUpFields(){
	if ($.trim($('#signup_firstname').val()) == '' || $.trim($('#signup_lastname').val()) == ''
		|| $.trim($('#signup_email').val()) == '' || $.trim($('#signup_password').val()) == ''){
		$(".error").html("No Fields May Be Empty");
		return false;
	}
	if ($.trim($('#signup_email').val()).indexOf("@") == -1){
		$(".error").html("Please enter a valid email.");
		return false;
	}
	if ($('#signup_password').val().length <6){
		$(".error").html("Your password should be at least six characters");
		return false;
	}
	return true;
}

function checkUnsupportedCharacters(){
	//^[\w ]+$
	//$('input[class^="player-"]').filter(function() {
    //return((" " + this.className + " ").match(/\splayer-\d+\s/) != null);
}


