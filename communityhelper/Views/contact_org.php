
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
  <form action="<?php echo CURRENT_URL; ?>" method="post">
    <div class="form-group">
      <h2>Please fill out the form below and we will get touch with you shortly.</h2><br>
      <label for="name">Your Name</label>
      <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" readonly>
    </div>
      <div class="form-group">
        <label for="name">Your Email</label>
        <input type="text" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" readonly>
      </div>
        <div class="form-group">
          <label for="name">Subject</label>
          <input type="text" name="subject" id="subject">
        </div>
        <div class="form-group">
          <label for="name">Message</label>
          <textarea type="text" name="message" id="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  <?php include('Views/footer.php'); ?>
