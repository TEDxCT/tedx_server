<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/event.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/sessions.php');
class event {
    private static $instance;
    private static $model;
    private static $data;

    public function __construct($data)
    {
        self::$data = $data;
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
        // Slightly inefficient way to re-query the DB for each sub set
        $sql = "Select * from session where EventId = ".self::$data['Id'];
        $response = MySqlResponse::getInstance();
        $result = $response::mySqlQuery($sql);
        if(mysql_num_rows($result)){
            $model->sessions = array();
            while($row=mysql_fetch_array($result)){
                $object = new sessions($row);
                $sessionsData = $object::convert();
                $model->sessions[]=($sessionsData);
            }
        }
        else
        {
            $model->sessions = null;
        }
        return $model;
    }
}