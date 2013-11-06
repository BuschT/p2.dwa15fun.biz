<?php foreach($post as $incoming): ?>
	<form method="POST" action="/posts/p_update/<?=$incoming['post_id']?>" id="form_modifypost">

		<label for='editpost_content'>Edit Post:</label><br>
		<textarea name='content' maxlength='200' id='editpost_content'><?=$incoming['content']?></textarea>

		<br><br>
		<input type='submit' id="form_updatepost" value='Update Post'>

	</form>
<?php endforeach; ?>
<div id="nav_hint_manage" />