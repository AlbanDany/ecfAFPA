<?php
require "./Model/chatModel.php";

class chatController
{
    public function chatAffiche(){
        $leChat = new chatModel();
        $lemsg = $leChat->getMessage();

        if(isset($_POST['envoimsg'])){


            $message = htmlspecialchars($_POST['message']);

            if(!isset($_SESSION['User'])) {
                $_SESSION['user'] = $this->test_input($_POST['pseudo']);
                $idUser = $leChat->saveUser($_SESSION['user']);
            }
            else{
               // $result = $leChat->getIdUser($_SESSION['User']);
                $idUser = $_SESSION['idUser'];
            }
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