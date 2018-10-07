<?
class CHController_logout{

  public function page($route){
    // Clear session
    unset($_SESSION);
    session_destroy();

    // Send back to home page
    CHController::redirectPage('home');
  }

}
