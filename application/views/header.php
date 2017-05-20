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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">

	</head>

	<body>


    <nav class = "navbar navbar-inverse navbar-insoumis navbar-fixed-top">

      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-collapse">

          <ul class = "nav navbar-nav">

            <li><a href="#" class = "navbar-insoumis-titre">Pour une 6ème république citoyenne et démocratique, donnez votre avis !</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

            <li><a href="<?php echo base_url('soutenir')?>" class = "navbar-insoumis-boutton"><span class = "fa fa-thumbs-up"></span> Soutenir</a></li>
            <li><a href="<?php echo base_url('proposer')?>" class = "navbar-insoumis-boutton"><span class = "fa fa-pencil"></span> Proposer</a></li>

						<?php if($this->session->userdata('logged') != null) : ?>

							<li><a href="<?php echo base_url('users/login')?>" class = "navbar-insoumis-boutton"><span class = "fa fa-pencil"></span> Connexion</a></li>

						<?php else : ?>

							<li><a href="<?php echo base_url('users/logout')?>" class = "navbar-insoumis-boutton"><span class = "fa fa-pencil"></span> Déconnexion</a></li>

						<?php endif; ?>

          </ul>

        </div>

      </div>

    </nav>
