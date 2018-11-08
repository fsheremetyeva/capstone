<?php include('Views/header.php'); ?>
<script>
//Form Validation
function phone_check(val, errorTo){
  document.getElementById(errorTo).innerHTML = '';
  if(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test(val) == false){
    document.getElementById(errorTo).innerHTML = 'You must enter a valid phone number.';
  }
}
function zip_check(val, errorTo)
{
  document.getElementById(errorTo).innerHTML = '';
  if(val.length != 5){
    document.getElementById(errorTo).innerHTML = 'Zip code must be five characters.';
  }
  if(/^\d+$/.test(val) == false){
    document.getElementById(errorTo).innerHTML = 'Zip codes should only be made of numbers.';
  }
}
function password_check(val, errorTo){
  var issues = [];
  if(val.length < 6){
    issues.push("at least six characters");
  }
  if(/^[\x00-\x7F]*$/.test(val) == false || /\d/.test(val) == false){
    issues.push("a mix of numbers and letters");
  }
  if(val.toLowerCase() == val){
    issues.push("at least one upper-case character");
  }
  if(issues.length > 0)
    document.getElementById(errorTo).innerHTML = 'Passwords must be ' + issues.join(", ");
  else {
    document.getElementById(errorTo).innerHTML = "";
  }
}
</script>
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
      <input type="password" name="password" id="password" required minlength="6" onchange="password_check(this.value, 'password_error_1');">
      <p class="accent"><sup id="password_error_1">Passwords must be at least 6 characters, a mix of numbers and letters, and at least one upper-case character.</sup></p>
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="tel" name="phone" id="phone" minlength="10" maxlength="10" required onchange="phone_check(this.value, 'phone_error_1');">
      <p class="accent"><sup id="phone_error_1"></sup></p>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" name="address" id="address" required>
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="tel" name="zip" id="zip" required minlength="5" maxlength="5" onchange="zip_check(this.value, 'zip_error_1');">
      <p class="accent"><sup id="zip_error_1"></sup></p>
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
      <input type="password" name="password" id="password" required minlength="6" onchange="password_check(this.value, 'password_error_2');">
      <p class="accent"><sup id="password_error_2">Passwords must be at least 6 characters, a mix of numbers and letters, and at least one upper-case character.</sup></p>
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="tel" name="phone" id="phone" minlength="10" required onchange="phone_check(this.value, 'phone_error_2');">
      <p class="accent"><sup id="phone_error_2"></sup></p>
    </div>
    <div class="form-group">
      <label for="association">Association</label>
      <input type="text" name="association" id="association" required>
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="tel" name="zip" id="zip" required minlength="5" maxlength="5" onchange="zip_check(this.value, 'zip_error_2');">
      <p class="accent"><sup id="zip_error_2"></sup></p>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>
<?php include('Views/footer.php'); ?>
