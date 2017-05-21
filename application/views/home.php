<div class="container-home">


  <div class="jumbotron jumbotron-home">
    <div class="text-center">
      <img class = "phi" src="http://lappel-presse.fr/constituante-insoumise/assets/img/phi.png" alt="">

      <h1>La Constituante Insoumise</h1>
      <p>Bienvenue sur la plate-forme constituante de la France insoumise. Ici, vous pourrez participer à l'élaboration de la constitution de notre future république. Proposez vous-même des éléments, et/ou soutenez d'autres propositions. À vous de jouer !</p>
    </div>
  </div>

  <div class="container">

    <div class="col-lg-8 col-lg-offset-2 col-xs-12">

      <div id = "panel-home" class="panel panel-default panel-insoumis">
        <div class="panel-body" style = "padding-left : 30px; padding-right : 30px;">

          <h1>Qu’est-ce qu’une Constitution ?</h1>
          <p>Une Constitution, C’est un texte qui <b>cadre</b> la vie politique d’un État, <b>organise les règles du pouvoir</b>, met en place des <b>limites</b> à son exercice, et pose <b>les fondamentaux</b> de notre vie en société.</p>

          <h1>Pourquoi une Constitution ?</h1>
          <p>Une constitution est <b>indispensable</b> pour organiser le fonctionnement politique d'une société. Celle-ci fixe le cadre auxquels l'ensemble des lois de la nation devront se conformer.</p>
          <p>Celle-ci peut permettre la mise en place d'une <b>véritable démocratie</b> en instaurant la <b>souveraineté du peuple</b>.</p>

          <blockquote cite="http://">
            « La démocratie est un État où le Peuple souverain, guidé par des lois qui sont de son ouvrage, fait par lui-même tout ce qu'il peut bien faire, et par des délégués [qu'il contrôle] tout ce qu'il ne peut pas faire lui-même. »
          </blockquote>

          <p>L'enjeu de la constitution et de la démocratie est <b>celui qui permet</b> tout les autres. Le meilleur moyen d'obtenir une politique populaire, est encore de <b>laisser le pouvoir au peuple</b>. </p>

          <h1>Comment écrire une Constitution démocratique?</h1>
          <p>L'objectif est d'instaurer la <b>puissance politique du peuple</b> et des ses citoyens.
            S'agissant du Texte fondamentale en république, la <b>rédaction populaire</b> de la constitution est une <b>prérogative à toute véritable démocratie</b>.
            Nous sommes le peuple, Nous devons participer à l'écriture <b>des règles qui garantissent</b> notre pouvoir et notre liberté.</p>

            <blockquote cite="http://">
              « Ce n'est pas aux hommes qui ont le pouvoir, d'écrire les règles du pouvoir »
          </blockquote>

          <h2>Comment participer ?!</h2>

          <p>Avant tout, <b>l'éveil de nos concitoyens</b> est indispensable. Par l'éducation populaire, de vos amis, collègues et de votre famille, vous permettrez à l'idée démocratique de s'installer dans la pensée collective. </p>

          <p>Vous pouvez aussi faire des <b>ateliers constituants</b>, qui consiste à une écriture collective d'article de la future constitution. </p>

          <p>Enfin, fruit de discussions collectives ou de pensées individuelles, vous pouvez présenter sur cette plate-forme vos propositions pour une <b>constitution insoumise et démocratique !</b></p>

          <div class="text-center">
            <?php if($this->session->userdata('logged') == null): ?>
              <a href="<?php echo base_url('users/login'); ?>" class = "btn btn-default btn-insoumis-rouge">Connexion</a>
              <a href="<?php echo base_url('users/signup'); ?>" class = "btn btn-default btn-insoumis-rouge">Créer un compte</a>
            <?php endif;?>

          </div>
        </div>
      </div>

    </div>
  </div>
  
</div>
