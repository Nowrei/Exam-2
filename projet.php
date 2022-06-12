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
                <input type="text" name="lien" class="form-control form-control-lg" placeholder="Lien" required>
                <div class="invalid-feedback">Inséré un lien vers votre projet!</div>
              </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label"></label>
                <input class="form-control" type="file" id="formFile" name="file">
                <div class="invalid-feedback">Inséré une image!</div>
            </div>
            <div class="mb-3">
            <label for="message">Desciption</label>
            <textarea class="form-control" placeholder="Laissez votre message ici" id="message" style="height: 100px" name="message"></textarea>
            <div class="invalid-feedback">Entrer une description!</div>
          </div>



            <div class="mb-3">
              <input type="submit" value="Ajouter votre projet" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add New User Modal End -->

  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">Tout les utilisateur en base de donnée !</h4>
        </div>
        <div>
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Ajouter un utilisateur</button>
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
                <th>ID</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Role</th>
                <th>Action</th>
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