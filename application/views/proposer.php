<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="jumbotron jumbotron-insoumis">
      <h1>Faites une proposition !</h1>
      <p>Petit text .... </p>
    </div>

    <form action="<?php echo base_url('proposer/propose')?>" method="post">

      <div class="panel panel-default panel-insoumis">
        <div class="panel-heading">
          <h3 class = "panel-title">Coordonnés</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label>Pseudo</label>
            <input type="text" name="pseudo" class = "form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class = "form-control">
          </div>
        </div>
      </div>

      <div class="panel panel-default panel-insoumis">
        <div class="panel-heading">
          <h3 class = "panel-title">Proposition</h3>
        </div>
        <div class="panel-body">

          <div class="form-group">
            <label for="">Titre</label>
            <input type="text" name="titre" class = "form-control">
          </div>

          <div class="form-group">
            <label for="">Mots clés <small>(séparés par une virgule)</small></label>
            <input type="text" name="mots" class = "form-control">
          </div>

          <div class="form-group">
            <label for="">Contenu</label>
            <textarea name="contenu" class = "form-control"></textarea>
          </div>

          <div class="form-group">
            <input type="checkbox" >
            <label for="">J'accepte les conditions d'utilisation de la plateforme.</label>
          </div>

        </div>
      </div>
      <!-- .panel (proposition) -->

      <div class="form-group">
        <button type="submit" class = "btn btn-default btn-insoumis form-control">Envoyer</button>
      </div>
    </form>


  </div>
  <!-- .col ... -->

</div>