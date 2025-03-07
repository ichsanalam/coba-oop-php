<?php

require "db.php";

class Pegawai
{
    private $conn;

    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;
    }

    public function get_data() {
        $sql = "SELECT * FROM m_pegawai";
        return $this->conn->query($sql);
    }

    public function get_data_byId($id) {
        $sql = "SELECT * FROM m_pegawai WHERE PEGAWAI_ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function create($nama, $nik, $alamat)
    {
        $sql = "INSERT INTO m_pegawai (NAMA_PEGAWAI, NIK, ALAMAT) values (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sis', $nama, $nik, $alamat);
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    public function update($nama, $nik, $alamat, $id) {
        $sql = "UPDATE m_pegawai SET NAMA_PEGAWAI=?, NIK=?, ALAMAT=? WHERE PEGAWAI_ID=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sisi', $nama, $nik, $alamat, $id);
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM m_pegawai WHERE PEGAWAI_ID=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
