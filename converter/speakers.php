<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:27
 */
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/models/speakers.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/converter/contactdetails.php');

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
         // Slightly inefficient way to re-query the DB for each sub set
        $sql = "select u.* from url u inner join linkspeakerurl lsu on u.id = lsu.urlid where speakerid = ".self::$data['Id'];
        $response = MySqlResponse::getInstance();
        $result = $response::mySqlQuery($sql);
        if(mysql_num_rows($result)){
            $model->contactDetails = array();
            while($row=mysql_fetch_array($result)){
                $object = new contactDetails($row);
                $contactDetailsData = $object::convert();
                $model->contactDetails[]=($contactDetailsData);
            }
        }
        else
        {
            $model->contactDetails = null;
        }
        return $model;
    }
}