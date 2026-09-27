<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    public function today()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->orderBy('created_at')
                    ->findAll();
    }

    public function allTasks()
    {
        return $this->orderBy('task_date')
                    ->orderBy('created_at')
                    ->findAll();
    }
}
