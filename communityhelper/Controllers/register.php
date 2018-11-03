<?
class CHController_register{

  public function page($route){
    $data['title'] = 'Register';
    CHController::viewHandler('register', $data);
  }

}
