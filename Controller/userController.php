<?php
require './Model/userModel.php';

class userController{
    public function connexion(){
        session_start();
        if (isset($_POST['btnConnexion'])){
            $userClear = $this->test_input($_POST['user']);
            $mdp = password_hash("'".$_POST['mdp']."'", PASSWORD_BCRYPT);
            $theUser = new userModel();
            $dataUser = $theUser->getUserData($userClear);
            $dataMdp = $theUser->getDataMdp($dataUser['idUser']);
            $date = date_create($dataMdp['dateDebut']);
            $dateFin = date_add($date, date_interval_create_from_date_string('3 months'));
            $dateJour= date_create(date('Y-m-d'));

            if (empty($userClear) || empty($mdp) ) //Oubli d'un champ
            {
                $_SESSION['message'] = "Vous devez remplir tous les champs";
                return header("Location: index.php?route=connect");
            }

           if ($dateJour > $dateFin)//Le mot de passe a plus de 3 mois
            {
                $_SESSION['message'] = "Mot de passe expiré";
                return header("Location: nouveaumdp.php?user='$userClear'"); //revoie du user par GET
            }

            if ($userClear != $dataUser['nom'])
            {
                $_SESSION['message'] = "Pas d'utilisateur correspondant";
                return header("Location: index.php?route=connect");
            }

            if ($userClear == $dataUser['nom']) //L'utilisateur est correct
            {
                if (password_verify ($_POST['mdp'], $dataMdp['mdp'])) // Le mot de passe est correct
                {
                    $_SESSION['User'] = $userClear;
                    header("Location: ./index.php");
                }
                else
                {
                    $_SESSION['message'] =  "Mauvais mot de passe ";
                    return header("Location: ./index.php?route=connect");
                }
            }
        }
        else{
            require './View/connectView.php';
        }
    }

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }

    public function register(){

        if(isset($_POST['btnRegister'])){
            $user = $this->test_input($_POST['utilisateur']);
            $email = $this->test_input($_POST['adresseMail']);
            $actif = 0; //Par défaut le compte est inactif
            $mdp = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(32));

            $newUser = new userModel();
            $resCheck = $newUser->user_exist($user,$email);

            if (empty($user) || empty($_POST['motdepasse']) || empty($email) ) //Oubli d'un champs
            {
                $_SESSION['erreur'] = "Vous devez remplir tous les champs";
                return header("Location: index.php?route=register");
            }

            if (strtolower ($user) == strtolower($resCheck['nom'])) //l'utilisateur existe déjà
            {
                $_SESSION['erreur'] = "Utilisateur existant";
                return header("Location: index.php?route=register");
            }

            if (strtolower ($email) == strtolower($resCheck['email'])) //l'email est déjà utilisé
            {
                $_SESSION['erreur'] = "Email déjà utilisé";
                return header("Location: index.php?route=register");
            }

            if (!isset($_POST['mdpConfirm']) || ($_POST['mdpConfirm'] != $_POST['motdepasse'])) // La confirmation de mdp est fausse
            {

                $_SESSION['erreur'] = "Confirmation de mot de passe éronée";
                return header("Location: index.php?route=register");
            }

            //Si il n'y a pas d'erreurs
            $confirmKey = "12345";
            $userID =  $newUser->insert_user($user,$email,$confirmKey);
            var_dump($userID);
            $newUser->insert_mdp($mdp,$userID);
            $_SESSION['message'] = "Inscription réussie, veuillez vous connecter ";
            header("Location: index.php?route=connect");
    }
        else{
            require './View/registerView.php';
        }
    }
}