<?php
include('api/Rest.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];
$api = new Rest();

switch ($requestMethod) {
    case 'POST':
        $api->insertWisata($_POST);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
