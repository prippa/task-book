<?php

namespace app\controllers;

use app\components\Lib;
use app\models\Task;
use app\core\Controller;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    private const TASK_MAX = 3;

    /**
     * @param string $url
     * @param int $active_page
     * @return array
     */
    private function getPagination(string $url = '/', int $active_page = 1): array
    {
        $tasks_count = Task::count();

        return [
            'tasks_count' => $tasks_count,
            'pages' => ceil($tasks_count / 3),
            'url' => $url,
            'active_page' => $active_page,
        ];
    }

    /**
     * @return void
     */
    public function actionIndex(): void
    {
        $tasks = Task::get();
        $pagination = $this->getPagination();

        $this->view->run('index', ['tasks' => $tasks, 'pagination' => $pagination], 'Task Book');
    }

    private function getStartFromByPage(int $page): int
    {
        return ($page * self::TASK_MAX) - self::TASK_MAX;
    }

    /**
     * @param int $page
     * @return void
     */
    public function actionPagination(int $page): void
    {
        $start_from = $this->getStartFromByPage($page);
        $tasks = Task::get($start_from, self::TASK_MAX);
        $pagination = $this->getPagination('/', $page);

        $this->view->run('index', ['tasks' => $tasks, 'pagination' => $pagination], 'Task Book');
    }

    /**
     * @param string $sort_field
     * @param string $sort_type
     * @return bool
     */
    private function sortValidation(string $sort_field, string $sort_type): bool
    {
        return (($sort_field == 'name' || $sort_field == 'email' || $sort_field == 'status')
                && ($sort_type == 'up' || $sort_type == 'down'));
    }

    /**
     * @param string $sort_field
     * @param string $sort_type
     * @return void
     */
    public function actionSort(string $sort_field, string $sort_type): void
    {
        if (!$this->sortValidation($sort_field, $sort_type)) {
            $this->view->run('error_pages/404');
        }

        $sort = ($sort_type == 'up' ? false : true);
        $tasks = Task::get(0, self::TASK_MAX, $sort_field, $sort);
        $pagination = $this->getPagination("/sort/$sort_field/$sort_type/");

        $this->view->run('index', ['tasks' => $tasks, 'pagination' => $pagination], 'Task Book');
    }

    /**
     * @param string $sort_field
     * @param string $sort_type
     * @param int $page
     * @return void
     */
    public function actionSortPlusPagination(string $sort_field, string $sort_type, int $page): void
    {
        if (!$this->sortValidation($sort_field, $sort_type)) {
            $this->view->run('error_pages/404');
        }

        $start_from = $this->getStartFromByPage($page);
        $sort = ($sort_type == 'up' ? false : true);
        $tasks = Task::get($start_from, self::TASK_MAX, $sort_field, $sort);
        $pagination = $this->getPagination("/sort/$sort_field/$sort_type/", $page);

        $this->view->run('index', ['tasks' => $tasks, 'pagination' => $pagination], 'Task Book');
    }
}
