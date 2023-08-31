<?php

class AdminService
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function get()
    {
        $model = $this->model->get();
        return $model;
    }
}
