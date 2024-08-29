<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Config/Routes.php';
require_once 'Controllers/StatusController.php';
require_once 'Controllers/UserController.php';
require_once 'Controllers/TaskController.php';

require_once 'Models/UserModel.php';
require_once 'Models/TaskModel.php';
require_once 'Models/StatusModel.php';

$route = new Routes();
$route->Template();