<?
class CHController_home{

  public function page($route){
    
    $data['title'] = 'Hello!';
    $data['body'] = 'Woohoo! Welcome To CH!';
    CHController::viewHandler('simple', $data);
  }

}
