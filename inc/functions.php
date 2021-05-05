<?php
/******************************************************************************/
/* Head Element */
/******************************************************************************/
function print_head($page_title, $src_array) { ?>
    <head>
		<title>Home | Speltacular Baking | CISC 282 | A5</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Sarah-Jane Whittaker"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet">
	
		<link rel="stylesheet" href="/~14zxg/a5/css/styles.css"> 	
		<link rel="stylesheet" href="/~14zxg/a5/css/responsive.css">

<?php 
	// Load javascript if the array is not empty
	foreach ($src_array as $value) { ?>
	<script <?= $value ?>></script>
<?php } ?>
	</head>
<?php
    }
?>
<?php

/******************************************************************************/
/* User Comments - Form */
/******************************************************************************/
define("USER_COMMENT_FORM_NAME", "commenter-name");
define("USER_COMMENT_FORM_TEXT", "comment-text");


/******************************************************************************/
/* User Comments - Database */
/******************************************************************************/
define("USER_COMMENT_DB_NAME", "name");
define("USER_COMMENT_DB_NAME_ANONYMOUS", "An Anonymous Baker");
define("USER_COMMENT_DB_TIMESTAMP", "timestamp");
define("USER_COMMENT_DB_TEXT", "text");

/* This function stands in for a database query and returns a similar set 
   of "rows". The keys are defined as constants. */
function get_user_comments_from_db() {
	$user_comment_array = array();
	
	append_user_comment_from_db($user_comment_array,
		null, 
		"This looks great!!! I haven't made it yet, but I'm sure it's amazing!!!!!!!! Five stars!!!!!!!!!!!!!!!!!",
		1611205200);

	append_user_comment_from_db($user_comment_array,
		"Chris Smith",
		"This recipe is terrible. I substituted rice flour for the spelt, oat milk for the water and baking soda for the yeast and it didn't turn out at all. Don't make this!",
		1613106000);
	
	return $user_comment_array;
}

/* This function adds/appends the contents of a comment as a "row" to the 
   given array. */
function append_user_comment_from_db(&$user_comment_array, $commenter_name, $comment_text, $timestamp = null) {
	// If no timestamp was provided, use the current time. 
	if (! $timestamp) {
		$timestamp = time();	
	}
	
	$user_comment_array[] = array(
		USER_COMMENT_DB_NAME => $commenter_name,
		USER_COMMENT_DB_TIMESTAMP => $timestamp,
		USER_COMMENT_DB_TEXT => $comment_text);
}
?>