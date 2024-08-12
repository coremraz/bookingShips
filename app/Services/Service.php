<?php
namespace App\Services;
use Illuminate\Database\Eloquent\Model;
abstract class Service
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function validate(array $data)
    {
        // общая валидация для всех сервисов
    }

    public function save(array $data)
    {
        // общий метод для сохранения данных
    }

    public function errorResponse($message, $code = 400)
    {
        return response()->json(['error' => $message], $code);
    }

    public function successResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }
}

