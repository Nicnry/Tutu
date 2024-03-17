<?php

namespace Tutunium\App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tutunium\App\Exceptions\ClassNotFoundException;

abstract class Service
{
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

    public function requestValidation(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    public function fillModel(Model &$model, array $modelData): void
    {
        $model->fill($modelData);
    }

    public function saveModel(Model $model): void
    {
        $model->save();
    }
}