<?php
require('database/MySqlResponse.php');
$sql = "select * from event";
$response = MySqlResponse::getInstance();
$result = $response::mySqlQuery($sql);
$json = array();
header('Content-type: application/json');
if(mysql_num_rows($result)){
    while($row=mysql_fetch_row($result)){
        $json['emp_info'][]=$row;
    }
}
mysql_close($db_name);
echo json_encode($json);
// please refer to our PHP JSON encode function tutorial for learning json_encode function in detail
?>
