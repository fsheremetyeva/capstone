
<?php include('Views/header.php'); ?>
<section class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Make an impact in your community</h1>
    <form id="jumbotron-search" class="form-inline my-2 my-lg-0" method="post" action="<?php echo URL_BASE; ?>search">
      <input class="form-control mr-sm-2" type="text" placeholder="Keyword or zip code" aria-label="Search" name="search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</section>
  <main class="container">
    <section class="row">
      <div class="col-md-6 col-sm-12">
        <a class="volunteer-cta" href="#volunteer-info" title="volunteer">
          <h2> I am a volunteer</h2>
        </a>
      </div>
      <div class="col-md-6 col-sm-12">
        <a class="nonprofit-cta" href="#non-profit-info" title="non-profit">
          <h2> I am a non-profit</h2>
        </a>
      </div>
    </section>
      <section class="row info-section">
        <div class="col-md-6 col-sm-12">
          <h3 id="volunteer-info" class="accent">Volunteers are able to:</h3><br>
          <p class="search-o">Find volunteers opportunuties in your comunity</p>
          <p class="track-o">Keep track of your volunteer hours</p>
          <p class="dashboard-o">See your volunteer progress and history. </p>
          <p class="certificate-o">Get a certificate displaying volunteer work.</p><br>
        </div>
        <div class="col-md-6 col-sm-12">
          <h3 id="non-profit-info" class="primary">Non-profits are able to:</h3><br>
          <p class="broadcast-b">Broadcast volunteer opportunities</p>
          <p class="application-b">Receive volunteer applications</p>
          <p class="dashboard-b">Manage volunteer listings</p><br>
        </div>
      </section>
    <?php echo $data['body']; ?>
  </main>
<?php include('Views/footer.php'); ?>
