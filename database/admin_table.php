<?php

require_once "connection.php";
$sql = "CREATE TABLE admin (
    id int(6) primary key auto_increment,
    email varchar(50) not null unique,
    password varchar(35) not null) ";

if($conn->query($sql)){
    echo "table created successfully";
}else{
    echo "table is not created ".$conn->error;
}

?>