<?php

class CV extends Controller{
    public function index($name = ''){
       
        $this->view('cv/index', []);

    }
}