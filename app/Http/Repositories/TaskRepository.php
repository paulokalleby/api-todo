<?php

namespace App\Http\Repositories;

use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskRepository
{

    protected $entity;

    public function __construct(Task $model)
    {
        $this->entity = $model;
    }

    public function getAllTasks()
    {
        return TaskResource::collection($this->entity->all());
    }

    public function getTaskById(string $id)
    {
        return new TaskResource(
            $this->entity->findOrFail($id)
        );
    }

    public function createTask(array $tasks)
    {
        return new TaskResource(
            $this->entity->create($tasks)
        );
    }

    public function updateTask(array $tasks, string $id)
    {
        $task = $this->entity->findOrFail($id);

        $task->update($tasks);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function deleteTask(string $id)
    {
        $task = $this->entity->findOrFail($id);

        $task->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
