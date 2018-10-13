<?
class CHController_opportunity {

  public function page($route){
    $opp = CHController::getDetailsOnOpportunity(URL_SECOND_PARAMETER);
    $data = CHController::getDetailsOnOrganization($opp[0]['organization_id']);
    $data['opps'] = CHController::getModel('organization')->select('SELECT * FROM volunteer_opportunities WHERE organization_id = :id', array(':id' => $opp[0]['organization_id']));

    CHController::viewHandler('opportunity', $data);
  }

}
