<?php
class posts_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			Router::redirect('/users/login');
		}
	}

	public function add($error = NULL) {

		# Setup view
		$this->template->content = View::instance('v_posts_add');
		$this->template->title   = "New Post";
		$this->template->content->error = $error;

		# Render template
		echo $this->template;

	}

	public function p_add() {

		# Make sure it isn't empty
		if (trim($_POST['content']) == false){
			Router::redirect("/posts/add/error");
		}

		# Associate this post with this user
		$_POST['user_id']  = $this->user->user_id;

		# Unix timestamp of when this post was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Insert
		# Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('posts', $_POST);

		# Send them back to the manage page to see and confirm the post
		Router::redirect("/posts/manage");

	}

	public function p_update($postid) {

		# Create the data array we'll use with the update method
		$data = Array("content" => htmlspecialchars($_POST['content']), "modified"=>Time::now());

		# Sanitize
		$postid = DB::instance(DB_NAME)->sanitize($postid);

		# Do the update, no sanitize necessary because we are using the update method
		DB::instance(DB_NAME)->update_row("posts", $data, "WHERE post_id = '".$postid."'");

		# Send them back to the page
		Router::redirect("/posts/manage");

	}

	public function index() {

		# Set up the View
		$this->template->content = View::instance('v_posts_index');
		$this->template->title   = "All Posts";

		# Query
		$q = 'SELECT
				posts.content,
				posts.created,
				posts.modified,
				posts.user_id AS post_user_id,
				users_users.user_id AS follower_id,
				users.first_name,
				users.last_name
			FROM posts
			INNER JOIN users_users
				ON posts.user_id = users_users.user_id_followed
			INNER JOIN users
				ON posts.user_id = users.user_id
			WHERE users_users.user_id = '.$this->user->user_id.
			' ORDER BY posts.modified DESC';

		# Run the query, store the results in the variable $posts
		$posts = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->posts = $posts;

		# Render the View
		echo $this->template;

	}

	public function users() {

		# Set up the View
		$this->template->content = View::instance("v_posts_users");
		$this->template->title   = "Users";

		# Build the query to get all the users
		# Make sure they can't see themselves in the list so they can't follow/unfollow self
		$q = "SELECT *
			FROM users
			WHERE user_id != ".$this->user->user_id;

		# Execute the query to get all the users.
		# Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);

		# Build the query to figure out what connections does this user already have?
		# I.e. who are they following
		$q = "SELECT *
			FROM users_users
			WHERE user_id = ".$this->user->user_id;

		# Execute this query with the select_array method
		# select_array will return our results in an array and use the "users_id_followed" field as the index.
		# This will come in handy when we get to the view
		# Store our results (an array) in the variable $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

		# Pass data (users and connections) to the view
		$this->template->content->users       = $users;
		$this->template->content->connections = $connections;

		# Render the view
		echo $this->template;
	}

	public function follow($user_id_followed) {

		# Prepare the data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);

		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);

		# Send them back
		Router::redirect("/posts/users");

	}

	public function unfollow($user_id_followed) {

		# Sanitize
		$user_id_followed = DB::instance(DB_NAME)->sanitize($user_id_followed);

		# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);

		# Send them back
		Router::redirect("/posts/users");

	}

	public function delete($postid){

		# Sanitize
		$postid = DB::instance(DB_NAME)->sanitize($postid);

		# Delete this post
		$where_condition = 'WHERE post_id = '.$postid;
		DB::instance(DB_NAME)->delete('posts', $where_condition);

		# Send them back
		Router::redirect("/posts/manage");

	}

	public function edit($postid){

		# Set up the View
		$this->template->content = View::instance("v_posts_edit");
		$this->template->title   = "Edit Post";

		# Prevent SQL injection attacks by sanitizing the data
		$postid = DB::instance(DB_NAME)->sanitize($postid);

		# Get the existing post from the DB
		$q = 'SELECT
			post_id,
			content
		FROM posts WHERE post_id = '.$postid;

		$post = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->post = $post;

		# Render the View
		echo $this->template;

	}

	public function manage(){

		# Set up the View
		$this->template->content = View::instance('v_posts_manage');
		$this->template->title   = "Manage Posts";

		# Prevent SQL injection attacks by sanitizing the data
		$this->user->user_id = DB::instance(DB_NAME)->sanitize($this->user->user_id);

		# Query
		$q = 'SELECT
				posts.post_id,
				posts.content,
				posts.created,
				posts.modified,
				posts.user_id AS post_user_id,
				users.first_name,
				users.last_name
			FROM posts
			INNER JOIN users
				ON posts.user_id = users.user_id
			WHERE users.user_id = '.$this->user->user_id.
			' ORDER BY posts.modified DESC';

		# Run the query, store the results in the variable $posts
		$posts = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->posts = $posts;

		# Render the View
		echo $this->template;

	}

}