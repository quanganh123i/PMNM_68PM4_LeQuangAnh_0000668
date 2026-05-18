<?php

class Controller
{
    public function model(string $model)
    {
        require_once dirname(__DIR__) . '/models/' . $model . '.php';
        return new $model;
    }

    public function view(string $view, array $data = []): void
    {
        extract($data);
        require_once dirname(__DIR__) . '/views/' . $view . '.php';
    }
}
