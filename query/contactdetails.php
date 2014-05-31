<?php

require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/contactdetails.php');
function CreateJson()
{
    $sql = "select u.* from url u inner join linkspeakerurl lsu on u.id = lsu.urlid";
    $response = MySqlResponse::getInstance();
    $result = $response::mySqlQuery($sql);
    $json = array();
    header('Content-type: application/json');
    $data = null;
    if(mysql_num_rows($result)){
        while($row=mysql_fetch_array($result)){
            $object = new contactDetails($row);
            $data = $object::convert();
            $json['contactDetails'][]=($data);
        }
    }
    $response::closeMySqlConnection();
    return json_encode($json);
}

?>
