<?php include('Views/header.php'); ?>
<div class="container">
  <?php
  foreach($data as $result)
  {
    echo '<h2><a href="' . URL_BASE . '/opportunity/' . $result['id'] . '">' . $result['title'] . '</a></h2>';
    echo '<p><a href="' . URL_BASE . '/organization/' . $result['organization_id'] . '"><strong>' . $result['organization'] . '</a></strong></p>';
    echo '<p>' . $result['description'] . '</p>';
    echo '<hr />';
    // var_dump($result);
  }
  ?>
</div>
<?php include('Views/footer.php'); ?>
