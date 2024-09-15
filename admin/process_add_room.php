
<?php
require_once "../database/connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $description = $_POST['description'];  
    
    
    if(is_uploaded_file($_FILES['image']['tmp_name'])){ 
        $image = date('dmYHis').str_replace(" ","",basename($_FILES['image']['name']));
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/uploads/$image");
    }else{
        $image = "";
    }

    $sql = " insert into rooms(room_number ,room_type , price ,description,image )VALUES('$room_number' , '$room_type' , '$price' , '$description','$image')";

    if($conn->query($sql)==true)
    {
        $status="room added success";
        header("location:admin.php?status=$status");
        exit();
    }
    else{
        echo "query error:" . $conn->error;
    }

}

?>