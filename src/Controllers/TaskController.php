<?php 

class TaskController
{
    public function all()
    {
        global $user;
        return TaskModel::all($user);
    }

    public function add()
    {
        global $user;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING);
            if (empty($title)) {
                return "El titulo es requerido";
                exit;
            }
            if (empty($task)) {
                return "La descripcion de la tarea es requerida";
                exit;
            }
            TaskModel::add($user['id'], $title, $task);
            return false;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = filter_input(INPUT_GET, 'value', FILTER_SANITIZE_NUMBER_INT);
            TaskModel::delete($id);
            return true;
        }
    }

    public function edit($id)
    {
        global $user;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING);
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);

            if (empty($title)) {
                return "El titulo es requerido";
                exit;
            }
            if (empty($task)) {
                return "La descripcion de la tarea es requerida";
                exit;
            }
            TaskModel::edit($user['id'], $id, $title, $task, $status);
            return false;
        }
    }

    public function get()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_GET, 'value', FILTER_SANITIZE_NUMBER_INT);
            return TaskModel::get($id);
        }
    }

    public function classStatus($name)
    {
        $status = StatusModel::getByName($name);
        return $status['class'];
    }
}