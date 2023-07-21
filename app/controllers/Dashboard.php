<?php

class Dashboard extends Controller{

    public function index()
    {
        $data['judul'] = 'Admin';
        $data['employe'] = $this->model('Employe_model')->EmployeCount();
        $data['working'] = $this->model('Employe_model')->WorkingCount();
        $data['fired'] = $this->model('Employe_model')->FiredCount();
        $data['admin'] = $this->model('Admin_model')->AdminCount();
        $this->checkLogin();
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}