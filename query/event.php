<?php
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/event.php');
require('functions.php');
function CreateJson()
{
    $sql = "select * from event";
    $sql = appendQueryStrings($sql);
    $response = MySqlResponse::getInstance();
    $result = $response::mySqlQuery($sql);
    $json = array();
    header('Content-type: application/json');
    $data = null;
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_array($result)){
            if(dateChecker($row['EndDate'])){
                $object = new event($row);
                $data = $object::convert();
                $json['events'][]=($data);
            }
        }
    }
    echo $sql. " size ". mysql_num_rows($result);
    $response::closeMySqlConnection();
    return json_encode($json);
}

?>
