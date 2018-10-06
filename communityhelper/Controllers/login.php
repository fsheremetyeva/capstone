<?
class CHController_login{

  public function page($route){
    
    var_dump($route);
    $data['title'] = 'Login Page SUPER SECURE';
    $data['body'] = 'Login Blogin';
    CHController::viewHandler('simple', $data);
  }

}
