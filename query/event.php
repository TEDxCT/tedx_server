<?php
require($_SERVER['DOCUMENT_ROOT'].'/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/converter/event.php');
$sql = "select * from event";
$response = MySqlResponse::getInstance();
$result = $response::mySqlQuery($sql);
$json = array();
header('Content-type: application/json');
$data;
if(mysql_num_rows($result)){
    while($row=mysql_fetch_row($result)){
        $object = new event($row);
        $data = $object::convert();
    }
}
mysql_close($db_name);
echo json_encode($data);
// please refer to our PHP JSON encode function tutorial for learning json_encode function in detail
?>
