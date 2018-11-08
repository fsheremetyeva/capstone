<?php include('Views/header.php'); ?>
<script>
    var timer = setTimeout(function() {
        window.location='<?php echo URL_BASE; ?>login'
    }, 5000);
</script>
</body>
<section class="container">
<h1 class="primary">Thanks <?php echo $data['username']; ?>!</h1>
<h2>You will now be redirected to Login page.</h2>
<br>
<a class="btn btn-primary" role="button" href="<?php echo URL_BASE; ?>login">Login Now</a>
</section>
<?php include('Views/footer.php'); ?>
