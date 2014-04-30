<?php
require($_SERVER['DOCUMENT_ROOT'].'/database/MySqlResponse.php');
require($_SERVER['DOCUMENT_ROOT'].'/converter/event.php');
$sql = "select * from event";
$response = MySqlResponse::getInstance();
$result = $response::mySqlQuery($sql);
$json = array();
header('Content-type: application/json');
$data;
$i = 0;
if(mysql_num_rows($result)){
    while($row=mysql_fetch_array($result)){
        $object = new event($row);
        echo $row[0];
        $data = $object::convert();
        echo $data->dateModified;
        $json['event']=($data);
        $i.=1;
    }
}
mysql_close($db_name);
echo json_encode($json);
// please refer to our PHP JSON encode function tutorial for learning json_encode function in detail
?>
