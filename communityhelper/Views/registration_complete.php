<?php include('Views/header.php'); ?>
<section class="container">
<h1 class="primary">Thanks <?php echo $data['username']; ?>, now you can go to the login page and login</h1>
<br>
<a class="btn btn-primary" role="button" href="<?php echo URL_BASE; ?>login">Login Now</a>
</section>
<?php include('Views/footer.php'); ?>
