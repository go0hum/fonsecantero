<?php
require_once './Config/Connection.php';

class UserModel
{
    public static function login($email, $password)
    {
        $pdo = Connection::DB();
        $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public static function register($name, $email, $password)
    {
        try {
            $pdo = Connection::DB();
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->execute();
            $lastInsertId = $pdo->lastInsertId();
            if (!$lastInsertId) {
                throw new Exception("No se pudo obtener el ID del último registro insertado.");
            }
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(":id", $lastInsertId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
    
        } catch (Exception $e) {
            return false;
        }
    }

    public static function existEmail($email)
    {
        $pdo = Connection::DB();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
}