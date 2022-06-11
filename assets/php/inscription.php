<?php
include "config.php";

$pseudo = $_POST['pseudo'];
$email = $_POST['mail'];
$password = $_POST['mdp'];
$password1 = $_POST['mdp2'];



if ($password == $password1){
    $password = password_hash( $password, PASSWORD_DEFAULT);    

    $sql="SELECT * FROM utilisateur WHERE mail_utilisateur = :mail_utilisteur";
    $requete= $bdd->prepare($sql);
    $requete->execute(array(
        "mail_utilisateur" => $email
    ));

    $testmail = 0;
        while($resultat = $requete->fetch()) {

          if ($email == $resultat['mail_utilisateur']) {

            $testmail = 1 ;
        }
    }


    if ($testmail == 0) {

    $sql = "INSERT INTO utilisateur (pseudo_utilisateur, mail_utilisateur, mdp_utilisateur, role_utilisateur) VALUES (:pseudo_utilisateur, :mail_utilisateur, :mdp_utilisateur, '0')";
    $requete= $bdd->prepare($sql);
    $requete->execute(array(
        ":pseudo_utilisateur" => $pseudo,
        ":mail_utilisateur" => $email,
        ":mdp_utilisateur" => $password
   
    )); 
    header ("location: ../../connection.php?message=succes");

    }else{header('location: ../../inscription.php?message=error2');}
}else{

    header ("location: ../../inscrire.php?message=error");
}

