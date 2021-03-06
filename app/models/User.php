<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // register user
    public function register($data)
    {
        $this->db->query('INSERT INTO users (name, email, password) 
                                    VALUES (:name, :email, :password)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // login user
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $user = $this->db->single();

        $hashed_password = $user->password;
        if (password_verify($password, $hashed_password)) {
            return $user;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $user = $this->db->single();

        //check user
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
