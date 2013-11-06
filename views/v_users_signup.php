<form method='POST' action='/users/p_signup' id="form_signup">

	<p class="section_intro">Please provide the following information to sign up:</p>
	<div class="entry_form">
		<div class="text_label">First Name</div>
			<input type='text' name='first_name' maxlength='25' class="entry_input" id="signup_firstname">
		<br><br>

		<div class="text_label">Last Name</div>
			<input type='text' name='last_name' maxlength='25' class="entry_input" id="signup_lastname">
		<br><br>

		<div class="text_label">Email</div>
			<input type='text' name='email' maxlength='50' class="entry_input" id="signup_email">
		<br><br>

		<div class="text_label">Password</div>
			<input type='password' name='password' maxlength='25' class="entry_input" id="signup_password">
		<br><br>
	</div>

    <input type='submit' value='Sign up'>

	<?php if(isset($error)): ?>
	    <?php if(isset($duplicate)): ?>
			<div class='error'>
				There is a user already signed up with that email. Please create an account with a different email.
			</div>
			<br>
		<?php else: ?>
			<div class='error'>
				Signup failed. Please make sure you fill out all forms properly and turn your javascript on!
			</div>
			<br>
    	<?php endif; ?>
    <?php endif; ?>

</form>
