<?php foreach($posts as $post): ?>

<article class="user_post">
	<div id="user_item_content">
		<div id="user_post_username"><?=$post['first_name']?> <?=$post['last_name']?></div>

		<div id="user_post_content"><?=$post['content']?></div>

		<div id="user_post_datetime">
		<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
			<?=Time::display($post['created'])?>
		</time></div>
	</div>

</article>

<?php endforeach; ?>