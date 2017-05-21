<div class="container-admin">
  <div class="sidebar-admin">

    <div class="container-fluid">

      <ul class="nav nav-pills nav-stacked">
        <li ><a href="<?php echo base_url('admin?page=commentaires'); ?>">Commentaires</a></li>
        <li class = "active"><a href="<?php echo base_url('admin?page=propositions'); ?>">Propositions</a></li>
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


              <?php // Date d'autorisation par la modération ?>

              <?php if($prop['autorisation'] == 0):?>

                <td class = "text-center"><span class = "text-muted">n/a</span></td>

              <?php else : ?>

                <td class = "text-center"><?php echo $prop['date_autorisation']?></td>

              <?php endif;?>

              <td class = "text-center">

                <a href = "<?php echo base_url('admin/propositions/consulter/'.$prop['id']);?>" class = "btn btn-default"><span class = "glyphicon glyphicon-search"></span></a>
                <a href = "<?php echo base_url('admin/propositions/supprimer/'.$prop['id']);?>" class = "btn btn-danger"><span class = "glyphicon glyphicon-remove"></span></a>

              </td>
            </tr>

          <?php endforeach; ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
