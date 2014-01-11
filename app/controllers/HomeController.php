<?php

class HomeController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        return View::make('site/home/index');
    }
}
