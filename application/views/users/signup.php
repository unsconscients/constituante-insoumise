<div class="container">
  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="panel panel-default">
      <div class="panel-body">

        <h1>Créer un compte</h1>

        <?php if($erreur != null && $erreur != ''):?>

          <div class="alert alert-danger" role="alert">
            <p><?php echo $erreur; ?></p>
          </div>

        <?php endif; ?>

        <form action="index.html" method="post">

          <div class="form-group">
            <label>Pseudo <small class = "text-muted">(*)</small> :</label>
            <input type="email" name="pseudo" class = "form-control">
          </div>

          <div class="form-group">
            <label>Email <small class = "text-muted">(*)</small> :</label>
            <input type="email" name="email" class = "form-control">
          </div>

          <div class="form-group">
            <label>Mot de passe  <small class = "text-muted">(*)</small> :</label>
            <input type="password" name="password" class = "form-control">
          </div>

          <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" class = "form-control">
          </div>

          <div class="form-group">
            <label>Prénom :</label>
            <input type="text" name="prenom" class = "form-control">
          </div>

          <div class="form-group">
            <label>Adresse :</label>
            <input type="text" name="adresse" class = "form-control">
          </div>

          <div class="row">
            <div class="col-xs-8">
              <div class="form-group">
                <label>Ville :</label>
                <input type="text" name="ville" class = "form-control">
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label>Code Postal :</label>
                <input type="text" name="code_postal" class = "form-control">
              </div>
            </div>
          </div>

          <p><small class = "text-muted">(*) Champs obligatoires</small></p>

          <div class="form-group">
            <button type="button" name="button" class = "btn btn-default btn-insoumis-rouge form-control">Connexion</button>
          </div>


        </form>


      </div>
    </div>

  </div>
</div>
