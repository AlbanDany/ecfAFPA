<?php

require './Controller/userController.php';
require './Controller/homeController.php';
require './Controller/chatController.php';

if (isset($_GET['route'])){
	if($_GET['route'] == "chat"){
		$leChat = new chatController();
		$leChat->chatAffiche();
	}

	if($_GET['route'] == "connect"){
        $user = new userController();
        $user->connexion();
	}
}else{
		$accueil = new homeController();
		$accueil->home();
}