<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="./css/reset.css">
		<link type="text/css" rel="stylesheet" href="./css/sheet1.css">
		<script src="https://kit.fontawesome.com/6df16185e9.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="icomoon/icomoon.css">
		<title>Un ptit chat</title>
	</head>
	<body>
		<header>
			<nav class="menu">
				<ul>
					<li><a class ="bouton" href="index.php"><i class="fas fa-home"></i></a></li>
					<li><a class ="bouton" href="index.php?route=chat">Le chat</a></li>
					<?php 
						if(isset($_SESSION['User'])){
							echo '<li><a class ="bouton" href="./View/deconnect.php">Deconnexion</a></li>';
						}
						else{
							echo '<li><a class ="bouton" href="index.php?route=connect">Connexion</a></li>';					
						}
					?>
				</ul>
			</nav>
		</header>
		<main>
			<nav class="sidebar">
				<?php 
					if(isset($_SESSION['User'])){
					echo '<h3> Bienvenue '.$_SESSION['User'].'</h3>';
				}
				else{
				    echo '<h3>Bienvenue</h3> <br>';
					echo'<a class ="bouton" href="index.php?route=register">Inscription</a>';
				}
				?>

			</nav>
