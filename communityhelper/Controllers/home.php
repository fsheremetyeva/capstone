<?
class CHController_home{

  public function page($route){
    // Home page
    $data['title'] = 'Hello!';
    $data['body'] = 'Woohoo! Welcome To CH!';
    CHController::viewHandler('home', $data);
  }

}
