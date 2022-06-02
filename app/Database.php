<?php

namespace lightstone\app;

class Database
{
    protected static $conn;

    public static function init_conn($host, $user, $pass, $dbname)
    {
        static::$conn = new \mysqli($host, $user, $pass, $dbname);
    }

    public function query($sql)
    {
        return static::$conn->query($sql);
    }
}