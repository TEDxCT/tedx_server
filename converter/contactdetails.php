<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/contactdetails.php');
class contactdetails {
    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
    }

    public static function convert()
    {
        $model = new \models\contactdetails();
        $model->id = self::$data['Id'];
        $model->dateCreated = self::$data['DateCreated'];
        $model->dateModified = self::$data['DateModified'];
        $model->name = self::$data['name'];
        $model->value = self::$data['value'];
        return $model;
    }
}