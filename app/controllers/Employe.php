<?php

class Employe extends Controller
{

    public function index()
    {
        $data['judul'] = 'Employe';
        $data['employe'] = $this->model('Employe_model')->getAllEmploye();
        $data['occupation'] = $this->model('Employe_model')->showAllOccupation();
        $this->checkLogin();
        $this->view('templates/header', $data);
        $this->view('employe/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Employe Detail';
        $data['employe'] = $this->model('Employe_model')->getEmployeById($id);
        $data['occupation'] = $this->model('Employe_model')->showAllOccupation();
        $this->checkLogin();
        $this->view('templates/header', $data);
        $this->view('employe/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Employe_model')->addDataEmploye($_POST, $_FILES) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location:' .BASEURL. '/employe');
            exit;

        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location:' .BASEURL. '/employe');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Employe_model')->deleteDataEmploye($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location:' .BASEURL. '/employe');
            exit;

        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location:' .BASEURL. '/employe');
            exit;
        }
    }

    public function getupdate(){
        echo json_encode($this->model('Employe_model')->getEmployeById($_POST['id']));
    }

    public function update(){

        if ($this->model('Employe_model')->updateDataEmploye($_POST, $_FILES) > 0) {
            Flasher::setFlash('successfuly', 'success', 'success');
            header('location:' .BASEURL. '/employe');
            exit;

        }else{
            Flasher::setFlash('gagal', 'diedit', 'danger');
            header('location:' .BASEURL. '/employe');
            exit;
        }
    }

    public function fired($id){
        if($this->model('Employe_model')->firedEmploye($id) > 0) {
            Flasher::setFlash('successfully', 'fired', 'success');
            header('location:' .BASEURL. '/employe');
            exit;

        }else{
            Flasher::setFlash('failed', 'fired', 'danger');
            header('location:' .BASEURL. '/employe');
            exit;
        }
    }

    public function search(){

        $data['judul'] = 'Puttol Member';
        $data['employe'] = $this->model('Employe_model')->searchEmploye();
        $this->checkLogin();
        $this->view('templates/header', $data);
        $this->view('employe/index', $data);
        $this->view('templates/footer');

    }
}
