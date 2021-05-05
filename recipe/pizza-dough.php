<?php include_once("/home/14zxg/public_html/a5/inc/functions.php"); ?>

<!DOCTYPE html>

<html lang="en">
<?php //Append all js file paths to the array
	$src_array = array();
	$src_array[] = "src=\"/~14zxg/a5/js/change-quantities.js\"";
	$src_array[] = "src=\"/~14zxg/a5/js/hide-directions.js\"";
	$src_array[] = "src=\"/~14zxg/a5/js/comment-form-validation.js\"";
	// Print the head element
	print_head("Home | Speltacular Baking | CISC 282 | A5", $src_array); ?>
   
<body class="column-container">
<!-- Include the header -->
<?php include_once("/home/14zxg/public_html/a5/inc/header.php"); ?> 
	<div class="column">
		<main>
<?php // Print thank you note
	if ($_POST) { ?>
		<div class="thank-you"> Thank you for your comment! </div>
<?php	} ?>
		<h1>Pizza Dough</h1>
		
		<p>This is a slightly modified version of King Arthur Flour's <a href="https://www.kingarthurbaking.com/recipes/sourdough-pizza-crust-recipe">Sourdough Pizza Crust</a> that substitutes spelt for wheat.</p>

		<section>		
			<h2>Ingredients</h2>

			<div class="quantity-button-group">
				<button class="quantity-button" value="1">Single Batch</button>
				<button class="quantity-button" value="2">Double Batch</button>
				<button class="quantity-button" value="3">Triple Batch</button>				
			</div>
			
			<ul id="batchList">
				<li><span class="batchUpdate">1</span> cup (give or take) of unfed/discard sourdough starter</li> 
				<li><span class="batchUpdate">&frac34;</span> cup lukewarm water</li>
				<li>rounded <span class="batchUpdate">&half;</span> tsp. instant or active dry yeast</li>
				<li><span class="batchUpdate">2&half;</span> cups light spelt flour</li>
				<li><span class="batchUpdate">1</span> tsp. salt</li>
				<li>A little olive oil</li>
			</ul>	
		</section>
			
		<section>				
			<h2>Directions</h2>

			<p>Once a step is complete, click its button to hide it.</p>
			
			<ol class="directions">
				
				<li class="directionStep">Turn your oven light on to create a warm place for the pizza dough to rise.</li>
				<li class="directionStep">Separate your starter into two parts: one to feed and one for the pizza dough. You'll need approximately one cup of starter for this recipe; put it in your largest mixing bowl.
					<img src="/~14zxg/a5/img/separated_starter.jpeg" alt="Sourdough starter divided into a glass container and a bowl"/>
				</li>
				<li class="directionStep">Pour the warm water over the starter and then sprinkle the yeast over it. (This will give the yeast a bit of a head start.)
					<img src="/~14zxg/a5/img/water_and_yeast_added.jpeg" alt="Sourdough starter, water and yeast in a bowl "/>
				</li>
				<li class="directionStep">Add the flour and the salt to the bowl.
					<img src="/~14zxg/a5/img/flour_and_salt_added.jpeg" alt="Sourdough starter, water, yeast, flour and salt layered in a bowl"/>
				</li>
				<li class="directionStep">Mix everything together with your hands. It will initially look messy before forming into a good dough.
					<img src="/~14zxg/a5/img/mixing_by_hand.jpeg" alt="Partly mixed pizza dough in a bowl"/>
				</li>
				<li class="directionStep">The dough should feel slightly sticky but not really stick to your hands or the counter. Don't be afraid to add a little more flour or water to get the right consistency.
					<img src="/~14zxg/a5/img/slightly_sticky_dough.jpeg" alt="Unkneaded dough ball sticking slightly to the counter"/>
				</li>
				<li class="directionStep">Knead the dough for 7 minutes. This is an excellent opportunity to work out any frustration you've been feeling lately. The dough will become smooth and elastic.
					<img src="/~14zxg/a5/img/kneaded_dough.jpeg" alt="Smooth dough ball after kneading"/>
				</li>
				<li class="directionStep">Grease your second-largest mixing bowl with olive oil using your hands. Lightly coat the dough in oil as well, put in the bowl and loosely cover it.
					<img src="/~14zxg/a5/img/oiled_dough.jpeg" alt="Oiled dough ball in a greased bowl"/>
				</li>
				<li class="directionStep">Loosely cover the bowl, put it in the oven and leave it there for 3-4 hours.
					<img src="/~14zxg/a5/img/rising_in_the_oven.jpeg" alt="Bowl loosely topped with a plate in the oven with the light on"/>
				</li>
				<li class="directionStep">The dough will increase in size and become softer. It's now ready to use.
					<img src="/~14zxg/a5/img/risen_dough.jpeg" alt="Risen pizza dough in a greased bowl"/>
				</li>
			</ol>
		</section>	
		
		<section>
			<h2 class="comment-heading">Comments</h2>
<?php // Filter out name input
	$name = filter_input(INPUT_POST, USER_COMMENT_FORM_NAME, FILTER_SANITIZE_STRING);
	if ($name) {
		$name = trim($name);
	}
	// Filter out comment input
	$comment = filter_input(INPUT_POST, USER_COMMENT_FORM_TEXT, FILTER_SANITIZE_STRING); 
	if ($comment) {
		$comment = trim($comment);	
	}	
	// Initiate the array
	$user_comment_array = get_user_comments_from_db(); 
	// Append new input to the array
	if ($_POST) {
		append_user_comment_from_db($user_comment_array, $name, $comment, $timestamp = null);
	}
	// Display each array element
	foreach ($user_comment_array as $comment) { ?>
		<div class="comments">
<?php if ($comment[USER_COMMENT_DB_NAME] == null) { ?>
			<p class="user-name"> <?= USER_COMMENT_DB_NAME_ANONYMOUS ?> </p>
<?php } 
		else {?>
			<p class="user-name"> <?= $comment[USER_COMMENT_DB_NAME] ?> </p>
<?php } ?>
			<p class="user-time"> <?php echo date("M d, Y", $comment[USER_COMMENT_DB_TIMESTAMP]); ?> </p>
			<p class="user-text"> <?= $comment[USER_COMMENT_DB_TEXT] ?> </p>	
		</div>
<?php } ?>
		
		</section>
		
		<section>
<?php
$display = True;
// Change display to false after submission to hide the form
if (isset($_POST['submit'])) {
	$display = False;
}
if ($display) {
?>
			<h2 class="post-comment">Post a Comment</h2>
			<form id="comment-form" method="post" action="">
				<div class="form-name joined">
					<label for="<?= USER_COMMENT_FORM_NAME ?>">Name:</label>
					<input type="text" name="<?= USER_COMMENT_FORM_NAME ?>" id="<?= USER_COMMENT_FORM_NAME ?>"/>
				</div>
				<div class="form-text joined">
					<label for="<?= USER_COMMENT_FORM_TEXT ?>">Comment (Required):</label>
					<textarea name="<?= USER_COMMENT_FORM_TEXT ?>" id="<?= USER_COMMENT_FORM_TEXT ?>" rows="5" required></textarea>
				</div>
				<input type="submit" name="submit" value="Post" id="submit-button"/>
			</form>
<?php
}
?>
		</section>
	</main>
	
<!-- Include the footer -->		
<?php include_once("/home/14zxg/public_html/a5/inc/footer.php"); ?> 
		
	</div>

</body>
</html>