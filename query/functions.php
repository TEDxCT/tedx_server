<?php
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
function appendQueryStrings($sql)
{
//    if($_REQUEST!=null)
//    {
//        $sql .= " where ";
//    }
//    foreach($_REQUEST as $queryVar=>$value)
//    {
//        if($queryVar == "Id")
//        {
//            $sql .= $queryVar." = \"".$value."\"";
//        }
//    }
//    $sql .= " ".$_REQUEST['additionalquery'];
    return $sql;
}
?>