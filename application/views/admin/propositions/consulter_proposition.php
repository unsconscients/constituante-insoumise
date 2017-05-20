

<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="panel panel-proposition">

      <div class="panel-heading">

        <!-- <div class="post-heading"> -->

          <div class="pull-left image">
            <img src = "<?php echo 'https://www.gravatar.com/avatar/'.$gravatar_hash; ?>" class="img-circle avatar" >
          </div>
          <div class="pull-left meta">
            <div class="title h5">
              Proposition de <a href="#"><b><?php echo $auteur_pseudo; ?></b><small> (<?php echo $auteur_email; ?>)</small></a>
            </div>
            <h6 class="text-muted time">Le <?php echo $_date; ?></h6>
          </div>

        <!-- </div> -->

      </div>

      <div class="panel-body">

        <h2><?php echo $titre; ?></h2>

        <div class="contenu">
          <?php echo $contenu; ?>
        </div>

      </div>
      <div class="panel-footer">

        <div class="pull-right">

          <a href = "<?php echo base_url('admin/propositions/autoriser/'.$id.'?autorise=oui'); ?>" class="btn btn-success">Oui</a>
          <a href = "<?php echo base_url('admin/propositions/autoriser/'.$id.'?autorise=non'); ?>" class="btn btn-danger">Non </a>
          <a href = "" class="btn btn-default"> <span class = "glyphicon glyphicon-envelope"></span> Contacter l'auteur </a>

        </div>

        <h4>Autoriser ? </h4>

      </div>
    </div>
  </div>

</div>
