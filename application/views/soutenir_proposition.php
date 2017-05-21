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
              <a href="#"><b><?php echo $proposition['auteur_pseudo']?></b><small> (<?php echo $proposition['auteur_email']?>)</small></a>
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

          <a href = "<?php echo base_url('/soutenir/proposition/'.$proposition['id'].'/pour'); ?>" class="btn btn-success"><span class = "fa fa-thumbs-up"></span> <?php echo $proposition['pour']?>
            <?php if(isset($proposition['vote_user_pour']) && $proposition['vote_user_pour'] != null && $proposition['vote_user_pour'] == 1) : ?>
              <small>(vous)</small>
            <?php endif;?>
          </a>
          <a href = "<?php echo base_url('/soutenir/proposition/'.$proposition['id'].'/contre'); ?>" class="btn btn-danger"><span class = "fa fa-thumbs-down"></span> <?php echo $proposition['contre']?>
            <?php if(isset($proposition['vote_user_contre']) && $proposition['vote_user_contre'] != null && $proposition['vote_user_contre'] == 1) : ?>
              <small>(vous)</small>
            <?php endif;?>
          </a>

        </div>

        <h4>Etes-vous d'accord avec <?php echo $proposition['auteur_pseudo']?> ?</h4>


      </div>
    </div>



    <!-- commentaires -->

    <?php if(isset($proposition['commentaires']) && count($proposition['commentaires']) > 0) : ?>

      <div class="panel panel-default panel-commentaire ng-scope">

        <div class="panel-heading">

          <h3 class="panel-title ng-binding"><?php echo count($proposition['commentaires']).' Commentaires'; ?> </h3>

        </div>

        <ul class="list-group">
          <?php foreach ($proposition['commentaires'] as $comm): ?>

            <li class="list-group-item ng-scope" ng-repeat="comment in commentaires">
              <h5 class="ng-binding"> <span class="fa fa-user"></span> <?php echo $comm['pseudo']; ?></h5>
              <h5> <small class="ng-binding"> <span class="fa fa-envelope"></span> <?php echo $comm['email']; ?></small></h5>
              <h5> <small class="ng-binding"> <span class="fa fa-clock-o"></span> <?php echo $comm['_date']; ?></small></h5>

              <p class="ng-binding"><?php echo $comm['contenu']?></p>
            </li>

          <?php endforeach;?>
        </ul>

      </div>

    <?php endif;?>

    <!-- Laissez un commentaire -->

    <div class="panel panel-default panel-commentaire ng-scope">
      <div class="panel-heading">
        <h3 class="panel-title">Laissez une commentaire</h3>
      </div>

      <div class="panel-body">

        <form method = "POST" action = "<?php echo base_url('commentaires/ajouter/'.$proposition['id']); ?>">
          <div class="form-group">
            <label>Pseudo :</label>
            <input class="form-control" type="text" name = "pseudo" value = "<?php if($this->session->userdata('logged') != null) {echo $this->session->userdata('logged')['pseudo']; } else { echo ''; }?>">
          </div>
          <div class="form-group">
            <label>Email :</label>
            <input class="form-control" type="email" name = "email" value = "<?php if($this->session->userdata('logged') != null) {echo $this->session->userdata('logged')['email']; } else { echo ''; }?>">
          </div>
          <div class="form-group">
            <label>Commentaire : </label>
            <textarea class="form-control" name = "contenu"></textarea>
          </div>

          <p><small class = "text-muted">Les commentaires sont vérifiés par un modérateur !</small></p>
          <div class="form-group">
            <button type = "submit" class="btn btn-default btn-insoumis-bleu form-control">Ajouter</button>
          </div>
        </form>

      </div>
    </div>


  </div>

</div>
