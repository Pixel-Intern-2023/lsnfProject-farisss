<?php

class Admin_model
{
    private $table = 'admin';
    private $db;

    function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAdmin(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    function AdminCount()
    {
        $this->db->query('SELECT COUNT(*) as adminn FROM ' . $this->table);
        return $this->db->single();
    }
    function addAdmin($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $data['username']);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            Flasher::setFlash('Email Has Been Registered', 'error','');
            header('location:' . BASEURL . '/Auth/RegisterPage');
            exit;
        } else {

            $query = "INSERT INTO " . $this->table . " VALUES (null, :name, :username, :email, :password, null)";

            $hash = password_hash($data['password'], PASSWORD_DEFAULT);

            $this->db->query($query);
            $this->db->bind('name', $data['name']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', $hash);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }


    function LoginAdmin($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $data['username']);
        $this->db->execute();
    
        if ($this->db->rowCount() > 0) {

            $dbPassword = $this->db->single();

            if (password_verify($data['password'], $dbPassword['password'])) {

                $_SESSION['user'] = 'User';
                header('location:' . BASEURL . '/dasboard');

            } else {

                Flasher::setFlash('Invalid Password', 'error','');
                header('location:' . BASEURL . '/Auth');

            }

        } else {
            Flasher::setFlash('Email Not Found', 'error','');
            header('location:' . BASEURL . '/Auth');
        }
        
    }



    

}