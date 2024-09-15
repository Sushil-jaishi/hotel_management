<?php

require_once "database/connection.php";
session_start();
if(isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

$sql = "select * from admin";
$result = $conn->query($sql);
$admin = $result->fetch_assoc();
if($email==$admin['email']&&$password==$admin['password']){
    $_SESSION['email']=$admin['email'];
    header("location:admin/admin.php");
    exit();
}else{
    header("location:login.php?message=wrong password");
    exit();
}

}
?>