<?php include('Views/header.php'); ?>
<div class="container">
  <form action="#" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="tel" name="phone" id="phone">
    </div>
    <div class="form-group">
      <label for="association">Association</label>
      <input type="text" name="association" id="association">
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="tel" name="zip" id="zip">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<?php include('Views/footer.php'); ?>
