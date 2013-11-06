<form method='POST' action='/users/p_login' id="form_signin">

	<p class="section_intro">You Must Log In To Continue</p>
	<div class="entry_form">
		<div class="text_label">Email</div>
			<input type='text' name='email' class="entry_input" id="signin_email">
		<br><br>

		<div class="text_label">Password</div>
			<input type='password' name='password' class="entry_input" id="signin_password">
		<br><br>
	</div>

	<?php if(isset($error)): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<?php endif; ?>

	<input type='submit' value='Log in'>

</form>