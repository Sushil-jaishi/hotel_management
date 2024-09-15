<?php

require_once "connection.php";

$sql="insert into admin (email, password) values ('admin@gmail.com', 'admin')";
if($conn->query($sql)==true){
    echo "admin created successfully";
}else{
    echo "failed to create database".$conn->error;
}

?>