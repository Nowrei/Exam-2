<?php
include 'config.php';

$email = $_POST['pseudo'];
$password = $_POST['mdp'];

$sql = "SELECT * FROM ex_utilisateur WHERE pseudo_utilisateur = :pseudo_utilisateur";
$requete= $bdd->prepare($sql);
$requete->execute(array(
    ':pseudo_utilisateur' => $email
));

$count = $requete->rowCount();

if ( $count == 1) {

            while($resultat = $requete->fetch()) {

                if (password_verify($password,$resultat['mdp_utilisateur'])) {
                    session_start();
                    $_SESSION['id'] = $resultat['id_utilisateur'];
                    $_SESSION['pseudo'] = $resultat['pseudo_utilisateur'];
                    header("location:../../index.php");



                }else{
                    header("location:../../connection.php?message=error2");
                }

            }



        }
        else{header("location:../../connection.php?message=error");}

