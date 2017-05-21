<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">


    <form action="<?php echo base_url('proposer/proposition')?>" method="post">

      <div class="panel panel-default panel-insoumis">
        <div class="panel-heading">
          <h3 class = "panel-title">Faites une proposition !</h3>
        </div>
        <div class="panel-body">

          <div class="form-group">
            <label for="">Titre</label>
            <input type="text" name="titre" class = "form-control">
          </div>

          <div class="form-group">
            <label for="">Contenu</label>
            <textarea name="contenu" class = "form-control" rows = "15"></textarea>
          </div>

        </div>
      </div>
      <!-- .panel (proposition) -->

      <div class="form-group">
        <button type="submit" class = "btn btn-default btn-insoumis-rouge form-control">Envoyer</button>
      </div>
    </form>


  </div>
  <!-- .col ... -->

</div>
