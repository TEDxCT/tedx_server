<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 19:17
 */

require('MySqlConnection.php');
class MySqlResponse {
    private static $con;
    private static $db_name = "tedxserver";
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
        mysql_select_db(self::$db_name)or die("cannot select DB");;
    }

    public static function mySqlQuery($query)
    {
        $response = mysql_query($query);
        self::$con.mysql_close();
        return $response;

    }
} 