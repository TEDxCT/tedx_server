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
            self::setupMySqlConnection();
        }
        return self::$instance;
    }
    public static function getConnection(){
        return self::$connection;
    }
    private static function setupMySqlConnection()
    {
        $SettingsData = parse_ini_file("settings.ini");
        $host = $SettingsData['host'];
        $username = $SettingsData['username'];
        $password = $SettingsData['password'];
        self::$connection = mysql_connect("$host", "$username", "$password");
    }
}

?>