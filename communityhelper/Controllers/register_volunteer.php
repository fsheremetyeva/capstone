<?
class CHController_register_volunteer{

  public function page($route){
    // Form validation / checks to see new user creation
    $fields = array('name', 'email', 'password', 'phone', 'association', 'zip');
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
      $x = CHController::getModel('volunteer')->add('INSERT INTO volunteer (name, association, zip, email, phone, password) VALUES (:name, :association, :zip, :email, :phone, :password)', $fields);
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
    // Just show new user form
    SHOW:
    $data['title'] = 'Register Volunteer';
    CHController::viewHandler('registration_volunteer', $data);
    }
  }

}
