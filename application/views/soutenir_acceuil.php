<div class="container">

  <div class="col-lg-8 col-lg-offset-2 col-xs-12">

    <div class="panel panel-default panel-insoumis">
      <div class="panel-heading">
        <h3 class = "panel-title">Les dernières propositions !</h3>
      </div>
      <div class="panel-body">

        <div class="table-responsive">
          <table class = "table  table-filter">
            <tbody>
              <?php foreach ($propositions as $prop): ?>

                <tr class = "clickable-href" data-href = "<?php echo base_url('soutenir/proposition/'.$prop['id']); ?>">
                  <td>

                    <div class="media">

                      <a href="#" class="pull-left"> <img src="<?php echo 'https://www.gravatar.com/avatar/'.$prop['gravatar_hash']; ?>" class="media-photo"> </a>
                      <div class="media-body">
                        <span class="media-meta pull-right"><?php echo $prop['_date']; ?></span>
                        <h4 class="title">
                          <?php echo $prop['titre']; ?>
                        </h4>
                        <div>
                          <p class="pull-right"><span class = "text-success"><?php echo $prop['pour']; ?> <span class = "glyphicon glyphicon-thumbs-up"></span></span> - <span class = "text-danger"><?php echo $prop['contre']; ?> <span class = "glyphicon glyphicon-thumbs-down"></span></span> </p>
                          <p class="summary"><?php echo $prop['auteur_pseudo']; ?> </p>
                        </div>
                      </div>

                    </div>

                  </td>
                </tr>



            <?php endforeach; ?>

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
