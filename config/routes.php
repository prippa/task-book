<?php

return [
    '' => 'Site/Index',
    'create_new_task' => 'Task/CreateNewTask',
    'login' => 'User/Login',
    'logout' => 'User/Logout',
    'ajax/task/change_status' => 'Task/ChangeStatus',
    'ajax/task/change_text' => 'Task/ChangeText',
    'page/([0-9]+)' => 'Site/Pagination/$1',
    'sort/(.*)/(.*)/page/([0-9]+)' => 'Site/SortPlusPagination/$1/$2/$3',
    'sort/(.*)/(.*)' => 'Site/Sort/$1/$2',
];
