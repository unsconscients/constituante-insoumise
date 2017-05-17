<div class="container-admin">
  <div class="sidebar-admin">

    <div class="container-fluid">

      <ul class="nav nav-pills nav-stacked">
        <li ><a href="#">Commentaires</a></li>
        <li class = "active"><a href="#">Propositions</a></li>
      </ul>
    </div>

  </div>

  <div class="content-admin">
    <div class="container-fluid">

      <div class="page-header">
        <h1>Propositions</h1>
      </div>

      <div class="table-responsive">
        <table class = "table table-hover table-bordered">
          <thead>
            <tr>
              <th>Proposition</th>
              <th>Pseudo</th>
              <th>Email</th>
              <th>Création</th>
              <th>Validation</th>
              <th>Autorisation</th>
              <th></th>
            </tr>
          </thead>

          <tbody>

          <?php foreach($propositions as $prop): ?>

            <tr>
              <td><?php echo $prop['titre']?></td>
              <td><?php echo $prop['auteur_pseudo']?></td>
              <td><?php echo $prop['auteur_email']?></td>
              <td><?php echo $prop['_date']?></td>

              <?php // Date de validation ?>

              <?php if($prop['validation'] == 0):?>

                <td class = "text-center"><span class = "text-muted">n/a</span></td>

              <?php else : ?>

                <td class = "text-center"><span class = "text-muted"><?php echo $prop['date_validation']?></span></td>

              <?php endif;?>

              <?php // Date d'autorisation par la modération ?>

              <?php if($prop['autorisation'] == 0):?>

                <td class = "text-center"><span class = "text-muted">n/a</span></td>

              <?php else : ?>

                <td class = "text-center"><span class = "text-muted"><?php echo $prop['date_autorisation']?></span></td>

              <?php endif;?>

              <td class = "text-center">
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"></span> </button>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <li><a href="><?php echo base_url('admin/consulter/'.$prop['id']); ?>"><span class = "glyphicon glyphicon-search"></span> Consulter</a></li>
                    <li><a href="<?php echo base_url('admin/autoriser/'.$prop['id']); ?>"><span class = "glyphicon glyphicon-ok"></span> Autoriser</a></li>
                    <li><a href="<?php echo base_url('admin/supprimer/'.$prop['id']); ?>"><span class = "glyphicon glyphicon-remove"></span> Supprimer</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><span class = "glyphicon glyphicon-envelope"></span> Contacter l'auteur</a></li>
                  </ul>
                </div>
              </td>
            </tr>

          <?php endforeach; ?>

            <tr>
              <td>Révocabilité des élus en cours de mandat</td>
              <td>Marcus</td>
              <td>marcus@gmail.com</td>
              <td>30/10/2013</td>
              <td class = "text-center">03/11/2013</td>
              <td class = "text-center"><span class = "text-muted">n/a</span></td>
              <td class = "text-center">
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"></span> </button>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <li><a href="#"><span class = "glyphicon glyphicon-search"></span> Consulter</a></li>
                    <li><a href="#"><span class = "glyphicon glyphicon-ok"></span> Autoriser</a></li>
                    <li><a href="#"><span class = "glyphicon glyphicon-remove"></span> Supprimer</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><span class = "glyphicon glyphicon-envelope"></span> Contacteur l'auteur</a></li>
                  </ul>
                </div>
              </td>
            </tr>


          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
