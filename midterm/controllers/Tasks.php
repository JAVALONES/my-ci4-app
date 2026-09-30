<?php
namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $validation;
    public function __construct() { $this->validation = \Config\Services::validation(); }

    public function index()
    {
        $model = new TaskModel();
        $tasks = $model->allTasks();
        $data = ['title' => 'Task List', 'tasks' => $tasks, 'mode' => 'tsa'];
        return view('tasks/index', $data);
    }

    public function new()
    {
        $this->_requireLogin();
        return view('tasks/form', ['title' => 'New Task', 'heading' => 'New Task', 'task' => null, 'errors' => null]);
    }

    public function create()
    {
        $this->_requireLogin();
        $rules = ['title' => 'required', 'task_date' => 'required|exact_length[10]'];
        $post = $this->request->getPost();
        $post['status'] = $post['status'] ?? 'pending';
        $post['is_archived'] = 0;
        if (! $this->validate($rules)) {
            return view('tasks/form', ['title' => 'New Task', 'heading' => 'New Task', 'task' => null, 'errors' => $this->validator, 'old' => $post]);
        }
        $model = new TaskModel();
        $model->save($post);
        return redirect('/tasks')->with('message', 'Task created');
    }

    public function edit($id = null)
    {
        $this->_requireLogin();
        $model = new TaskModel();
        $task = $model->find($id);
        if (! $task) return redirect()->to('/tasks');
        return view('tasks/form', ['title' => 'Edit Task', 'heading' => 'Edit Task', 'task' => $task, 'errors' => null, 'old' => []]);
    }

    public function update($id = null)
    {
        $this->_requireLogin();
        $rules = ['title' => 'required', 'task_date' => 'required'];
        $post = $this->request->getPost();
        if (! $this->validate($rules)) {
            $model = new TaskModel();
            $task = $model->find($id);
            return view('tasks/form', ['title' => 'Edit Task', 'heading' => 'Edit Task', 'task' => $task, 'errors' => $this->validator, 'old' => array_merge((array)$task, $post)]);
        }
        $model = new TaskModel();
        $existing = $model->find($id);
        $post['is_archived'] = $existing['is_archived'] ?? 0;
        $model->update($id, $post);
        return redirect('/tasks')->with('message', 'Task updated');
    }

    public function delete($id = null)
    {
        $this->_requireLogin();
        $model = new TaskModel();
        $model->update($id, ['is_archived' => 1]);
        return redirect('/tasks')->with('message', 'Task archived');
    }

    private function _requireLogin()
    {
        if (! session()->get('isLoggedIn')) {
            session()->setFlashdata('error', 'Please log in to manage tasks.');
            return redirect()->to('/login');
        }
    }
}
