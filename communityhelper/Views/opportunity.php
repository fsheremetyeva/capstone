
<?php include('Views/header.php'); ?>
  <main class="container">

      <section class="row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label class="sr-only" for="image">Image</label>
            <?php
              $src = '';
              if(!empty($data['avatar']) && !empty($data['avatar_mime']))
              {
                $src = 'src="data:' . $data['avatar_mime'] . ';base64, ' . base64_encode($data['avatar']) . '" ';
              }
            ?>
            <img alt="<?php echo $data['name']; ?>" title="<?php echo $data['name']; ?>" class="user-avatar" <?php echo $src; ?> />
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <strong>About Us:</strong>
            <?php echo $data['description']; ?>
          </div>
          <?php echo '<br><p><a title="contact" role="button" class="btn btn-primary contact-button" href="' . URL_BASE . 'contact_org/' . $data['id'] . '"><strong>Contact Organization</a></strong></p>';
          ?>
        </div>
      </section>
      <div class="form-group">
      <i class="fas fa-user-circle"></i> <?php echo $data['name']; ?>
      </div>
      <div class="form-group">
        <i class="fas fa-map-marker-alt"></i> <?php echo $data['address']; ?>
      </div>
      <div class="form-group">
        <i class="fas fa-globe-asia"></i> <?php echo $data['zip']; ?>
      </div>
      <div class="form-group">
        <i class="fas fa-phone"></i> <?php echo $data['phone']; ?>
      </div>
  </main>

    <aside class="container">
      <h2 class="primary">Volunteer Opportunities:</h2>
      <div class="row">
        <div class="col-md-3 col-sm-12 table-head">Days</div>
        <div class="col-md-3 col-sm-12 table-head">Title</div>
        <div class="col-md-6 col-sm-12 table-head">Description</div>
      </div><br>
        <?php
        for($i = 0; $i < count($data['opps']); $i++) {
  ?>
    <section class="row">
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <?php echo $data['opps'][$i]['date']; ?>
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
        <?php echo $data['opps'][$i]['title']; ?>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="form-group">
          <?php echo $data['opps'][$i]['description']; ?>
        </div>
      </div>
    </section>
    <hr>
  <?php }
        ?>
      </aside>
  <?php include('Views/footer.php'); ?>
