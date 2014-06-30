<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/sessions.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/talks.php');
class sessions {
    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
    }

    public static function convert()
    {
        $model = new \models\sessions();
        $model->id = self::$data['Id'];
        $model->dateCreated = strtotime(self::$data['DateCreated']);
        $model->dateModified = strtotime(self::$data['DateModified']);
        $model->isActive = self::$data['IsActive'];
        $model->startTime = strtotime(self::$data['StartTime']);
        $model->endTime = strtotime(self::$data['EndTime']);
        $model->name = self::$data['Name'];
        $model->eventId = self::$data['EventId'];
        // Slightly inefficient way to re-query the DB for each sub set
        $sql = "Select * from talk where SessionId = ".self::$data['Id'];
        $response = MySqlResponse::getInstance();
        $result = $response::mySqlQuery($sql);
        if(mysql_num_rows($result)){
            $model->talks = array();
            while($row=mysql_fetch_array($result)){
                $object = new talks($row);
                $talksData = $object::convert();
                $model->talks[]=($talksData);
            }
        }
        else
        {
            $model->talks = null;
        }
        return $model;
    }
}