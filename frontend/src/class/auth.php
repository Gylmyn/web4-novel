<?php 
// File : class/Auth.php

class Auth
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function login($email, $password)
    {
        // $errors = [];
        // if (!preg_match('/^\d{10}$/', $nim)) {
        //     $errors['nim'] = '<b>NIM</b> harus 10 angka';
        // }
        // if (strlen($password) < 6) {
        //     $errors['password'] = '<b>password</b> minimal 6 karakter';
        // }

        // if (!empty($errors)) {
        //     return $errors;
        // }
        
        $query = "SELECT * FROM akun WHERE email = ? AND password = ?";
        $exec  = $this->db->prepare($query);

        $password = sha1($password);
        $exec->bind_param('ss', $email, $password);
        $exec->execute();
        
        $result = $exec->get_result();
        if ($result->num_rows == 1) {
            $akun = $result->fetch_assoc();

            session_start();
            $_SESSION['email']    = $akun['email'];
            $_SESSION['username']   = $akun['username'];
            $_SESSION['akun_login']  = true;

            return true;
        }
        else {
            $errors['login'] = '<b>Akun tidak ditemukan/valid</b>';
            return $errors;
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
       
        header('Location: /pem_web/view/template/login.php');
    }
}
?>