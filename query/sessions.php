<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/05/02
 * Time: 0:58
 */

require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/sessions.php');
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
echo json_encode($json);
$response::closeMySqlConnection();
// please refer to our PHP JSON encode function tutorial for learning json_encode function in detail
?>
