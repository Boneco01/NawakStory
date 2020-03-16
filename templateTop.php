<?php
	session_start();
?>

<!DOCTYPE html>
<html>

	<!-- En-tête de la page -->

	<head>
		<title> Nawak Story </title>
		<link rel="stylesheet" type="text/css" href="css/template.css">
		<link rel="icon" type="image/png" href="images/boussole.png"/>
		<meta meta name="viewport" content="width=device-width, user-scalable=no" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>

	<!-- Corps de la page -->

	<body class="mx-auto">
		<!-- Tête de page -->

		<header class="pt-2 pb-2 mx-auto">
			<a href="home.php" class=""><h1 class="text-center text-white"> Nawak Story </h1></a>
		</header>

		<!-- Menu de navigation -->

		<nav id="navBarChoice" class="navbar navbar-expand-md navbar-light text-white mt-n2 mx-auto">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav navbar-left w-100">
					<li class="nav-item col text-center mw">
						<a href="adventure.php"> 
							<span class="navlink"> Aventures </span>
						</a>
					</li>
				</ul>

				<ul class="navbar-nav w-100">
					<li class="nav-item col text-center">
						<a href="chronicle.php"> 
							<span class="navlink"> Chroniques </span>
						</a>
					</li>

					<li class="nav-item col text-center ml-2">
						<a href="rules.php">
							<span class="navlink"> Règles </span>
						</a>
					</li>

					<li class="nav-item col text-center">
						<a href="barrack.php">
							<span class="navlink"> Caserne </span>
						</a>
					</li>
				</ul>

				<ul class="navbar-nav navbar-right w-100">
					<li class="nav-item col text-center">		
						<?php
							if (isset($_SESSION['pseudo'])) {
								echo("
									<a href=\"connexion.php?action=deconnect\"> 
										<span class=\"navlink\"> Se reposer </span>
									</a>
								");
							} else {
								echo("
									<a href=\"connexion.php\"> 
										<span class=\"navlink\"> Rejoindre </span>
									</a>
								");
							}
						?>
					</li>
				</ul>
			</div>
		</nav>
	</body>
</html>