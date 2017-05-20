<!doctype html>
<html ng-app="constI">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Optimize mobile viewport -->

		<title>Pour une 6ème république citoyenne et démocratique, donnez votre avis !</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link rel="stylesheet" href="http://lappel-presse.fr/constituante-insoumise/assets/css/styles.css">


	</head>

	<body>


    <nav class = "navbar navbar-inverse navbar-insoumis navbar-fixed-top">

      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <div class="collapse navbar-collapse">

          <ul class = "nav navbar-nav">

            <li><a href="#" class = "navbar-insoumis-titre">Pour une 6ème république citoyenne et démocratique, donnez votre avis !</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

            <li><a ng-href="#" class = "navbar-insoumis-boutton"><span class = "fa fa-thumbs-up"></span> Soutenir</a></li>
            <li><a ng-href="#" class = "navbar-insoumis-boutton"><span class = "fa fa-pencil"></span> Proposer</a></li>

          </ul>

        </div>

      </div>

    </nav>

		<!-- DEVELOPPEMENT -->

		<div class="container">
		  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

		    <div class="panel panel-default">
		      <div class="panel-body">

						<h1>Connexion</h1>

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
								<button type="button" name="button" class = "btn btn-default btn-insoumis-rouge form-control">Connexion</button>
							</div>


						</form>


		      </div>
		    </div>

		  </div>
		</div>

		<!-- - - > DEVELOPPEMENT -->




	</body>
</html>
