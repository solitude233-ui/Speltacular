<?php include_once("/home/14zxg/public_html/a5/inc/functions.php"); ?>

<!DOCTYPE html>

<html lang="en">
<?php $src_array = array();
	// Print the head element
	print_head("Home | Speltacular Baking | CISC 282 | A5", $src_array); ?>
   
<body class="column-container">
<!-- Include the header -->
<?php include_once("/home/14zxg/public_html/a5/inc/header.php"); ?> 
	<div class="column">
		<main>
			<h1>Recipes</h1>
		
			<table id="recipe-table">
				<thead>
					<tr>
						<th>Recipe</th>
						<th>Dairy-Free</th>
						<th>Egg-Free</th>
						<th>Vegetarian</th>
						<th>
							<div class="text-and-popup">
								Vegan
								<div class="popup">Vegan recipes don't contain ingredients derived from animals</div>
							</div>
						</th>
						<th>Starter</th>
					</tr>			
				</thead>
				<tbody>
					<tr>
						<td><a href="/~14zxg/a5/recipe/pizza-dough.php">Pizza Dough</a></td>
						<td colspan="5">Yes</td>
					</tr>
					<tr>
						<td>Pie Crust</td>
						<td colspan="2">Yes</td>
						<td colspan="3">No</td>
					</tr>
					<tr>
						<td>Jelly Roll</td>
						<td>Yes</td>
						<td colspan="4">No</td>
					</tr>
					<tr>
						<td>Chocolate Pudding Cake</td>
						<td>No</td>
						<td colspan="2">Yes</td>
						<td colspan="2">No</td>
					</tr>
				</tbody>
			</table>
		
			<section>		
				<h2>Starter</h2>
			
				<p>I used King Arthur Flour's recipe for  <a href="https://www.kingarthurbaking.com/recipes/sourdough-starter-recipe">Sourdough Starter</a> using whole spelt flour with excellent results. I now feed it with a mix of &frac13; whole spelt flour and &frac23; light spelt flour. It's a 100% hydration starter; if yours is different then you'll need to adjust the liquid and/or flour levels in the recipes accordingly.</p>		
			</section>	
		</main>
		
<!-- Include the footer -->		
<?php include_once("/home/14zxg/public_html/a5/inc/footer.php"); ?> 
		
	</div>

</body>
</html>