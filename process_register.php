<?php

require_once "database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $sql = "insert into customer (username,email,contact,address,dob,password) values ('$username','$email','$contact','$address','$dob','$password')";
    $conn->query($sql);
    header("location:login.php?message=customer registered");
    exit();

}

?>