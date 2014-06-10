<?php

require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/speakers.php');
function CreateJson()
{
    $sql = "SELECT * FROM speaker";

    $response = MySqlResponse::getInstance();
    $result = $response::mySqlQuery($sql);
    $json = array();
    header('Content-type: application/json');
    if(mysql_num_rows($result)){
        while($row=mysql_fetch_array($result)){
            $object = new speakers($row);
            $data = $object::convert();
            $json['speakers'][]=($data);
        }
    }
    $response::closeMySqlConnection();
    return json_encode($json);
}
?>
