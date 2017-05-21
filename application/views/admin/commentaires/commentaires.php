<div class="container-admin">
  <div class="sidebar-admin">

    <div class="container-fluid">

      <ul class="nav nav-pills nav-stacked">
        <li class = "active" ><a href="<?php echo base_url('admin?page=commentaires'); ?>">Commentaires</a></li>
        <li ><a href="<?php echo base_url('admin?page=propositions'); ?>">Propositions</a></li>
      </ul>
    </div>

  </div>

  <div class="content-admin">
    <div class="container-fluid">

      <div class="page-header">
        <h1>Commentaires</h1>
      </div>

      <div class="table-responsive">
        <table class = "table table-hover table-bordered">
          <thead>
            <tr>
              <th>Pseudo</th>
              <th>Email</th>
              <th>Création</th>
              <th>Autorisation</th>
              <th></th>
            </tr>
          </thead>

          <tbody>

          <?php foreach($commentaires as $comm): ?>

            <tr>
              <td><?php echo $comm['pseudo']?></td>
              <td><?php echo $comm['email']?></td>
              <td><?php echo $comm['_date']?></td>


              <?php // Date d'autorisation par la modération ?>

              <?php if($comm['autorisation'] == 0):?>

                <td class = "text-center"><span class = "text-muted">n/a</span></td>

              <?php else : ?>

                <td class = "text-center"><?php echo $comm['date_autorisation']?></td>

              <?php endif;?>

              <td class = "text-center">


                  <a href = "<?php echo base_url('admin/commentaires/consulter/'.$comm['id']);?>" class = "d-inline btn btn-default"><span class = "glyphicon glyphicon-search"></span></a>
                  <a href = "<?php echo base_url('admin/commentaires/supprimer/'.$comm['id']);?>" class = "d-inline btn btn-danger"><span class = "glyphicon glyphicon-remove"></span></a>

              </td>
            </tr>

          <?php endforeach; ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
