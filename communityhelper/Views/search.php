<?php include('Views/header.php'); ?>
<section class="page-title">
  <div class="container">
    <h1>Search Results <?php echo !empty($_POST['search']) ? 'For ' . ucwords($_POST['search']) : null; ?></h1>
  </div>
</section>
<main class="container">
  <section class="row">

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
    echo '<img title="' . $result['organization'] . '" alt="' . $result['organization'] . '"  class="user-avatar"' . $src . '/><br>';
    echo '<h3><a title="' . $result['title'] . '" href="' . URL_BASE . 'opportunity/' . $result['id'] . '">' . $result['title'] . '</a></h3>';
    echo '<p><a title="' . $result['organization'] . '" href="' . URL_BASE . 'organization/' . $result['organization_id'] . '"><strong>' . $result['organization'] . '</a></strong></p>';
    echo '<p>' . $result['description'] . '</p>';
    echo '<p><em>' . $result['date'] . '</em></p>';
    echo '<a role="button" title="Learn More" class="btn btn-secondary" href="' . URL_BASE . 'opportunity/' . $result['id'] . '">Learn More</a><br>';
    echo '</div>';
    // var_dump($result);
    $result_count++;
    if($result_count == 3)
      echo '</section><br><hr><br><section class="row">';
  }
  ?>
</section>
</main>
<?php include('Views/footer.php'); ?>
