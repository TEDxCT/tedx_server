<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/talks.php');
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
        $model->dateCreated = self::$data['DateCreated'];
        $model->dateModified = self::$data['DateModified'];
        $model->isActive = self::$data['IsActive'];
        $model->name = self::$data['Name'];
        $model->imageURL = self::$data['ImageURL'];
        $model->videoURL = self::$data['VideoURL'];
        $model->descriptionHTML = self::$data['DescriptionHTML'];
        $model->orderInSession = self::$data['OrderInSession'];
        $model->sessionId = self::$data['SessionId'];
        $model->speakerId = self::$data['SpeakerId'];
        return $model;
    }
}