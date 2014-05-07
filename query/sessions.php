<?php

require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/sessions.php');
function CreateJson()
{
    $sql = "Select * from session";
    $response = MySqlResponse::getInstance();
    $result = $response::mySqlQuery($sql);
    $json = array();
    header('Content-type: application/json');
    $data;
    if(mysql_num_rows($result)){
        while($row=mysql_fetch_array($result)){
            $object = new sessions($row);
            $data = $object::convert();
            $json['sessions'][]=($data);
        }
    }
    $response::closeMySqlConnection();
    return json_encode($json);
}
?>
