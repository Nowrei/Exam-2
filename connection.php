<?php 
session_start();
if(!isset($_SESSION['pseudo_utilisateur'])) {

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/styles/contact.css">
    <link rel="stylesheet" href="../assets/styles/footer.css">
  
</head>

<body>

	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
	</div>
  <form method="post" action="assets/php/connection.php" id="form">
<div class="container">
  <h2>Contactez-nous</h2>
<div class="row">

        <div class="form-group">
          <label for="nom">Identifiant</label>
          <input type="text" class="form-control" placeholder="Entrer votre mail ou pseudo" id="identifiant" name="identifiant">
        </div>
        <div class="form-group">
          <label for="prenom">Mot de passe</label>
          <input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="mdp">
        </div>


    </div>


  
</div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
  </form>
</div>
<script src="assets/js/auto.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>  
</body>
</html>
<?php }

else{header("location:index.php");}
        ?>