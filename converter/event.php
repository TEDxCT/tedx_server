<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/event.php');
class event {
    private static $instance;
    private static $model;
    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
        echo $data['LocationDescriptionHTML'];
    }

    public static function convert()
    {
        $model = new \models\event();
        $model->id = self::$data['Id'];
        $model->dateCreated = self::$data['DateCreated'];
        $model->dateModified = self::$data['DateModified'];
        $model->startDate = self::$data['StartDate'];
        $model->endDate = self::$data['EndDate'];
        $model->name = self::$data['Name'];
        $model->imageURL = self::$data['ImageURL'];
        $model->websiteURL = self::$data['WebsiteURL'];
        $model->descriptionHTML = self::$data['DescriptionHTML'];
        $model->latitude = self::$data['Latitude'];
        $model->longitude = self::$data['Longitude'];
        $model->locationDescriptionHTML = self::$data['LocationDescriptionHTML'];
        return $model;
    }
}