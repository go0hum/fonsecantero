<?php 

class UserController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 'Correo electrónico inválido o vacío';
                exit;
            }

            if (empty($password) || strlen($password) < 8) {
                return 'La contraseña es requerida y debe tener al menos 8 caracteres';
                exit;
            }
            $user = UserModel::login($email, $password);
            if($user) {
                session_start();
                $_SESSION['user'] = $user;
            } else {
                return 'El usuario no existe o el password es incorrecto';
            }
            return false;
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            if (empty($name)) {
                return 'El nombre es requerido';
                exit;
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 'Correo electrónico inválido o vacío';
                exit;
            }

            if (empty($password) || strlen($password) < 8) {
                return 'La contraseña es requerida y debe tener al menos 8 caracteres';
                exit;
            }

            if (UserModel::existEmail($email)) {
                return 'El correo electrónico ya está registrado';
                exit;
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $user = UserModel::register($name, $email, $hashedPassword);
            if($user) {
                session_start();
                $_SESSION['user'] = $user;
            } else {
                return 'Error al registrar el usuario';
            }
            return false;
        }
    }
}