<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="/css/master.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="http://lappel-presse.fr/constituante-insoumise/assets/css/styles.css">

</head>
<body>

  <div class="container">

    <div class="jumbotron jumbotron-insoumis">
      <h1><?php echo $titre; ?></h1>

      <p>Merci <b><?php echo $auteur_pseudo; ?></b> pour votre proposition !</p>

      <p>Il faut maintenant que vous validiez votre email afin que les modérateurs puisse prendre en compte votre proposition.
        Ceci permet de vérifier les emails et sensibiliser les utilisateurs de la plateforme.
        Pour confirmer votre proposition, cliquez sur ce bouton : </p>

        <div class="text-center">
          <a href = "<?php echo $confirm_url; ?>" class = "btn btn-default btn-insoumis-bleu"  >Confirmer</a>
        </div>

    </div>

    <div class="text-center">
      <p>La Plateforme constituante des Insoumis - 2017 <br>
      par <b>Les UnsConscients</b> <br>
    </div>

  </div>

</body>
</html>
