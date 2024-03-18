<?php

namespace Tutunium\App\Repositories\WebRepositories;

use Tutunium\App\Repositories\Repository;

class WebRepository extends Repository
{

    protected $create = 'create';
    
    protected $edit = 'edit';

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
    public function getRouteEdit(): string
    {
        return $this->getRoute($this->edit);
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
}
