<?php

// Database credentials
$config['dbname'] = 'community';
$config['dbuser'] = 'root';
$config['dbpass'] = 'root';

session_start();

// Helper to indicate if anyone is logged in
define('IS_LOGGED_IN', isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['type']));
// Helper to indicate if a volunteer is logged in
define('IS_VOLUNTEER', IS_LOGGED_IN && $_SESSION['type'] == 'volunteer');
// Helper to indicate if an organization is logged in
define('IS_ORGANIZATION', IS_LOGGED_IN && $_SESSION['type'] == 'organization');
// Make CONSTANT_URL so it's easy for linking/reference purposes
define('CURRENT_URL', $_SERVER['REQUEST_URI']);

class CHController{

  public static $db = null;

  // Our framework to call the view for the page
  public static function viewHandler($view, $data = array()){
    include('Views/' . $view . '.php');
  }
  public static function passwordStrong($pw){
    // return true if the password string meets our set requirements
    if(strlen($pw) < 6){
      return "The password must be at least six characters.";
    }

    $contains_uppercase = false;
    $contains_number = false;
    for($i = 0; $i < strlen($pw); $i++){
      if(is_numeric($pw[$i])){
        $contains_number = true;
      }
      else if(strtoupper($pw[$i]) == $pw[$i]){
        $contains_uppercase = true;
      }
    }

    if($contains_uppercase == false){
      return "The password must contain an uppercase character.";
    }
    else if($contains_number == false){
      return "The password must contain a number.";
    }

    return true;
  }
  public static function userError($err){
    echo '<script> alert("' . ucwords($err) . '"); </script>';
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
    // Query the current details on the user regardless of whether it's an org or volunteer
    if(isset($_SESSION['id']) && isset($_SESSION['type'])){
      if($_SESSION['type'] == 'organization')
        return self::getDetailsOnOrganization($_SESSION['id']);
      else if($_SESSION['type'] == 'volunteer')
        return self::getDetailsOnVolunteer($_SESSION['id']);
    }
  }
  public static function getDetailsOnVolunteer($id, $email = null){
    // Query details on current volunteer logged in
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
    // Query details on current organization logged in
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
  public static function getDetailsOnOpportunity($id){
    // Helper to get details on a volunteer opportunity
      return CHController::getModel('organization')->select('SELECT * FROM volunteer_opportunities WHERE id = :id', array(':id' => $id));

    return $details;
  }
  public static function redirectPage($page){
    // Just a helper to redirect to the desired page
    header('Location: ' . URL_BASE . $page);
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
define('URL_SECOND_PARAMETER', isset($USER_REQUEST_R[1]) ? $USER_REQUEST_R[1] : null);
define('URL_THIRD_PARAMETER', isset($USER_REQUEST_R[2]) ? $USER_REQUEST_R[2] : null);

// See if controller is set otherwise fallback to home page
$CONTROLLER = isset($USER_REQUEST_R[0]) && is_file('Controllers/' . $USER_REQUEST_R[0] . '.php') ? strtolower($USER_REQUEST_R[0]) : 'home';
$url_base = empty($_REQUEST['u']) ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '/' . $USER_REQUEST_R[0]));
define('URL_BASE', substr($url_base, -1) == '/' ? $url_base : $url_base . '/');

// Call the controller
require('Controllers/' . $CONTROLLER . '.php');
echo call_user_func(array('CHController_' . $CONTROLLER, 'page'), $USER_REQUEST_R);
 ?>
