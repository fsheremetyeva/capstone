<?php

// Database credentials
$config['dbname'] = '';
$config['dbuser'] = '';
$config['dbpass'] = '';

class CHController{

  public static $db = null;
  public static function viewHandler($view, $data = array()){
    include('Views/' . $view . '.php');
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

require('Controllers/' . $CONTROLLER . '.php');

echo call_user_func(array('CHController_' . $CONTROLLER, 'page'), $USER_REQUEST_R);
 ?>
