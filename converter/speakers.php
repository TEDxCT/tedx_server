<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/speakers.php');
class speakers {
    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
    }

    public static function convert()
    {
        $model = new \models\speakers();
        $model->id = self::$data['Id'];
        $model->dateCreated = self::$data['DateCreated'];
        $model->dateModified = self::$data['DateModified'];
        $model->isActive = self::$data['IsActive'];
        $model->fullName = self::$data['FullName'];
        $model->imageURL = self::$data['ImageURL'];
        $model->descriptionHTML = self::$data['DescriptionHTML'];
        $model->funkyTitle = self::$data['FunkyTitle'];
        return $model;
    }
}