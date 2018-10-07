<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Community Helper</title>


    <!-- Custom styles for this template -->
    <link href="Assets/css/main.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="#"> <img id="logo" src="Assets/Images/Logo.jpg" alt="Community Helper Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-c" aria-controls="navbar-c" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-c">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main">
    <?php echo IS_LOGGED_IN ? $_SESSION['name'] : ''; ?>