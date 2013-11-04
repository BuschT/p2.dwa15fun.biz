<form method='POST' action='/users/p_login' id="form_signin">

	<p>You Must Log In To Continue</p>

    Email<br>
    <input type='text' name='email' id="signin_email">
    <br><br>

    Password<br>
    <input type='password' name='password' id="signin_password">
    <br><br>

    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Log in'>

</form>