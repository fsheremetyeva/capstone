<?
class CHController_home{

  public function page($route){
    // Home page
    $data['title'] = 'Hello!';
    $data['body'] = '';
    CHController::viewHandler('home', $data);
  }

}
