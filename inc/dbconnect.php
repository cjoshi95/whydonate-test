<?php
define('DB_HOST', 'localhost');

define('DB_USER', 'root');

define('DB_PASSWORD', '');

define('DB_NAME', 'whydonate');


class DbConnect
{
    private $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,0,'/media/md11/jatin/private/mysql/socket');

        if (mysqli_connect_errno()) {
            echo "Unable to connect to MySQL Database: " . mysqli_connect_error();
        }
    }

    public function getDb()
    {
        return $this->connect;
    }
}
