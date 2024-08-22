<?php 
include '../database/dbconnect.php';

    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id ";
        $result = $conn->query($sql);
    
        if ($result) {
            $user_data = $result->fetch_assoc();
            $role = $user_data['isAdmin'];
        }
    }

 ?>