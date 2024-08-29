<?php
require_once './Config/Connection.php';

class TaskModel
{
    public static function all($user=[])
    {
        $pdo = Connection::DB()->prepare("select tasks.id,title,task,`create`, s.name
        from tasks
        inner join `status` AS s ON s.id = tasks.statusid
        where userid=:userid
        order by tasks.statusid asc, tasks.create desc");
        $pdo->bindParam(":userid", $user['id'], PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
    }

    public static function add($id, $title, $task)
    {
        $pdo = Connection::DB()->prepare("INSERT INTO tasks (title, task, `statusid`, `create`, `userid`) values(:title, :task, 1, now(), :id)");
        $pdo->bindParam(":title", $title, PDO::PARAM_STR);
        $pdo->bindParam(":task", $task, PDO::PARAM_STR);
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        return $pdo->execute();
        $pdo->close();
    }

    public static function delete($id)
    {
        $pdo = Connection::DB()->prepare("DELETE FROM tasks where id=:id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        return $pdo->execute();
        $pdo->close();
    }

    public static function edit($iduser, $id, $title, $task, $status)
    {
        $pdo = Connection::DB()->prepare("UPDATE tasks SET title = :title, task=:task, `statusid`=:statusid, `userid`=:iduser where id=:id");
        $pdo->bindParam(":title", $title, PDO::PARAM_STR);
        $pdo->bindParam(":task", $task, PDO::PARAM_STR);
        $pdo->bindParam(":statusid", $status, PDO::PARAM_INT);
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->bindParam(":iduser", $iduser, PDO::PARAM_INT);
        return $pdo->execute();
        $pdo->close();
    }

    public static function get($id)
    {
        $pdo = Connection::DB()->prepare("select * from tasks where id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
    }
}