<?php
require "./Model/chatModel.php";

class chatController
{
    public function chatAffiche(){
        session_start();
        if(isset($_POST['envoimsg'])){
            $_SESSION['user'] = $this->test_input($_POST['pseudo']);
            $message = $this->htmlspecialchars($_POST['message']);

            $leChat = new chatModel();


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