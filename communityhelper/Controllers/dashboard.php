<?
class CHController_dashboard{

  public function page($route){
    if(isset($_POST['name'])){
      $image = isset($_FILES['image']) ? $_FILES['image'] : '';
      CHController::getModel('organization')->update_organization_data($_SESSION['id'], $_POST, $image);
    }

    $data = CHController::getDetailsOnCurrentUser();
    $data['title'] = 'Hello!';
    $data['body'] = 'Woohoo! Welcome To CH!';
    CHController::viewHandler('dashboard', $data);
  }

}
