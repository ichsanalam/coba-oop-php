<?php

class Database {
    public $conn;

    public function __construct()
    {
        $host = "localhost";     // Host database
        $username = "root";      // Username database
        $password = "";          // Password database
        $dbname = "db_master_pegawai";     // Nama database

        // Membuat koneksi menggunakan MySQLi
        $this->conn = new mysqli($host, $username, $password, $dbname);

        // Cek koneksi
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
}
?>
