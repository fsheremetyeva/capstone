<?
class CHController_dashboard{

  public function page($route){
    // The user dashboard page to be shown at login
    if(!IS_LOGGED_IN)
      CHController::redirectPage('home');

    // Allow uploading new avatar / profile image
    if(isset($_POST['name'])){
      $image = isset($_FILES['image']) ? $_FILES['image'] : '';
      if(IS_ORGANIZATION)
        CHController::getModel('organization')->update_organization_data($_SESSION['id'], $_POST, $image);
        else {
          CHController::getModel('volunteer')->update_volunteer_data($_SESSION['id'], $_POST, $image);
        }
    }

    // Delete handling for volunter records or volunteer opportunities
    if(URL_SECOND_PARAMETER == 'delete'){
      if(IS_ORGANIZATION)
        CHController::getModel('organization')->delete_opportunity($_SESSION['id'], URL_THIRD_PARAMETER);
        else {
          CHController::getModel('volunteer')->delete_record($_SESSION['id'], URL_THIRD_PARAMETER);

        }
        CHController::redirectPage('dashboard');
    }

    if(IS_ORGANIZATION){
      if(isset($_POST['days']) && isset($_POST['opp_id'])){
          for($i = 0; $i < count($_POST['days']) && $i < count($_POST['opp_id']); $i++){
              if($_POST['opp_id'][$i] == 'NEW' && !empty($_POST['days'][$i] && !empty($_POST['title'][$i])) && !empty($_POST['description'][$i])){
                // Insert new volunteer opportunity
                CHController::getModel('organization')->add_new_opportunity($_SESSION['id'], $_POST['days'][$i], $_POST['title'][$i], $_POST['description'][$i]);
              }
              else if ($_POST['opp_id'][$i] != 'NEW'){
                // Update existing volunteer opportunity
                CHController::getModel('organization')->update_opportunity($_SESSION['id'], $_POST['days'][$i], $_POST['title'][$i], $_POST['description'][$i], $_POST['opp_id'][$i]);
              }
          }

      }
  } else {
    if(isset($_POST['duration']) && isset($_POST['notes'])){
        for($i = 0; $i < count($_POST['date']) && $i < count($_POST['duration']); $i++){
            if($_POST['record_id'][$i] == 'NEW' && !empty($_POST['date'][$i] && !empty($_POST['organization_id'][$i]))){
              // Insert new volunteer record
              CHController::getModel('volunteer')->add_new_record($_SESSION['id'], $_POST['date'][$i], $_POST['organization_id'][$i], $_POST['duration'][$i], $_POST['notes'][$i]);
            }
            else if ($_POST['opp_id'][$i] != 'NEW'){
              // Update existing volunteer record
              CHController::getModel('volunteer')->update_record($_SESSION['id'], $_POST['date'][$i], $_POST['organization_id'][$i], $_POST['duration'][$i], $_POST['notes'][$i], $_POST['record_id'][$i]);
            }
            }
        }

    }
    $data = CHController::getDetailsOnCurrentUser();

    if(IS_VOLUNTEER){
      $data['records'] = CHController::getModel('volunteer')->select('SELECT * FROM volunteer_records WHERE name_id = :id', array(':id' => $_SESSION['id']));
      $data['graph'] = CHController::getModel('volunteer')->select('SELECT (SELECT name FROM organization WHERE id = volunteer_records.organization_id LIMIT 1) AS organization, SUM(duration) AS time FROM volunteer_records WHERE name_id = :name_id GROUP BY organization_id', array(':name_id' => $_SESSION['id']));
      $data['organizations'] = CHController::getModel('organization')->select('SELECT id, name FROM organization ORDER BY name ASC', array());

    }
    CHController::viewHandler('dashboard', $data);

    if(IS_ORGANIZATION){
      // Show volunteer opportunities for adding/editing/deleting
      $data = CHController::getModel('organization')->select('SELECT * FROM volunteer_opportunities WHERE organization_id = :id', array(':id' => $_SESSION['id']));
      CHController::viewHandler('listings_volunteer_opportunities', $data);
    }
    else {
      // Show volunteer records for addings/editing/deleting
      $data['records'] = CHController::getModel('volunteer')->select('SELECT * FROM volunteer_records WHERE name_id = :id', array(':id' => $_SESSION['id']));
      $data['graph'] = CHController::getModel('volunteer')->select('SELECT (SELECT name FROM organization WHERE id = volunteer_records.organization_id LIMIT 1) AS organization, SUM(duration) AS time FROM volunteer_records WHERE name_id = :name_id GROUP BY organization_id', array(':name_id' => $_SESSION['id']));
      $data['organizations'] = CHController::getModel('organization')->select('SELECT id, name FROM organization ORDER BY name ASC', array());
      CHController::viewHandler('listings_volunteer_records', $data);    }
  }

}
