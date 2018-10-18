<?php include('Views/header.php'); ?>
<section class="page-title">
  <div class="container">
    <h1>Search Results <?php echo !empty($_POST['search']) ? 'For ' . ucwords($_POST['search']) : null; ?></h1>
  </div>
</section>
<div class="container">
  <div class="row">

  <?php
  $result_count = 0;
  if(empty($data)){
    echo '<h2>No search results found. Please try a new search query.</h2>';
  }
  foreach($data as $result){
    echo '<div class="col-md-4 col-sm-12">';
      $src = '';
      if(!empty($result['avatar']) && !empty($result['avatar_mime'])){
        $src = 'src="data:' . $result['avatar_mime'] . ';base64, ' . base64_encode($result['avatar']) . '" ';
      }
    echo '<img class="user-avatar"' . $src . '/>';
    echo '<h2><a href="' . URL_BASE . 'opportunity/' . $result['id'] . '">' . $result['title'] . '</a></h2>';
    echo '<p><a href="' . URL_BASE . 'organization/' . $result['organization_id'] . '"><strong>' . $result['organization'] . '</a></strong></p>';
    echo '<p>' . $result['description'] . '</p>';
    echo '<p><em>' . $result['date'] . '</em></p>';
    echo '<a class="btn btn-primary" href="' . URL_BASE . 'opportunity/' . $result['id'] . '">Learn More</a><br>';
    echo '</div>';
    // var_dump($result);
    $result_count++;
    if($result_count == 3)
      echo '</div><div class="row">';
  }
  ?>
  </div>
</div>
<?php include('Views/footer.php'); ?>
