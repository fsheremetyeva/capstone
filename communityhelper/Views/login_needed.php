
<?php include('Views/header.php');

$_SESSION['loginTarget'] = CURRENT_URL;
 ?>
<section class="container">
  <p>You need to login to see this page. <a title="login" href="<?php echo URL_BASE; ?>login">Login now</a>.</p>
  <p>Or if you don't have an account yet, please <a title="register" href="<?php echo URL_BASE; ?>register">Rester Now</a></p>
<section>
<?php include('Views/footer.php'); ?>
