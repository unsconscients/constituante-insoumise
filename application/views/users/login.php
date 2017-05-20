
<div class="container">
  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="panel panel-default panel-insoumis">

			<div class="panel-heading">
				<h3 class = "panel-title"><?php echo $prop['pour']; ?></h3>

			</div>
      <div class="panel-body">
        <?php if($erreur != null && $erreur != ''):?>

          <div class="alert alert-danger" role="alert">
						<p><?php echo $erreur; ?></p>
					</div>

        <?php endif; ?>

				<form action="<?php echo base_url('users/login');?>" method="post">

					<div class="form-group">
						<label>Email :</label>
						<input type="email" name="email" class = "form-control">
					</div>

					<div class="form-group">
						<label>Mot de passe :</label>
						<input type="password" name="password" class = "form-control">
					</div>

					<div class="form-group">
						<button type="submit" name="button" class = "btn btn-default btn-insoumis-rouge form-control">Connexion</button>
					</div>


				</form>


      </div>
    </div>

  </div>
</div>
