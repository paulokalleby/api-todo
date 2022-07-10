<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Repositories\TaskRepository;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        return $this->repository->getAllTasks();
    }

    public function store(TaskRequest $request)
    {
        return $this->repository->createTask(
            (array) $request->validated()
        );
    }

    public function show($id)
    {
        return $this->repository->getTaskById($id);
    }

    public function update(TaskRequest $request, $id)
    {
        return $this->repository->updateTask(
            (array) $request->validated(), $id
        );
    }

    public function destroy($id)
    {
        return $this->repository->deleteTask($id);
    }
}
