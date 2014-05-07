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

?>