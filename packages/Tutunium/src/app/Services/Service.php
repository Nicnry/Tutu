<?php

namespace Tutunium\App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tutunium\App\Exceptions\ClassNotFoundException;

abstract class Service
{
    /**
     * @param string $className
     * @return Model|null
     */
    public function instantiateModel(string $className): ?Model
    {
        try {
            if (class_exists($className)) {
                return new $className();
            } else {
                throw new ClassNotFoundException("Class $className not found.");
            }
        } catch (ClassNotFoundException $e) {
            return null;
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function requestValidation(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    }

    /**
     * @param Model &$model
     * @param array $modelData
     * @return void
     */
    public function fillModel(Model &$model, array $modelData): void
    {
        $model->fill($modelData);
    }

    /**
     * @param Model &$model
     * @return void
     */
    public function saveModel(Model $model): void
    {
        $model->save();
    }

    /**
     * @param Model &$model
     * @return void
     */
    public function deleteModel(Model $model): void
    {
        $model->delete();
    }
}