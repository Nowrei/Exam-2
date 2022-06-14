<?php
include 'config.php';

$identifiant = $_POST['identifiant'];
$password = $_POST['mdp'];

$sql = "SELECT * FROM utilisateur WHERE pseudo_utilisateur = :pseudo_utilisateur OR mail_utilisateur = :mail_utilisateur";
$requete= $bdd->prepare($sql);
$requete->execute(array(
    ':pseudo_utilisateur' => $identifiant,
    ':mail_utilisateur' =>$identifiant
));

$count = $requete->rowCount();

if ( $count == 1) {

            while($resultat = $requete->fetch()) {

                if (password_verify($password,$resultat['mdp_utilisateur'])) {
                    session_start();
                    $_SESSION['id_utilisateur'] = $resultat['iid_utilisateur'];
                    $_SESSION['pseudo_utilisateur'] = $resultat['pseudo_utilisateur'];
                    $_SESSION['role_utilisateur'] = $resultat['role_utilisateur'];
                    header("location:../../accueil.php");



                }else{
                    header("location:../../connection.php?message=error2");
                }

            }



        }
        else{header("location:../../connection.php?message=error");}

