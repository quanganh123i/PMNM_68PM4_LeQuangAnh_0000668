<?php

class home extends Controller
{
    public function index()
    {
        $this->view('home/index', ['title' => 'Trang chủ']);
    }
}
