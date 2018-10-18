
<?php include('Views/header.php'); ?>
  <div class="container">
      <div class="row">
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
            <img class="user-avatar" <?php echo $src; ?> />
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <?php echo $data['description']; ?>
            <?php echo '<p><a href="' . URL_BASE . '/contact_org/' . $data['id'] . '"><strong>Contact Organization</a></strong></p>';
            ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <?php echo $data['name']; ?>
      </div>
      <div class="form-group">
        <?php echo $data['address']; ?>
      </div>
      <div class="form-group">
        <?php echo $data['zip']; ?>
      </div>
      <div class="form-group">
        <?php echo $data['phone']; ?>
      </div>
  </div>

    <div class="container">
        <?php
        for($i = 0; $i < count($data['opps']); $i++) {
  ?>
    <div class="row">
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
    </div>
  <?php }
        ?>
  <?php include('Views/footer.php'); ?>
