<?php

require_once __DIR__ . '/ViewHelper.php';

class Controller
{
    public function model(string $model)
    {
        require_once dirname(__DIR__) . '/models/' . $model . '.php';
        return new $model;
    }

    public function view(string $view, array $data = [], ?string $layout = null): void
    {
        extract($data);

        if ($layout === null) {
            require_once dirname(__DIR__) . '/views/' . $view . '.php';
            return;
        }

        ob_start();
        require_once dirname(__DIR__) . '/views/' . $view . '.php';
        $content = ob_get_clean();

        require_once dirname(__DIR__) . '/views/layouts/' . $layout . '.php';
    }
}
