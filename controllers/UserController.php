<?php


namespace app\controllers;

use app\components\Lib;
use app\core\Controller;
use app\models\User;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends Controller
{
    /**
     * @return void
     */
    public function actionLogin(): void
    {
        $login = '';

        if (!empty($_POST)) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = User::getByLogin($login);
            if (!$user) {
                $this->view->errors = ["<b>$login</b> is not registered"];
            } else if (!password_verify($password, $user['password'])) {
                $this->view->errors = ['username or password is not correct'];
            } else {
                User::login($user['id'], $user['permission']);
                Lib::redirect();
            }
        }

        $this->view->run('login', ['login' => $login]);
    }

    /**
     * @return void
     */
    public function actionLogout(): void
    {
        User::logout();
        Lib::redirect();
    }
}
