<?php

namespace app\controllers;

use app\components\Lib;
use app\core\Controller;
use app\models\Task;
use app\models\User;

/**
 * Class TaskController
 * @package app\controllers
 */
class TaskController extends Controller
{
    /**
     * @return void
     */
    public function actionCreateNewTask(): void
    {
        $name = $email = $text = '';

        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = trim($_POST['text']);

            if (mb_strlen($name) > Task::NAME_MAX) {
                $this->view->errors[] = 'Name can be max ' . Task::NAME_MAX . ' symbols';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->view->errors[] = 'Invalid email';
            }

            if (empty($this->view->errors)) {
                Task::add($name, $email, $text);
                $this->view->success[] = 'Task created successfully!';
                $name = $email = $text = '';
            }
        }

        $this->view->run('create_new_task', ['name' => $name, 'email' => $email, 'text' => $text]);
    }

    /**
     * @return void
     */
    public function actionChangeStatus(): void
    {
        if (empty($_POST) || !User::isAdmin()) {
            exit('login');
        }

        $id = $_POST['id'];
        $status = $_POST['status'];

        Task::changeStatus($id, $status);

        exit('OK');
    }

    /**
     * @return void
     */
    public function actionChangeText(): void
    {
        if (empty($_POST) || !User::isAdmin()) {
            exit('login');
        }

        $id = $_POST['id'];
        $text = $_POST['text'];

        Task::changeText($id, $text);
        Task::setEditedByAdmin($id);

        exit('OK');
    }
}
