<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="jumbotron jumbotron-insoumis">
      <h1>Voici les dernières propositions</h1>
      <p> Blah ....</p>
    </div>

    <div class="table-responsive">

      <table class = "table table-striped table-bordered">
        <thead>
          <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Mots Clés</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        <?php

        foreach ($propositions as $prop) {
          echo '<tr>';
            echo '<td>'.$prop['auteur_pseudo'].'</td>';
            echo '<td>'.$prop['titre'].'</td>';
            echo '<td>'.$prop['mots_cles'].'</td>';
            echo '<td>'.$prop['_date'].'</td>';
          echo '</tr>';

        }

        ?>

        </tbody>
      </table>

    </div>

  </div>
  <!-- .col ... -->

</div>
