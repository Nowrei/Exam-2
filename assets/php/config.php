<?php 

$user="root";
$pass="";
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;port=3306', $user, $pass);
   
    
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}