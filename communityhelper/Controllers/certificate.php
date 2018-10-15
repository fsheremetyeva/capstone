<?
class CHController_certificate{

  public function page($route){
    // Only makes sense generating the certificate for voluntters
    if(!IS_VOLUNTEER)
      CHController::redirectPage('home');

      // Query the volunteer details to the view that generates PDF result
    $data['graph'] = CHController::getModel('volunteer')->select('SELECT (SELECT name FROM organization WHERE id = volunteer_records.organization_id LIMIT 1) AS organization, SUM(duration) AS time FROM volunteer_records WHERE name_id = :name_id GROUP BY organization_id', array(':name_id' => $_SESSION['id']));
    CHController::viewHandler('user_certificate', $data);
  }

}
