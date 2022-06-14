<?php
session_start();
  require_once '../class/bdd.php';
  require_once '../class/util.php';

  $db = new Database;
  $util = new Util;

  // Handle Add New User Ajax Request
  

  date_default_timezone_set('Europe/Amsterdam');    
  $DateAndTime = date('m-d-Y H:i:s ', time()); 

  if (isset($_POST['add'])) {
    $nom = $util->testInput(htmlspecialchars($_SESSION['pseudo_utilisateur']));
    $heure = $util->testInput($DateAndTime);
    $titre = $util->testInput($_POST['titre']);
    $github = $util->testInput($_POST['github']);
    $lien = $util->testInput($_POST['lien']);
    $image = $util->testInput($_POST['image']);
  
   
    

    if ($db->insert($nom, $heure, $titre, $github, $lien, $image)) {
      echo $util->showMessage('success', 'User inserted successfully!');
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
                      <td>' . $row['github_projet'] . '</td>
                      <td>' . $row['lien_projet'] . '</td>
                      <td>' . $row['image_projet'] . '</td>
                     
                    </tr>';
      }
      echo $output;
    } else {
      echo '<tr>
              <td colspan="6">No Users Found in the Database!</td>
            </tr>';
    }
  }
 

  // Handle Edit User Ajax Request
  if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $users = $db->readOne($id);
    echo json_encode($users);
  }

  // Handle Update User Ajax Request
  if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $pseudo = $util->testInput($_POST['pseudo']);
    $mail = $util->testInput($_POST['mail']);
    $password = $util->testInput($_POST['mdp']);
    $role = $util->testInput($_POST['role']);


    if ($db->update($id, $pseudo, $mail, $password, $role)) {
      echo $util->showMessage('success', 'User updated successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Delete User Ajax Request
  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    if ($db->delete($id)) {
      echo $util->showMessage('info', 'User deleted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

?>