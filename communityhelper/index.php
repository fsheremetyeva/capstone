<?php

// Database credentials
$config['dbname'] = 'community';
$config['dbuser'] = 'root';
$config['dbpass'] = 'root';

session_start();
define('IS_LOGGED_IN', isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['type']));

// Make CONSTANT_URL so it's easy for linking/reference purposes
define('CURRENT_URL', $_SERVER['REQUEST_URI']);
define('URL_BASE', empty($_REQUEST['u']) ? $_SERVER['REQUEST_URI'] : dirname($_SERVER['REQUEST_URI']));

class CHController{

  public static $db = null;
  public static function viewHandler($view, $data = array()){
    include('Views/' . $view . '.php');
  }
  public static function insertDataArrayFromPostForSQL($v){
    // Reformat the array of $_POST values to check and then reformat for easy passing to PDO data
    $newArray = array();
    foreach($v as $w){
      $value = $_POST[$w];

      if($w == 'password'){
        $value = sha1($value);
      }

      $newArray[':' . $w] = $value;
    }

    return $newArray;
  }
  public static function getDetailsOnCurrentUser(){
    if(isset($_SESSION['id']) && isset($_SESSION['type'])){
      if($_SESSION['type'] == 'organization')
        return self::getDetailsOnOrganization($_SESSION['id']);
      else if($_SESSION['type'] == 'volunteer')
        return self::getDetailsOnVolunteer($_SESSION['id']);
    }
  }
  public static function getDetailsOnVolunteer($id, $email = null){
      $details = null;

      if($email !== null){
        $x = CHController::getModel('volunteer')->select('SELECT * FROM volunteer WHERE email = :email', array(':email' => $email));
      }
      else {
        $x = CHController::getModel('volunteer')->select('SELECT * FROM volunteer WHERE id = :id', array(':id' => $id));
      }

    if(isset($x[0]['name'])){
        $details = $x[0];
      }

    return $details;
  }
  public static function getDetailsOnOrganization($id, $email = null){
      $details = null;

      if($email !== null){
        $x = CHController::getModel('organization')->select('SELECT * FROM organization WHERE email = :email', array(':email' => $email));
      }
      else {
        $x = CHController::getModel('organization')->select('SELECT * FROM organization WHERE id = :id', array(':id' => $id));
      }

    if(isset($x[0]['name'])){
        $details = $x[0];
      }

    return $details;
  }
  public static function redirectPage($page){
    // Just a helper to redirect to the desired page
    header('Location: ' . URL_BASE . '/' . $page);
  }
  public static function getModel($model){
    // Load the model
    require_once('Models/' . $model . '.php');

    // Initalize the model
    return new $model(self::$db);
  }
}

// Create the database connection
CHController::$db = new PDO("mysql:dbname=".$config["dbname"].";",$config["dbuser"],$config["dbpass"]);

// ROUTER
// Parse the requested route for dispatch
$USER_REQUEST = $_REQUEST['u'];
$USER_REQUEST_R = explode('/', $USER_REQUEST);

// See if controller is set otherwise fallback to home page
$CONTROLLER = isset($USER_REQUEST_R[0]) && is_file('Controllers/' . $USER_REQUEST_R[0] . '.php') ? strtolower($USER_REQUEST_R[0]) : 'home';

// Call the controller
require('Controllers/' . $CONTROLLER . '.php');
echo call_user_func(array('CHController_' . $CONTROLLER, 'page'), $USER_REQUEST_R);
 ?>
