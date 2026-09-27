<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $model = new TaskModel();
        $tasks = $model->allTasks();

        $data = [
            'title' => 'Task List',
            'tasks' => $tasks,
        ];

        return view('tasks/index', $data);
    }
}
