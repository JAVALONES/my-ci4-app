<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Pages extends BaseController
{
    public function index()
    {
        $model = new TaskModel();
        $tasks = $model->today();

        $data = [
            'title'   => 'Tasks for Today',
            'heading' => 'Tasks for Today',
            'tasks'   => $tasks,
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title'   => 'About Us',
            'heading' => 'About the Developer',
            'message' => 'This Tasks for Today Management System was developed by Joseph Victor A. Valones, a student of the College of Computer Studies and Multimedia Arts at ICT-AA. Built with CodeIgniter 4.',
        ];

        return view('pages/about', $data);
    }
}
