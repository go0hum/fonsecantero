<?php
require_once './Config/Connection.php';

class StatusModel
{
    public static function all()
    {
        $pdo = Connection::DB()->prepare("select id, name from `status`");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
    }

    public static function getByName($name)
    {
        $pdo = Connection::DB()->prepare("select * from `status` where name = :name");
        $pdo->bindParam(":name", $name, PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
    }
}