<?

class CHController_search{

  public function page($route){

    // Search for opportunities
    $search = $_POST['search'];
    $data = CHController::getModel('organization')->search_opportunities($search);
    CHController::viewHandler('search', $data);
  }

}
