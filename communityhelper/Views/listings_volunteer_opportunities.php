
  <main class="container">
    <br><h2 class="primary">Manage Volunteer Listings</h2>
    <section class="row">
      <div class="col-md-3 col-sm-12 table-head">Days</div>
      <div class="col-md-3 col-sm-12 table-head">Title</div>
      <div class="col-md-5 col-sm-12 table-head">Description</div>
      <div class="col-md-1 col-sm-12 table-head">Delete</div>
    </section>
    <form class="listing-form"  enctype="multipart/form-data" action="<?php echo CURRENT_URL; ?>" method="post">
      <?php
      for($i = 0; $i < count($data); $i++) {
?>

  <section class="row">
    <div class="col-md-3 col-sm-12 table-cell">
      <div class="form-group">
        <label class="sr-only" for="days">Days:</label>
        <input type="text" name="days[]" id="days" placeholder="Days" value="<?php echo $data[$i]['date']; ?>">
        <input type="hidden" name="opp_id[]" id="opp_id" value="<?php echo $data[$i]['id']; ?>">

      </div>
    </div>
    <div class="col-md-3 col-sm-12 table-cell">
      <div class="form-group">
        <label class="sr-only" for="title">Title</label>
        <input type="text" name="title[]" id="title" placeholder="Title" value="<?php echo $data[$i]['title']; ?>">
      </div>
    </div>
    <div class="col-md-5 col-sm-12 table-cell">
      <div class="form-group">
        <label class="sr-only" for="description">Description</label>
        <input type="text" name="description[]" id="description" placeholder="Description" value="<?php echo $data[$i]['description']; ?>">
        </div>
        </div>
        <div class="col-md-1 col-sm-12">
        <a class="delete-btn" title="delete" role="button" href="<?php echo CURRENT_URL; ?>/delete/<?php echo $data[$i]['id']; ?>">Delete</a>
      </div>

  </section>
<?php }
      ?>

      <section class="row opporunity-table">
        <div class="col-md-3 col-sm-12 table-cell">
          <div class="form-group">
            <label class="sr-only" for="days">Days:</label>
            <input type="text" name="days[]" id="days" placeholder="Days" value="">
            <input type="hidden" name="opp_id[]" id="opp_id" value="NEW">

          </div>
        </div>
        <div class="col-md-3 col-sm-12 table-cell">
          <div class="form-group">
            <label class="sr-only" for="title">Title</label>
            <input type="text" name="title[]" id="title" placeholder="Title" value="">
          </div>
        </div>
        <div class="col-md-5 col-sm-12 table-cell">
          <div class="form-group">
            <label class="sr-only" for="description">Description</label>
            <input type="text" name="description[]" id="description" placeholder="Description" value="">
          </div>
        </div>
      </section>
      <br>
      <button type="submit" class="btn btn-primary">Add / Update</button>
    </form>
  </main>
<?php include('Views/footer.php'); ?>
