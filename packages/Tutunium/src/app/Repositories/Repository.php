<?php

namespace Tutunium\App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $model = null;

    protected $packageName = 'tutunium';

    protected $indexView = 'index';

    protected $createView = 'create';

    protected $routeName = null;

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function getViewCreate(): string
    {
        if($this->routeName) {
            return "{$this->routeName}.{$this->createView}";
        }
        return $this->createView;
    }
    public function getViewIndex(): string
    {
        if($this->routeName) {
            return "{$this->routeName}.{$this->indexView}";
        }
        return $this->indexView;
    }

}