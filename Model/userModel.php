<?php

require './Model/modelePDO.php';
class userModel {

    private $lastId;
    /*Connexion*/

    public function getUserData($user){
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $req = $bdd->query("SELECT idUser,nom FROM user WHERE nom = '$user'");
        $dataUser = $req->fetch();
        return $dataUser;
    }

    public function getDataMdp($idUser){
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $sqlMdp = $bdd->query("SELECT pwd, date FROM password WHERE date = (SELECT max(date) FROM password WHERE idUser = '$idUser')");
        $dataMdp = $sqlMdp->fetch();
        return $dataMdp;
    }


    /*Inscription*/

    public function insert_user($name,$email,$confirmKey){
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        // $query = $bdd->prepare('INSERT INTO utilisateur
        $query = $bdd->prepare('INSERT INTO user 
						(nom, email,token) VALUES (:nom,:email,:confirm)'); //Prepare la requete d'insertion de données
        $query->bindParam(':nom', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':confirm', $confirmKey);
        //  $query->bindParam(':token', $token);
        $query->execute();
        return $bdd->lastInsertId();
    }

    public function insert_mdp($mdp,$idUser){
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $queryMdp = $bdd->prepare("INSERT INTO password (idpwd,pwd,date,idUser) VALUES (NULL,:mdp,now(),:idUser	)");
        $queryMdp->bindParam(':mdp', $mdp);
        $queryMdp->bindParam(':idUser', $idUser);
        $queryMdp->execute();
    }

    public function user_exist($user,$email) {
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $sqlCheck = $bdd->query("SELECT nom, email FROM user WHERE nom = '" . $user . "' OR email= '" . $email . "' ");
        $resCheck = $sqlCheck->fetch();
        return $resCheck;
    }
}


