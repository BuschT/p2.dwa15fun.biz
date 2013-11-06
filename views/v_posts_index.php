<?php if(sizeof($posts) > 0){
	foreach($posts as $post): ?>
		<article class="user_post">
			<div id="user_item_content">
				<div id="user_post_username"><?=$post['first_name']?> <?=$post['last_name']?></div>

				<div id="user_post_content"><?=$post['content']?></div>

				<div id="user_post_datetime">
				<time datetime="<?=Time::display($post['modified'],'Y-m-d G:i')?>">
					<?=Time::display($post['modified'])?>
				</time></div>
			</div>
		</article>
	<?php endforeach;
} else {
	?>You don't have any posts in your feed. Try following some people to see some posts.<?php
}?>
<div id="nav_hint_latestactivity" />
