<?php if(sizeof($users) > 0){
	foreach($users as $user): ?>
		<div class="user_item">
			<!-- Print this user's name -->
			<div id="user_item_name"><?=$user['first_name']?> <?=$user['last_name']?></div>

			<!-- If there exists a connection with this user, show a unfollow link -->
			<div id="user_item_follow">
				<?php if(isset($connections[$user['user_id']])): ?>
					<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

				<!-- Otherwise, show the follow link -->
				<?php else: ?>
					<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
				<?php endif; ?>
			</div>
		</div>
		<br>
	<?php endforeach;
} else {
	?>There are no users to show. <?php
}?>