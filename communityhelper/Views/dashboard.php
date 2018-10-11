
<?php include('Views/header.php'); ?>
  <div class="container">
    <?php echo '<p>Thanks for signing in, ' . $_SESSION['name'] . '.</p>'; ?>
    <form class="dashboard-form"  enctype="multipart/form-data" action="<?php echo CURRENT_URL; ?>" method="post">
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
            <input type="file" id="image" name="image" value="">
            <img class="user-avatar" <?php echo $src; ?> />
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <?php if(isset($data['description'])) { ?>
          <div class="form-group">
            <label class="sr-only" for="description">Description:</label>
            <textarea name="description" id="description" placeholder="Description"><?php echo $data['description']; ?></textarea>
          </div>
        <?php } ?>
          <?php if(isset($data['association'])) { ?>
          <div class="form-group">
            <label class="sr-only" for="association">Association:</label>
            <textarea name="association" id="association" placeholder="Association"><?php echo $data['association']; ?></textarea>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="form-group">
        <label class="sr-only" for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $data['name']; ?>">
      </div>
      <?php if(isset($data['address'])) { ?>
      <div class="form-group">
        <label class="sr-only" for="address">Address</label>
        <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $data['address']; ?>">
      </div>
    <?php } ?>
      <div class="form-group">
        <label class="sr-only" for="zip">Zip</label>
        <input type="tel" name="zip" id="zip" placeholder="zip" value="<?php echo $data['zip']; ?>">
      </div>
      <div class="form-group">
        <label class="sr-only" for="phone">Phone</label>
        <input type="tel" name="phone" id="phone" placeholder="phone" value="<?php echo $data['phone']; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
