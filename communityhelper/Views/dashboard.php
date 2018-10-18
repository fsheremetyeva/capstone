
<?php include('Views/header.php'); ?>
<section class="page-title">
  <div class="container">
    <h1>Dashboard: <?php echo  $_SESSION['name'] ;?></h1>
  </div>
</section>
  <div class="container">
    <form class="dashboard-form"  enctype="multipart/form-data" action="<?php echo CURRENT_URL; ?>" method="post">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label class="sr-only" for="image">Image</label>
            <?php
              $src = '';
              if(!empty($data['avatar']) && !empty($data['avatar_mime'])){
                $src = 'src="data:' . $data['avatar_mime'] . ';base64, ' . base64_encode($data['avatar']) . '" ';
              }
            ?>
            <input type="file" id="image" name="image" value="">
            <img class="user-avatar" <?php echo $src; ?> />
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <?php if(IS_VOLUNTEER) { ?>
            <?php
            $organizations = $data['organizations'];
            $graph = $data['graph'];
            //$data = $data['records'];
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
            <div id="canvas-holder" style="width: 50%;">
            <canvas id="myChart"></canvas>
            </div>
            <script>var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
              // The type of chart we want to create
              type: 'pie',
              // The data for our dataset
              data: {
                  labels: [<?php echo $labels; ?>],
                  datasets: [{
                      label: "My First dataset",
                      data: [<?php echo $dataset; ?>],
                      backgroundColor: [<?php echo $bg; ?>]
                  }]
              },

              // Configuration options go here
              options: {
                    title: {
                        display: true,
                        text: 'Time Spent Volunteering'
                    }}
            });
            </script>



          <?php } ?>
          <?php if(IS_VOLUNTEER) {
            echo '<a class="btn btn-success certificate-btn" href="' . URL_BASE . 'certificate">Get Certificate</a>';
          } ?>
          <?php if(isset($data['description'])) { ?>
          <div class="form-group">
            <label for="description"><strong>About Us:</strong></label>
            <textarea name="description" id="description" placeholder="Description" value=""><?php echo $data['description']; ?></textarea>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="form-group">
        <label class="sr-only" for="name">Name</label>
        <i class="fas fa-user-circle"></i><input type="text" name="name" id="name" placeholder="Name" value="<?php echo $data['name']; ?>">
      </div>
      <div class="form-group">
        <label class="sr-only" for="email">Email</label>
        <i class="fas fa-envelope"></i><input type="email" name="email" id="email" placeholder="Email" value="<?php echo $data['email']; ?>" readonly>
      </div>
      <?php if(isset($data['address'])) { ?>
      <div class="form-group">
        <label class="sr-only address-icon" for="address">Address</label>
        <i class="fas fa-map-marker-alt"></i><input type="text" name="address" id="address" placeholder="Address" value="<?php echo $data['address']; ?>">
      </div>
    <?php } ?>
      <div class="form-group">
        <label class="sr-only" for="zip">Zip</label>
        <i class="fas fa-globe-asia"></i><input pattern="[0-9]{5}" type="tel" name="zip" id="zip" placeholder="zip" value="<?php echo $data['zip']; ?>">
      </div>
      <div class="form-group">
        <i class="fas fa-phone"></i><label class="sr-only" for="phone">Phone</label>
        <input type="tel" name="phone" pattern="^[0-9-+()]*$" id="phone" placeholder="phone" value="<?php echo $data['phone']; ?>">
      </div>
        <?php if(isset($data['association'])) { ?>
        <div class="form-group">
          <label class="sr-only" for="association">Association:</label>
          <i class="far fa-building"></i><input name="association" id="association" placeholder="Association" value="<?php echo $data['association']; ?>">
        </div>
      <?php } ?>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
