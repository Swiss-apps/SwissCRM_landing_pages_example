<?php
session_start();
ini_set('display_errors', 1);

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

require "controllers/MainController.php";

$controller = new MainController();

$action = explode("/", $_SERVER["REQUEST_URI"])[1];
$method = 'action'.explode("?",$action)[0];

if(!method_exists('MainController',$method)){
    $method = 'actionContactUs';
}

$url_parameters = @explode("?", $_SERVER["REQUEST_URI"])[1];
$affId = @explode('=',  $url_parameters)[1];

if($affId){
    $controller->actionIndex($affId);
}
else if (@$_SESSION['session_token']){
    $controller->$method();
}
else {
    $controller->actionContactUs();
}