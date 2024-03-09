<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_pet";
    $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Không kết nối được đến file " . $conn->connect_error);
        }
        $id = $_REQUEST['id'];
        $query = "DELETE FROM users WHERE user_id=$id";
        $result = mysqli_query($conn, $query) or die(mysqli_error($mysql));
        ob_start();
        header("location: dangxuat.php");
        exit();
