
<?php include('Views/header.php'); ?>
<section class="page-title">
  <div class="container">
    <h1>Account Settings</h1>
  </div>
</section>
  <div class="container">

    <form class="dashboard-form"  action="<?php echo CURRENT_URL; ?>" method="post">

      <div class="form-group">
        <label class="sr-only" for="password">Current Password</label>
        <input type="password" name="password" id="password" placeholder="Current Password" value="<?php echo $data['name']; ?>">
      </div>
      <div class="form-group">
        <label class="sr-only" for="new-password">New Password</label>
        <input type="password" name="new_password" id="new-password" placeholder="New Password" value="<?php echo $data['name']; ?>">
      </div>
      <div class="form-group">
        <label class="sr-only" for="confirm-password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" value="<?php echo $data['name']; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
<?php include('Views/footer.php'); ?>
