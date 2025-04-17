<?php
class Connect {
    private $conn;

    public function __construct() {
        $this->conn = $this->connectMySQL();
    }

    private function connectMySQL() {
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "cagio475_db"; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        return $conn;
    }

    public function firstResultExec($strCommandText) {
        $result = $this->conn->query($strCommandText);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return array_values($row)[0];
        } else {
            return null;
        }
    }

    public function getTable($strCommandText) {
        $result = $this->conn->query($strCommandText);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function exec($strCommandText) {
        if ($this->conn->query($strCommandText) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function execWithParams($strCommandText, $arrParameterName, $arrParameterValue) {
        $stmt = $this->conn->prepare($strCommandText);
        $types = str_repeat('s', count($arrParameterName)); 

        $stmt->bind_param($types, ...$arrParameterValue);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function closeConnection() {
        $this->conn->close();
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>