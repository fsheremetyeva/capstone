<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo URL_BASE; ?>/Assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Community Helper</title>


    <!-- Custom styles for this template -->
    <link href="<?php echo URL_BASE; ?>/Assets/css/main.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


  <body>

    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo URL_BASE; ?>/"> <img id="logo" src="<?php echo URL_BASE; ?>/Assets/Images/Logo.jpg" alt="Community Helper Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-c" aria-controls="navbar-c" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-c">
        <ul class="navbar-nav mr-auto" id="navbar-ul">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BASE; ?>/">Home</a>
          </li>
          <?php if(IS_LOGGED_IN) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BASE; ?>/logout">Log-Out</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BASE; ?>/dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BASE; ?>/settings">Settings</a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BASE; ?>/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BASE; ?>/register_organization">Register Organization</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BASE; ?>/register_volunteer">Register Volunteer</a>
          </li>
        <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo URL_BASE; ?>/search">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Find Volunteer Listings</button>
        </form>
      </div>
    </nav>

    <main role="main">
    <?php echo IS_LOGGED_IN ? $_SESSION['name'] : ''; ?>
