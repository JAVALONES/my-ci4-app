<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'status', 'task_date', 'is_archived', 'created_at'];

    public function today()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->where('is_archived', 0)
                    ->orderBy('created_at')
                    ->findAll();
    }

    public function allTasks()
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date')
                    ->orderBy('created_at')
                    ->findAll();
    }
}
