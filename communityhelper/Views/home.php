
<?php include('Views/header.php'); ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Make an impact in your community</h1>
    <form id="jumbotron-search" class="form-inline my-2 my-lg-0" method="post" action="<?php echo URL_BASE; ?>search">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <a class="volunteer-cta" href="">
          <h2> I am a volunteer</h2>
        </a>
      </div>
      <div class="col-md-6 col-sm-12">
        <a class="nonprofit-cta" href="">
          <h2> I am a non-profit</h2>
        </a>
      </div>
    </div>
    <?php echo $data['body']; ?>
  </div>
<?php include('Views/footer.php'); ?>
