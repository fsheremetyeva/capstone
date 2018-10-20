<?php include('Views/header.php'); ?>
<section class="page-title">
  <div class="container">
    <h1>Register</h1>
  </div>
</section>
<section class="container register-section">
  <h2>Select the type of the account</h2>
<input id="show-org" onclick="switchRegForm('reg_organization');" type="radio" name="reg_type" value="Organization">
<label> An organization account is intended for non-profits for being able to post about new volunteer opportunities.</label><br>

<input  id="show-vol" onclick="switchRegForm('reg_volunteer');" type="radio" name="reg_type" value="Volunteer">
<label>A volunteer account is for users wishing to learn about new volunteer efforts in their local area.</label><br>
</section>
<script type="text/javascript">
function switchRegForm(show)
{
  document.getElementById('reg_organization').style.display = 'none';
  document.getElementById('reg_volunteer').style.display = 'none';
  document.getElementById(show).style.display = 'block';
}
</script>
<section class="container" id="reg_organization" style="display: none;">
  <h2 class="primary">Organization Registration</h2><br>
  <form action="<?php echo URL_BASE; ?>register_organization" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required minlength="6">
      <p class="accent"><sup>Passwords must be at least 6 characters, a mix of numbers and letters, and at least one upper-case character.</sup></p>
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="tel" name="phone" id="phone" minlength="10" maxlength="10" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" name="address" id="address" required>
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="tel" name="zip" id="zip" required minlength="5" maxlength="5">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>


<section class="container" id="reg_volunteer" style="display: none;">
  <h2 class="primary">Volunteer Registration</h2><br>
  <form action="<?php echo URL_BASE; ?>register_volunteer" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required minlength="6">
      <p class="accent"><sup>Passwords must be at least 6 characters, a mix of numbers and letters, and at least one upper-case character.</sup></p>
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="tel" name="phone" id="phone" minlength="10" required>
    </div>
    <div class="form-group">
      <label for="association">Association</label>
      <input type="text" name="association" id="association" required>
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="tel" name="zip" id="zip" required minlength="5" maxlength="5">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>
<?php include('Views/footer.php'); ?>