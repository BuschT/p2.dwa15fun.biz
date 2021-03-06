<?php if(sizeof($posts) > 0){
	foreach($posts as $post): ?>
		<article class="user_post">
			<div class="user_item_content">
				<div class="user_post_username"><?=$post['first_name']?> <?=$post['last_name']?></div>

				<div class="user_post_content"><?=$post['content']?></div>

				<div class="user_post_datetime">
					<time datetime="<?=Time::display($post['modified'],'Y-m-d G:i')?>">
					<?=Time::display($post['modified'])?>
					</time>
				</div>
				<div class="manage_post">
					<a href='/posts/edit/<?=$post['post_id']?>'>EDIT</a>
					<a href='/posts/delete/<?=$post['post_id']?>'>DELETE</a>
				</div>
			</div>
		</article>
	<?php endforeach;
} else {
	?>You don't have any posts to manage.<?php
}?>
<div id="nav_hint_manage"></div>