<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

	<!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>

</head>

<body>
	<div class="container">
	  <div class="header">
		<ul class="nav nav-pills pull-right">
		  <!-- <li class="active"><a href="#">Home</a></li> -->
		  <li><a href="/">Home</a></li>
		  <!-- Menu for users who are logged in -->
			<?php if($user): ?>
				<li><a href='/users/logout'>Logout</a></li>
				<li><a href='/users/profile'>Profile</a></li>
			<!-- Menu options for users who are not logged in -->
			<?php else: ?>
				<li><a href='/users/signup'>Sign up</a></li>
				<li><a href='/users/login'>Log in</a></li>
			<?php endif; ?>
		</ul>
		<h3 class="text-muted">BlogTastic!</h3>
	  </div>
	  <div class="content_options">
	  	<ul class="nav nav-pills">
	  		<li><a href="/posts">Latest Activity</a></li>
	  		<li><a href="/posts/add">Add Post</a></li>
	  		<li><a href="/posts/users">Users</a></li>
	  		<li><a href="/posts/manage">Manage Posts</a></li>
	  	</ul>
	  </div>
	  <div class="jumbotron">
		 <!-- Content! -->
		 <?php if(isset($content)) echo $content; ?>
	  </div>

	  <div class="footer">
		<p>&copy; BlogTastic! 2013</p>
	  </div>

    </div> <!-- /container -->

    <br>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

	<!-- placed at end of file so code page loads faster -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="/js/blogtastic.js"></script>
	<script src="/js/bootstrap.min.js"></script>

</body>
</html>