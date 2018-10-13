<?
class CHController_search{

  public function page($route){
    $search = $_POST['search'];
    $data = CHController::getModel('organization')->search_opportunities($search);
    CHController::viewHandler('search', $data);
  }

}
