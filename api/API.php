<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

$data = json_decode(file_get_contents('php://input'), true);

$Request = explode('/',trim($Request_URL,'/'));

$r = array();

include 'api/' . $Request[1] . "/" . $Request[2] . "/API.php";

echo json_encode($r);


  ?>
