<?php

function partial(string $partial, array $data = []): void
{
    extract($data);
    require dirname(__DIR__) . '/views/partials/' . $partial . '.php';
}
