<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion-utilisateur</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- Add New User Modal Start -->
  <div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter un projet</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate>
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="titre" class="form-control form-control-lg" placeholder="Titre" required>
                <div class="invalid-feedback">Entrer un titre!</div>
              </div>

              <div class="col">
                <input type="text" name="github" class="form-control form-control-lg" placeholder="Lien Github" required>
                <div class="invalid-feedback">Entrer un lien GitHub!</div>
              </div>
            </div>

            <div class="mb-3">
              <input type="text" name="lien" class="form-control form-control-lg" placeholder="Entrer le lien de votre projet" id="lien" required>
              <div class="invalid-feedback">Entrer un lien vers votre projet!</div>
            </div>
            <div class="mb-3">
              <input type="text" name="image" class="form-control form-control-lg" placeholder="Entrer une image" id="image" required>
              <div class="invalid-feedback">Entrer une image!</div>
            </div>

            <div class="mb-3">
              <input type="submit" value="Ajouter un projet" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add New User Modal End -->

  <!-- Edit User Modal Start -->
  <div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editer un utilisateur</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-user-form" class="p-2" novalidate>
            <input type="hidden" name="id" id="id">
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="pseudo"  class="form-control form-control-lg" placeholder="Entrer le pseudo" required>
                <div class="invalid-feedback">Un pseudo est requis !</div>
              </div>

              <div class="col">
                <input type="email" name="mail"  class="form-control form-control-lg" placeholder="Entrer un mail" required>
                <div class="invalid-feedback">Un mail est requis!</div>
              </div>
            </div>

            <div class="mb-3">
              <input type="password" name="mdp"  class="form-control form-control-lg" placeholder="Entrer un mot de passe" required>
              <div class="invalid-feedback">Un mot de passe est requis!</div>
            </div>

            <div class="mb-3">
            <label for="Pays">Role</label>
              <select class="form-select" aria-label="Default select example" id="role" name="role">
            <option selected>0</option>
            <option value="1">1</option>

                </select>
            </div>

            <div class="mb-3">
              <input type="submit" value="Update Utilisateur" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit User Modal End -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">Tout vos projets !</h4>
        </div>
        <div>
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Ajouter un projet</button>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div id="showAlert"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-striped table-bordered text-center">
            <thead>
              <tr>
                <th>Titre</th>
                <th>Lien GitHub</th>
                <th>Lien</th>
                <th>Image</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/text.js"></script>
</body>
</html>