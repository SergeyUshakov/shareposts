<?php

/**
 * Class User
 */
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register(array $data): bool
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login(string $email, string $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Get hashed password from row
        $hashed_password = $row->password;

        // Check if password is verified
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByEmail(string $email): bool
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById(int $id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        return $row = $this->db->single();
    }
}