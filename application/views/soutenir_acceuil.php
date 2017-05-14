<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="jumbotron jumbotron-insoumis">
      <h1>Voici les dernières propositions</h1>
      <p> Blah ....</p>
    </div>

    <div class="table-responsive">

      <table class = "table table-striped table-bordered table-filter">
        <tbody>
          <?php

          foreach ($propositions as $prop) {
            echo '<tr>';
              echo '<td>';

                echo '<div class="media">';

                  echo '<a href="#" class="pull-left"> <img src="https://www.gravatar.com/avatar/d878eb1a022ab9a731f3e1986c081d0a" class="media-photo"> </a>';
                  echo '<div class="media-body">';
                    echo '<span class="media-meta pull-right">'.$prop['_date'].'</span>';
                    echo '<h4 class="title">';
                      echo $prop['auteur_pseudo'];
                      echo '<span class="pull-right pendiente">(Pendiente)</span>';
                    echo '</h4>';
                    echo '<p class="summary">'.$prop['titre'].'</p>';
                  echo '</div>';

                echo '</div>';

              echo '</td>';
            echo '</tr>';

          }


          ?>


        </tbody>
      </table>

    </div>

  </div>
  <!-- .col ... -->

</div>
