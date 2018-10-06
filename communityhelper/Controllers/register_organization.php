<?
class CHController_register_organization
{

  public function page($route){

    // Checks if POSTing for new registration
    $fields = array('name', 'email', 'password', 'phone', 'address', 'zip');
    $skip_create = false;
    foreach($fields as $field){

      if(!isset($_POST[$field])){

        $skip_create = true;
        break;
      }
      if(empty($_POST[$field])){

          $skip_create = true;
          echo $field . ' is empty.';
          break;
      }
    }
    if(!$skip_create){
      // Create new user
      $fields = CHController::insertDataArrayFromPostForSQL($fields);
      $x = CHController::getModel('organization')->add('INSERT INTO organization (name, address, zip, email, phone, password) VALUES (:name, :address, :zip, :email, :phone, :password)', $fields);
      $data['username'] = $fields[':name'];
      CHController::viewHandler('registration_complete', $data);

    }
    else {
      // Not user creation, so just display HTML login form
    $data['title'] = 'Register Organization';
    CHController::viewHandler('registration_organization', $data);
    }
  }

}
