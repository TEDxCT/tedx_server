<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/05/02
 * Time: 21:29
 */
function JsonErrorResult($developerMessage)
{
    $userMessage = "Unable to correctly collect data from server";
    header('Content-type: application/json');
    http_response_code(408);
    $json['response']["result"]="error";
    $json['response']["developerMessage"]=$developerMessage;
    $json['response']["userMessage"]=$userMessage;
    echo json_encode($json);
    exit;
}