<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/sponsors.php');
class sponsors{
    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
    }

    public static function convert()
    {
        $model = new \models\sponsors();
        $model->id = self::$data['Id'];
        $model->dateCreated = self::$data['DateCreated'];
        $model->dateModified = self::$data['DateModified'];
        $model->isActive = self::$data['IsActive'];
        $model->name = self::$data['Name'];
        $model->imageURL = self::$data['ImageURL'];
        $model->websiteURL = self::$data['WebsiteURL'];
        $model->descriptionHTML = self::$data['DescriptionHTML'];
        return $model;
    }
}