<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO register (user_name, name, apellido, user_email, autor, password) VALUES(?, ?, ?,?,?,?)');

      
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':apellido', $data['apellido']);
        $this->db->bind(':autor', $data['autor']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

       
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

   
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        
        $this->db->bind(':email', $email);

    
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}