<?
class CHController_register_organization{

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
          CHController::userError($field . ' is empty.');
          break;

      }
    }
    if(($error = CHController::passwordStrong($_POST['password'])) !== true)
    {
      CHController::userError($error);
      goto SHOW;

    }
    else if(!$skip_create){
      // Create new user
      $fields = CHController::insertDataArrayFromPostForSQL($fields);
      $x = CHController::getModel('organization')->add('INSERT INTO organization (name, address, zip, email, phone, password) VALUES (:name, :address, :zip, :email, :phone, :password)', $fields);
      if($x === -1){
        CHController::userError('There was an error processing this form. Likely an account already exists for this email address.');
        goto SHOW;
      }
      else {
        $data['username'] = $fields[':name'];
        CHController::viewHandler('registration_complete', $data);
      }
    }
    else {
      // Not user creation, so just display HTML login form
    SHOW:
    $data['title'] = 'Register Organization';
    CHController::viewHandler('registration_organization', $data);
    }
  }

}
