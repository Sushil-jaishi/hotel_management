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

    $sql="select * from customer where email='$email'";
    $result=$conn->query($sql);
    $customer = $result ->fetch_assoc();
if($email==$customer['email']&&$password==$customer['password']){
    $_SESSION['email']=$customer['email'];
    $_SESSION['username']=$customer['username'];
    $_SESSION['id']=$customer['id'];
    header("location:index.php");
    exit();
}else{
    header("location:login.php?message=wrong password");
    exit();
}
}


}
?>