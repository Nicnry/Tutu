<?php

namespace Tutunium\App\Repositories;

abstract class Repository
{

    protected $model = null;

    protected $packageName = 'tutunium';

    protected $index = 'index';

    protected $store = 'store';
    
    protected $show = 'show';
    
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
    protected function getRoute(string $method): string
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
    public function getRouteStore(): string
    {
        return $this->getRoute($this->store);
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