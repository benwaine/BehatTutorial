

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>BEHAT EXAMPLES</title>
		<link type="text/css" href="js/css/smoothness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/js/jquery-ui-1.8.21.custom.min.js"></script>
		<script type="text/javascript">
		// YOUR JS HERE

		$(function() {
		var availableTags = [
		"Ben",
		"Benjamin",
		"Berty",
		"Matthew",
		"Sue",
		"Alex",
		"Tony",
		"Zoe",
		"Peter",
		"Wayne",
		"Ernie",
		"Queenie"
		];
		$("#name").autocomplete({
			source: availableTags
		});
	});

		</script>
	</head>
	<body>
	<!-- YOUR HTML HERE --> 

		<?php 

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if(isset($_POST['name']) && !empty($_POST['name']))
			{
				echo "<h1>Hello ". $_POST['name'] ."</h1>";		
			}
			else
			{
				echo "<h1>Hello Stranger</h1>";	
			}

			echo '<a href="/">Clear</a>';
		}

		?>
		<div class="ui-widget">
			<form method="POST">
				<label for"name">Your Name: </label><input type="text" id="name" name="name" />
				<input  type="submit" name="submit" value="submit" />
			</form>
		</div>
	</body>

</html>





