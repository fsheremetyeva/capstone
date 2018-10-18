
  <div class="container">
    <form class="listing-form"  enctype="multipart/form-data" action="<?php echo CURRENT_URL; ?>" method="post">
      <?php
      for($i = 0; $i < count($data); $i++) {
?>
  <div class="row">
    <div class="col-md-3 col-sm-12">
      <div class="form-group">
        <label class="sr-only" for="days">Days:</label>
        <input type="text" name="days[]" id="days" placeholder="Days" value="<?php echo $data[$i]['date']; ?>">
        <input type="hidden" name="opp_id[]" id="opp_id" value="<?php echo $data[$i]['id']; ?>">

      </div>
    </div>
    <div class="col-md-3 col-sm-12">
      <div class="form-group">
        <label class="sr-only" for="title">Title</label>
        <input type="text" name="title[]" id="title" placeholder="Title" value="<?php echo $data[$i]['title']; ?>">
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="form-group">
        <label class="sr-only" for="description">Description</label>
        <input type="text" name="description[]" id="description" placeholder="Description" value="<?php echo $data[$i]['description']; ?>">
        <a href="<?php echo CURRENT_URL; ?>/delete/<?php echo $data[$i]['id']; ?>">Delete</a>
      </div>
    </div>
  </div>
<?php }
      ?>
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="form-group">
            <label class="sr-only" for="days">Days:</label>
            <input type="text" name="days[]" id="days" placeholder="Days" value="">
            <input type="hidden" name="opp_id[]" id="opp_id" value="NEW">

          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="form-group">
            <label class="sr-only" for="title">Title</label>
            <input type="text" name="title[]" id="title" placeholder="Title" value="">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label class="sr-only" for="description">Description</label>
            <input type="text" name="description[]" id="description" placeholder="Description" value="">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add New Listing</button>
    </form>
  </div>
<?php include('Views/footer.php'); ?>
