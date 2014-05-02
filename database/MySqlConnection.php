<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 19:03
 * http://www.phptherightway.com/pages/Design-Patterns.html
 */
class MySqlConnection {
    private static $instance;
    private static $connection;

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

    public static function getInstance(){
        if(!self::$instance)
        {
            self::$instance = new self();
        }
        self::setupMySqlConnection();
        return self::$instance;
    }
    public static function getConnection(){
        return self::$connection;
    }
    private static function setupMySqlConnection()
    {
//        static $host="95.85.26.105";
        static $host = "localhost";
        static $username="root";
        static $password="root";
        self::$connection = mysql_connect("$host", "$username", "$password");
        if (mysql_errno()) {
            $error = "MySQL error ".mysql_errno().": ".mysql_error();
            echo $error;
        }
    }

}

?>