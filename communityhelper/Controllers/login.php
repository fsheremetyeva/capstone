<?
class CHController_login{

  public function page($route){

    // Handle the login process
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user'])){

      // Address case if logging into volunteer or organization account
      switch($_POST['user']){
        case 'organization':
            $x = CHController::getModel('organization')->select('SELECT * FROM organization WHERE email = :email AND password = :password', array(':email' => $_POST['email'], ':password' => sha1($_POST['password'])));
            $type = 'organization';
            break;
          case 'volunteer':
            $x = CHController::getModel('volunteer')->select('SELECT * FROM volunteer WHERE email = :email AND password = :password', array(':email' => $_POST['email'], ':password' => sha1($_POST['password'])));
            $type = 'volunteer';
            break;
      }

      if(empty($x)){
        echo 'UNKNOWN USERNAME OR PASSWORD';
        exit;
      }
      else if(isset($x[0]['name'])){
        // Valid user, proceed with setting up session authentication
        $_SESSION['id'] = $x[0]['id'];
        $_SESSION['email'] = $x[0]['email'];
        $_SESSION['name'] = $x[0]['name'];
        $_SESSION['zip'] = $x[0]['zip'];
        $_SESSION['type'] = $type;
        //echo 'welcome back ' . $_SESSION['name'];
        CHController::redirectPage('dashboard');
      }
    }
    $data['title'] = 'Login';
    $data['body'] = 'Login';
    CHController::viewHandler('login', $data);
  }

}
