<?php

namespace Tutunium\App\Repositories;

abstract class Repository
{
    
    protected $model = null;

    protected $packageName = 'tutunium';

    protected $index = 'index';

    protected $create = 'create';

    protected $store = 'store';
    
    protected $show = 'show';
    
    protected $edit = 'edit';
    
    protected $update = 'update';

    protected $destroy = 'destroy';

    protected $routeName = null;

    protected $modelFields = [];

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string $method
     * @return string
     */
    private function getRoute(string $method): string
    {
        if($this->routeName) {
            return "{$this->routeName}.{$method}";
        }
        return $method;
    }

    /**
     * @return string
     */
    public function getRouteIndex(): string
    {
        return $this->getRoute($this->index);
    }

    /**
     * @return string
     */
    public function getRouteShow(): string
    {
        return $this->getRoute($this->show);
    }

    /**
     * @return string
     */
    public function getRouteCreate(): string
    {
        return $this->getRoute($this->create);
    }

    /**
     * @return string
     */
    public function getRouteStore(): string
    {
        return $this->getRoute($this->store);
    }

    /**
     * @return string
     */
    public function getRouteEdit(): string
    {
        return $this->getRoute($this->edit);
    }

    /**
     * @return string
     */
    public function getRouteUpdate(): string
    {
        return $this->getRoute($this->update);
    }

    /**
     * @return string
     */
    public function getRouteDestroy(): string
    {
        return $this->getRoute($this->destroy);
    }

    /**
     * @param string $method
     * @return string
     */
    private function getView(string $method): string
    {
        if($this->packageName) {
            return "{$this->packageName}::{$method}";
        }
        return $method;
    }

    /**
     * @return string
     */
    public function getViewIndex(): string
    {
        return $this->getView($this->index);
    }

    /**
     * @return string
     */
    public function getViewCreate(): string
    {
        return $this->getView($this->create);
    }

    /**
     * @return string
     */
    public function getViewStore(): string
    {
        return $this->getView($this->store);
    }

    /**
     * @return string
     */
    public function getViewShow(): string
    {
        return $this->getView($this->show);
    }

    /**
     * @return string
     */
    public function getViewEdit(): string
    {
        return $this->getView($this->edit);
    }

    /**
     * @return string
     */
    public function getViewUpdate(): string
    {
        return $this->getView($this->update);
    }

    /**
     * @return string
     */
    public function getViewDestroy(): string
    {
        return $this->getView($this->destroy);
    }

    /**
     * @return array
     */
    public function getModelFields(): array
    {
        $fields = [];
        if($this->model) {
            $model = new $this->model();
            foreach($model->getFillable() as $fillable) {
                $fields[ucfirst($fillable)] = $fillable;
            }
        }
        return $fields;
    }

}