<?php

class Connection
{
    public static function DB()
    {
        return new PDO("mysql:host=mysql;dbname=todo", "usr_todo", "123");
    }
}