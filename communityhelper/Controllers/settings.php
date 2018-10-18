<?
class CHController_settings{

  public function page($route){
    if(!IS_LOGGED_IN)
      CHController::redirectPage('home');

      // Verify password information and then update it in the database
    if(isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['new_password'])){
      $data = CHController::getDetailsOnCurrentUser();
      if($data['password'] != sha1($_POST['password'])){
        echo 'Current password does not match!';
      }
      else if($_POST['confirm_password'] != $_POST['new_password']){
        echo 'New password and the confirmation password do not match!';
      }
      else {
        echo 'Password updated';
        if($_SESSION['type'] == 'organization')
          CHController::getModel('organization')->update('UPDATE organization SET password = :pw WHERE id = :id', array(':id' => $_SESSION['id'], ':pw' => sha1($_POST['new_password'])));
        else {
          CHController::getModel('volunteer')->update('UPDATE volunteer SET password = :pw WHERE id = :id', array(':id' => $_SESSION['id'], ':pw' => sha1($_POST['new_password'])));
        }
      }
    }

    // Allow easily updating user password
    CHController::viewHandler('settings', $data);
  }

}
