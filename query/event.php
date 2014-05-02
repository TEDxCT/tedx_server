<?php
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/event.php');
$sql = "select * from event";
$response = MySqlResponse::getInstance();
$result = $response::mySqlQuery($sql);
$json = array();
header('Content-type: application/json');
$data;
if(mysql_num_rows($result)){
    while($row=mysql_fetch_array($result)){
        if(dateChecker($row['EndDate'])){
            $object = new event($row);
            $data = $object::convert();
            $json['events'][]=($data);
        }
    }
}
echo json_encode($json);
$response::closeMySqlConnection();
// please refer to our PHP JSON encode function tutorial for learning json_encode function in detail
function dateChecker($data)
{
    $endDate = date("Y-m-d",strtotime( $data ));
    $now = date("Y-m-d");
    if($now<$endDate)
    {
        return true;
    }
    return false;
}
?>
