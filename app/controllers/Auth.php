<?php

class Auth extends Controller{

    function index(){
        $data = [
            'title' => 'Login',
        ];
        $this->view('auth/login', $data);

    }

    function RegisterPage(){
        $data = [
            'title' => 'Register',
        ];
        $this->view('auth/register', $data);
    }

    function Register(){

        if ($this->model('Admin_model')->addAdmin($_POST) > 0) {
            Flasher::setFlash('Successfully Added','success','');
            header('location:' . BASEURL . '/Auth/RegisterPage');
            exit;
        }else {
            Flasher::setFlash('Failed To Add','error','');
            header('location:' . BASEURL . '/Auth/RegisterPage');
            exit;
        }
    }

    function Login(){

        $this->model('Admin_model')->LoginAdmin($_POST) ;
        
    }

    function LogOut(){
        unset($_SESSION['user']);
        Flasher::setFlash('Successfully Log Out','success','');
        header('location:' . BASEURL . '/Auth');
    }



}