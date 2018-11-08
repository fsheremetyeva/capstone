<?php include('Views/header.php'); ?>
<section class="page-title">
  <div class="container">
    <h1>Login</h1>
  </div>
</section>
<main class="container">
  <form action="<?php echo CURRENT_URL; ?>" method="post">

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="user">Please select one</label>
      <select id="user" name="user">
        <option value="volunteer"> I am a volunteer</option>
          <option value="organization">I am an organization</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</main>
<?php include('Views/footer.php'); ?>
