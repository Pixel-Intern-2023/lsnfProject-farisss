<?php

class Controller{
    public function view($view, $data = []){
        require_once '../app/view/' . $view . '.php';
    }
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
    public function checkLogin() {
        if (!isset($_SESSION['user'])) {
            Flasher::setFlash('Login To Enter','error','');
            header('location: ' . BASEURL . '/Auth');
            exit();
        }
    }
}