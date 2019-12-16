<?php
require "./Model/chatModel.php";

class chatController
{
    public function chatAffiche(){
        session_start();
        $leChat = new chatModel();
        $lemsg = $leChat->getMessage();

        if(isset($_POST['envoimsg'])){

            $_SESSION['user'] = $this->test_input($_POST['pseudo']);
            $message = htmlspecialchars($_POST['message']);


            $idUser =  $leChat->saveUser($_SESSION['user']);
            $leChat->saveMessage($message,$idUser);
            header("Location: index.php?route=chat");
        }
        else{
            require './View/chatView.php';
        }
    }



 //Fonction qui teste et assainni les inputs
private function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
}