<div class="sticky-top">
    <nav class="navbar navbar-dark" >
      <div class="container justify-content-between" >
        <div class="d-none d-lg-block">
        <a href="#" class="navbar-brand"><img src="assets/img/logo.png" alt=""  height="30"></a>
        </div>
        <div class="navbar navbar-expand-lg">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
            aria-controls="navbar-content" aria-expanded="false" aria-label="toggle-navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-light" href="#" target="_blank" rel="#">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#" target="_blank" rel="#">Projet</a>
              </li>
     <div class="dropdown">
<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
          <?php 
            if (isset($_SESSION['pseudo_utilisateur'])) {
              ?>
            <li><a class="dropdown-item" href="#" ><?php echo $_SESSION['pseudo_utilisateur'];?></a></li>
            <?php 
              if($_SESSION['role_utilisateur'] != '0') { ?>
              <li><a class="dropdown-item" href="projet.php" >Ajouter un projet</a></li>
            <li><a class="dropdown-item" href="utilisateur.php" >Modifier les utilisateurs</a></li>
            <li><a class="dropdown-item" href="assets/php/deconnection.php" >Se déconnecter</a></li>

            <?php }else {?>
            <li><a class="dropdown-item" href="projet.php" >Ajouter un projet</a></li>
            <li><a class="dropdown-item" href="assets/php/deconnection.php" >Se déconnecter</a></li>
            <?php } ?>
            <?php }else { ?>
            <li><a class="dropdown-item" href="connection.php" >Connection</a></li>
            <li><a class="dropdown-item" href="inscription.php" >Inscription</a></li>
            <?php } ?>

          </ul>
</div> 
              </li>
            </ul>
          </div>
        </div>
    </nav>
  </div>