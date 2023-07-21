<?php

class Employe_model
{
    private $table = 'employee';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllEmploye()
    {
        $this->db->query('SELECT employee.id, employee.namee, occupation.name as occupation, employee.detail, employee.salary, employee.created_at, employee.updated_at, employee.image_profile, employee.employee_status FROM employee left JOIN occupation ON employee.occupation_nama = occupation.id_occupation order by employee.id asc');
        return $this->db->resultSet();
    }

    public function getEmployeById($id)
    {
        // $this->db->query('SELECT *FROM ' . $this->table . ' WHERE id=:id');
        $this->db->query('SELECT employee.id, employee.namee, occupation.name, employee.detail, employee.salary, employee.image_profile, employee.employee_status FROM employee JOIN occupation ON employee.occupation_nama = occupation.id_occupation WHERE employee.id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function showAllOccupation()
    {
        $this->db->query("SELECT * FROM occupation");
        return $this->db->resultSet();
    }



    //count
    public function EmployeCount()
    {
        $this->db->query('SELECT COUNT(*) as employe FROM ' . $this->table);
        
        return $this->db->single();
    }


    public function WorkingCount()
    {
        $this->db->query('SELECT COUNT(*) as working FROM ' . $this->table . " WHERE employee_status = 'WORKING'");

        return $this->db->single();
    }


    public function FiredCount()
    {
        $this->db->query('SELECT COUNT(*) as fired FROM ' . $this->table . " WHERE employee_status = 'FIRED'");

        return $this->db->single();
    }
    //end count



    public function addDataEmploye($data, $dataImg)
    {

        $filename = $dataImg['image_profile']['name'];
        $tempPath = $dataImg['image_profile']['tmp_name'];

        if (move_uploaded_file($tempPath, __DIR__ . './../../public/img/' . $filename)) {

            $query = "INSERT INTO employee VALUES ( null, :namee, :occupation_nama, :detail, :salary, null, null, :image_profile, :employee_status)";

            $this->db->query($query);

            $this->db->bind('namee', $data['namee']);
            $this->db->bind('occupation_nama', $data['occupation_nama']);
            $this->db->bind('detail', $data['detail']);
            $this->db->bind('salary', $data['salary']);
            $this->db->bind('image_profile',$filename);
            $this->db->bind('employee_status', $data['employee_status']);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function deleteDataEmploye($id)
    {
        $query = "DELETE FROM employee WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataEmploye($data, $dataImg)
    {

        $old_gambar = $this->getEmployeById($data['id']);
        $filename = $dataImg['image_profile']['name'];
        $tempPath = $dataImg['image_profile']['tmp_name'];

        if ($dataImg['image_profile']['name'] == "") {
            $dataImg =  $old_gambar['image_profile'];
        }else {
            $dataImg = $filename;
            unlink( __DIR__ . './../../public/img/'.$old_gambar['image_profile']);
            move_uploaded_file($tempPath, __DIR__ . './../../public/img/'.$filename);
        }

        $query = "UPDATE " . $this->table ." SET 
        namee = :namee,
        occupation_nama = :occupation_nama,
        detail = :detail,
        salary = :salary,
        updated_at = :updated_at,
        image_profile = :image_profile
        WHERE id=:id";

        date_default_timezone_set("asia/Jakarta");
        $update_time = date('y-m-d h:i:s');
    
        $this->db->query($query);
        $this->db->bind('namee', $data['namee']);
        $this->db->bind('occupation_nama', $data['occupation_nama']);
        $this->db->bind('detail', $data['detail']);
        $this->db->bind('salary', $data['salary']);
        $this->db->bind('updated_at', $update_time);
        $this->db->bind('image_profile', $dataImg);
        $this->db->bind('id', $data['id']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function firedEmploye($id){
        $this->db->query('UPDATE employee SET employee_status = :employee_status WHERE id = :id');
        $this->db->bind('employee_status', 'FIRED');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchEmploye()
    {
        $search = $_POST['search'];
        $query = "SELECT employee.id, employee.namee, occupation.name as occupation, employee.detail, employee.salary, employee.created_at, employee.updated_at, employee.image_profile, employee.employee_status FROM employee left JOIN occupation ON employee.occupation_nama = occupation.id WHERE namee LIKE :search order by employee.id asc";
        $this->db->query($query);
        $this->db->bind('search', "%$search%");
        return $this->db->resultSet();
    }
}



