<?
class CHController_dashboard{

  public function page($route){
    if(isset($_POST['name'])){
      $image = isset($_FILES['image']) ? $_FILES['image'] : '';
      if($_SESSION['type'] == 'organization')
        CHController::getModel('organization')->update_organization_data($_SESSION['id'], $_POST, $image);
        else {
          CHController::getModel('volunteer')->update_volunteer_data($_SESSION['id'], $_POST, $image);
        }
    }

    if($_SESSION['type'] == 'organization'){
      if(isset($_POST['days']) && isset($_POST['opp_id'])){
          for($i = 0; $i < count($_POST['days']) && $i < count($_POST['opp_id']); $i++){
              if($_POST['opp_id'][$i] == 'NEW' && !empty($_POST['days'][$i] && !empty($_POST['title'][$i])) && !empty($_POST['description'][$i])){
                // INSERT NEW
                CHController::getModel('organization')->add_new_opportunity($_SESSION['id'], $_POST['days'][$i], $_POST['title'][$i], $_POST['description'][$i]);
              }
              else if ($_POST['opp_id'][$i] != 'NEW'){
                CHController::getModel('organization')->update_opportunity($_SESSION['id'], $_POST['days'][$i], $_POST['title'][$i], $_POST['description'][$i], $_POST['opp_id'][$i]);
              }
          }

      }
  }

    $data = CHController::getDetailsOnCurrentUser();
    $data['title'] = 'Hello!';
    $data['body'] = 'Woohoo! Welcome To CH!';
    CHController::viewHandler('dashboard', $data);

    if($_SESSION['type'] == 'organization'){
      $data = CHController::getModel('organization')->select('SELECT * FROM volunteer_opportunities WHERE organization_id = :id', array(':id' => $_SESSION['id']));
      CHController::viewHandler('listings_volunteer_opportunities', $data);
    }
  }

}
