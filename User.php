<?php  
include 'db.php';  

class User {  
    private $conn;  

    public function __construct($db) {  
        $this->conn = $db;  
    }  

    public function create($name, $email, $phone) {  
        $sql = "INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)";  
        $stmt = $this->conn->prepare($sql);  
        $stmt->bindParam(':name', $name);  
        $stmt->bindParam(':email', $email);  
        $stmt->bindParam(':phone', $phone);  
        return $stmt->execute();  
    }  

    public function read($id) {  
        $sql = "SELECT * FROM users WHERE id = :id";  
        $stmt = $this->conn->prepare($sql);  
        $stmt->bindParam(':id', $id);  
        $stmt->execute();  
        return $stmt->fetch(PDO::FETCH_ASSOC);  
    }

    public function update($id, $name, $email, $phone) {  
        $sql = "UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id";  
        $stmt = $this->conn->prepare($sql);  
        $stmt->bindParam(':id', $id);  
        $stmt->bindParam(':name', $name);  
        $stmt->bindParam(':email', $email);  
        $stmt->bindParam(':phone', $phone);  
        return $stmt->execute();  
    }  

    public function delete($id) {  
        $sql = "DELETE FROM users WHERE id = :id";  
        $stmt = $this->conn->prepare($sql);  
        $stmt->bindParam(':id', $id);  
        return $stmt->execute();  
    }  
}  
?>