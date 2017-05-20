<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="jumbotron jumbotron-insoumis">
      <h1>Voici les dernières propositions</h1>
      <p> Blah ....</p>
    </div>

    <div class="panel panel-default panel-insoumis">
      <div class="panel-body">

        <div class="table-responsive">
          <table class = "table  table-filter">
            <tbody>
              <?php foreach ($propositions as $prop) {

                echo '<tr class = "clickable-href" data-href = "'.base_url('soutenir/proposition/'.$prop['id']).'">';
                  echo '<td>';

                    echo '<div class="media">';

                      echo '<a href="#" class="pull-left"> <img src="https://www.gravatar.com/avatar/'.$prop['gravatar_hash'].'" class="media-photo"> </a>';
                      echo '<div class="media-body">';
                        echo '<span class="media-meta pull-right">'.$prop['_date'].'</span>';
                        echo '<h4 class="title">';
                          echo $prop['auteur_pseudo'];
                        echo '</h4>';
                        echo '<div>';
                          echo '<p class="pull-right"><span class = "text-success">'.$prop['pour'].' pour</span> - <span class = "text-danger">'.$prop['contre'].' contre</span> </p>';
                          echo '<p class="summary">'.$prop['titre'].'</p>';
                        echo '</div>';
                      echo '</div>';

                    echo '</div>';

                  echo '</td>';
                echo '</tr>';

              } ?>

            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
  <!-- .col ... -->

</div>

<script charset="utf-8">

  $(".clickable-href").click(function(){
    window.location = $(this).data("href");
  });

</script>
