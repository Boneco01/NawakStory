<?php

	include './templateTop.php';
	include './connexionBD.php';

	class History extends ConnexionBD {
		
	}

	/* --- --- --- --- --- */

	$monHistoire = new History();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/history.css">
	</head>

	<!-- Corps de page -->

	<body class="mx-auto">
		<section class="mx-auto">
			<div class="w-75 pb-1 mx-auto">
				<?php
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
					}

					switch ($id) {
						case '1':
						case '2':

							echo "
								<h2 class=\"py-3 text-center\"> Page n°" . $_GET['page'] . " </h2>
							";
							include 'stories/story' . $id . '.php';
							break;
						
						default:
							header('Location: adventure.php');
							break;
					}
				?>
			</div>
		</section>

		<?php
			include './templateBottom.php';
		?>
	</body>
</html>