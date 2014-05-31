<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 19:17
 */

require('MySqlConnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/tedx_server/response/error.php');
class MySqlResponse {
    private static $con;
    private static $instance;
    protected function __construct()
    {
        $mySqlConnection = MySqlConnection::getInstance();
        self::$con = $mySqlConnection::getConnection();
        self::setDatabaseName();
    }

    public static function getInstance(){
        if(!self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected static function setDatabaseName()
    {
        $SettingsData = parse_ini_file("settings.ini");
        mysql_select_db($SettingsData["dbname"]);
        if (mysql_errno()) {
            $developerError = "MySQL error ".mysql_errno().": ".mysql_error().$SettingsData["dbname"];
            JsonErrorResult($developerError);
        }
    }
        public static function mySqlQuery($query)
    {
        $response = mysql_query($query);
        if (mysql_errno()) {
            $developerError = "MySQL error ".mysql_errno().": ".mysql_error();
            JsonErrorResult($developerError);
        }
        echo $response;
        return $response;

    }
    public static function closeMySqlConnection()
    {
        mysql_close();
    }

} 