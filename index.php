<?php
session_start();
ini_set('display_errors', 1);
require "controllers/MainController.php";

$controller = new MainController();

$action = explode("/", $_SERVER["REQUEST_URI"])[1];
$method = 'action'.explode("?",$action)[0];
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