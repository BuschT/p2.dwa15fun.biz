<form method='POST' action='/posts/p_add' id="form_newpost">

	<label for='newpost_content'>New Post:</label><br>
	<textarea name='content' maxlength='200' id='newpost_content'></textarea>

	<br><br>
	<input type='submit' value='New post'>

</form>

<?php if(isset($error)): ?>
	<div class='error'>
		Unable to add post. Please make sure there is actual content in your post. It cannot be empty.
	</div>
	<br>
<?php endif; ?>
<div id="nav_hint_addpost"></div>