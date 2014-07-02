<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/talks.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/speakers.php');
class talks {
    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
    }

    public static function convert()
    {
        $model = new \models\talks();
        $model->id = self::$data['Id'];
        $model->dateCreated = strtotime(self::$data['DateCreated']);
        $model->dateModified = strtotime(self::$data['DateModified']);
        $model->isActive = self::$data['IsActive'];
        $model->name = self::$data['Name'];
        $model->imageURL = self::$data['ImageURL'];
        $model->videoURL = self::$data['VideoURL'];
        $model->descriptionHTML = self::$data['DescriptionHTML'];
        $model->orderInSession = self::$data['OrderInSession'];
        $model->sessionId = self::$data['SessionId'];
        $model->speakerId = self::$data['SpeakerId'];
        // Slightly inefficient way to re-query the DB for each sub set
        $sql = "Select * from speaker where Id = ".self::$data['SpeakerId'];
        $response = MySqlResponse::getInstance();
        $result = $response::mySqlQuery($sql);
        if(mysql_num_rows($result)){
            while($row=mysql_fetch_array($result)){
                $object = new speakers($row);
                $speakersData = $object::convert();
                $model->speaker=($speakersData);
            }
        }
        else
        {
            $model->speaker = null;
        }
        return $model;
    }
}