<?php

  require_once '../class/bdd.php';
  require_once '../class/util.php';

  $db = new Database;
  $util = new Util;

  // Handle Add New User Ajax Request
  if (isset($_POST['add'])) {
    $titre = $util->testInput($_POST['titre']);
    $lien = $util->testInput($_POST['lien']);
    $file = $util->testInput($_POST['file']);
    $message = $util->testInput($_POST['message']);
    $t = date('d-m-Y H:i:s');
    $nom = {$_SESSION['pseudo_utilisateur']},
    $id_utilisateur = {$_SESSION['id_utilisateur']},
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    $fileName = uniqid('img_') . '.' . $fileType;
    if ($db->insert($titre, $lien, $file, $message)) {
      echo $util->showMessage('success', 'Projet ajouté avec succès!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Fetch All Users Ajax Request
  if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if ($users) {
      foreach ($users as $row) {
        $output .= '<tr>
                      <td>' . $row['titre_projet'] . '</td>
                      <td>' . $row['lient_projet'] . '</td>
                      <td>' . $row['image_projet'] . '</td>
                      <td>' . $row['message_projet'] . '</td>
                    </tr>';
      }
      echo $output;
    } else {
      echo '<tr>
              <td colspan="6">Aucun projet trouvé en base de donnée!</td>
            </tr>';
    }
  }

?>