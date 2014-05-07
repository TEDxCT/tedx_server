<?php

require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/talks.php');
function CreateJson()
{
    $sql = "select * from talk";
    $response = MySqlResponse::getInstance();
    $result = $response::mySqlQuery($sql);
    $json = array();
    header('Content-type: application/json');
    $data = null;
    if(mysql_num_rows($result)){
        while($row=mysql_fetch_array($result)){
            $object = new talks($row);
            $data = $object::convert();
            $json['talks'][]=($data);
        }
    }
    $response::closeMySqlConnection();
    return json_encode($json);
}

?>
