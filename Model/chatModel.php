<?php

class chatModel {
    public function saveUser($pseudo){
        $email = "oui@oui.fr";
        $token = "123456789";
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $query = $bdd->prepare('INSERT INTO user 
						(nom, email,token) VALUES (:nom,:email,:token)'); //Prepare la requete d'insertion de données
        $query->bindParam(':nom', $pseudo);
        $query->bindParam(':email', $email);
        $query->bindParam(':token', $token);
        $query->execute();
        return $bdd->lastInsertId();
    }

    public function saveMessage($message,$idUser){
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $query = $bdd->prepare('INSERT INTO message 
						(contenu, datemsg, idUser) VALUES (:contenu,now(),:idUser)'); //Prepare la requete d'insertion de données
        $query->bindParam(':contenu', $message);
        $query->bindParam(':idUser', $idUser);
        $query->execute();
    }

    public function getMessage(){
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $req = "SELECT  contenu, datemsg, nom FROM message AS m, user AS u WHERE m.idUser = u.idUser ORDER BY datemsg DESC";
        $result = $bdd->query($req);
        return $result->fetchAll();
    }

    public function getIdUser($user){
        $bdd2 = Model::getInstance();
        $bdd = $bdd2->retourneConnexion();
        $req = "SELECT idUser FROM user WHERE nom = '". $user ."'";
        $result = $bdd->query($req);
        return $result->fetchAll();
    }

}