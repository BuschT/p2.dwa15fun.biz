<?php foreach($post as $incoming): ?>
	<form method="POST" action="/posts/p_update/<?=$incoming['post_id']?>" id="form_modifypost">

		<label for='newpost_content'>Edit Post:</label><br>
		<textarea name='content' maxlength='200' id='newpost_content'><?=$incoming['content']?></textarea>

		<br><br>
		<input type='submit' value='Update Post'>

	</form>
<?php endforeach; ?>