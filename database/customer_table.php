<?php

require_once "connection.php";
$sql = "CREATE TABLE customer (
    id int(6) primary key auto_increment,
    username varchar(30) not null,
    email varchar(50) not null unique,
    contact varchar(15) not null,
    address varchar(40) not null,
    dob varchar(30) ,
    password varchar(50) not null) ";

if($conn->query($sql)){
    echo "table created successfully";
}else{
    echo "table is not created ".$conn->error;
}

?>