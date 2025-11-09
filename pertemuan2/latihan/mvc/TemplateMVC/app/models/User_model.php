<?php

class User_model
{
    private $table = 'users';
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Mengambil semua data pengguna dari database 
     * */ 
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM' . $this->table);
        return $this->db->single();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM' . $this->table .'WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


}

class User extends Controller  {
    public function index()
    {
        $data["judul"] = "Data user";
        $data["users"] = $this->model('User_model')->getAllUsers();
        $this->view('list', $data);
    }

    public function detail()
    {
        $data["judul"] = "Detail user";
        $data["user"] = $this->model('User_model')->getUserById();
        $this->view('detail', $data);
    }
}
