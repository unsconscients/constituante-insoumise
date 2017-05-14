<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="panel panel-proposition">

      <div class="panel-heading">

        <!-- <div class="post-heading"> -->

          <div class="pull-left image">
            <img src = "<?php echo 'https://www.gravatar.com/avatar/'.$proposition['gravatar_hash'] ?>" class="img-circle avatar" >
          </div>
          <div class="pull-left meta">
            <div class="title h5">
              <a href="#"><b><?php echo $proposition['auteur_pseudo']?></b><small>(<?php echo $proposition['auteur_email']?>)</small></a>
              a fait une proposition.
            </div>
            <h6 class="text-muted time">Le <?php echo $proposition['_date']?></h6>
          </div>

        <!-- </div> -->

      </div>

      <div class="panel-body">

        <h2><?php echo $proposition['titre']?></h2>

        <div class="contenu">
          <?php echo $proposition['contenu']?>
        </div>

      </div>
      <div class="panel-footer">

        <div class="pull-right">

          <button type="button" class="btn btn-success"><span class = "fa fa-thumbs-up"></span> <?php echo $proposition['pour']?></button>
          <button type="button" class="btn btn-danger"><span class = "fa fa-thumbs-down"></span> <?php echo $proposition['contre']?> </button>

        </div>

        <h4>Etes-vous d'accord avec <?php echo $proposition['auteur_pseudo']?> ?</h4>


      </div>
    </div>
  </div>

</div>
