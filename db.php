<?php  
$host = 'localhost'; 
$db = 'tubes_pbo1'; // Ganti dengan nama database Anda  
$user = 'root'; // Ganti dengan username Anda  
$pass = ''; // Ganti dengan password Anda  

try {  
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch (PDOException $e) {  
    echo "Connection failed: " . $e->getMessage();  
}  
?>