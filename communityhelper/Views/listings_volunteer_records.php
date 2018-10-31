<?php
$organizations = $data['organizations'];
$graph = $data['graph'];
$data = $data['records'];
$labels = array();
$dataset = array();
$bg = array();
foreach($graph as $g){
  $labels[] = '"' . $g['organization'] . '"';
  $dataset[] = $g['time'];
  $bg[] = '\'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255)  . ')\'';
}
$labels = implode(', ', $labels);
$dataset = implode(', ', $dataset);
$bg = implode(', ', $bg);
?>
  <main class="container">
    <br><h2 class="primary"><a name="record">Record Volunteer Hours</a></h2>
    <section class="row">
      <div class="col-md-2 col-sm-12 table-head">Date</div>
      <div class="col-md-3 col-sm-12 table-head">The Organizaton</div>
      <div class="col-md-3 col-sm-12 table-head">Duration(Minutes)</div>
      <div class="col-md-3 col-sm-12 table-head">Notes</div>
      <div class="col-md-1 col-sm-12 table-head">Delete</div>
    </section>
    <form class="listing-form"  enctype="multipart/form-data" action="<?php echo CURRENT_URL; ?>#record" method="post">
      <?php
      for($i = 0; $i < count($data); $i++) {
?>
    <section class="row">
      <div class="col-md-2 col-sm-12 table-cell">
        <div class="form-group">
          <label class="sr-only" for="days">Date:</label>
          <input type="text" name="date[]" id="date" placeholder="Date" value="<?php echo $data[$i]['date']; ?>">
          <input type="hidden" name="record_id[]" id="record_id" value="<?php echo $data[$i]['id']; ?>">

        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <label class="sr-only" for="title">Volunteer Organization</label>
          <select id="organization_id" name="organization_id[]">
          <?php foreach($organizations as $org) { ?>
            <option value="<?php echo $org['id']; ?>" <?php echo $data[$i]['organization_id'] == $org['id'] ? 'selected="selected"' : null ?>><?php echo $org['name']; ?></option>
          <?php } ?>
        </select>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 table-cell">
        <div class="form-group">
          <label class="sr-only" for="duration">Duration (Minutes)</label>
          <input type="number" name="duration[]" id="duration" placeholder="Duration" value="<?php echo $data[$i]['duration']; ?>" min="1">
        </div>
      </div>
      <div class="col-md-3 col-sm-12 table-cell">
        <div class="form-group">
          <label class="sr-only" for="description">Notes</label>
          <input type="text" name="notes[]" id="notes" placeholder="Notes" value="<?php echo $data[$i]['notes']; ?>">
        </div>
      </div>
      <div class="col-md-1 col-sm-12">
          <a class="delete-btn" title="delete" role="buton" href="<?php echo CURRENT_URL; ?>/delete/<?php echo $data[$i]['id']; ?>#record">Delete</a>
        </div>
    </section>
<?php }
      ?>
      <section class="row">
        <div class="col-md-2 col-sm-12 table-cell">
          <div class="form-group">
            <label class="sr-only" for="days">Days:</label>
            <input type="date" name="date[]" id="date" placeholder="Date">
            <input type="hidden" name="record_id[]" id="record_id" value="NEW">

          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="form-group">
            <label class="sr-only" for="title">Organization</label>
            <select id="organization_id" name="organization_id[]">
            <?php foreach($organizations as $org) { ?>
              <option value="<?php echo $org['id']; ?>"><?php echo $org['name']; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 table-cell">
          <div class="form-group">
            <label class="sr-only" for="duration">Duration</label>
            <input type="number" name="duration[]" id="duration" placeholder="Duration" min="1">
          </div>
        </div>
        <div class="col-md-3 col-sm-12 table-cell">
          <div class="form-group">
            <label class="sr-only" for="description">Notes</label>
            <input type="text" name="notes[]" id="notes" placeholder="Notes">
          </div>
        </div>
      </section>
      <br>
      <button type="submit" class="btn btn-primary">Update/Add Listing</button>
    </form>
  </main>
<?php include('Views/footer.php'); ?>
