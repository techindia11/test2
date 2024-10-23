<?php

include('config/config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $delete = "delete from user where id = $id";
    if(mysqli_query($conn,$delete)){
        if(mysqli_affected_rows($conn)>0){
            header('location: read.php');
        }
        else{
            header('location: read.php');
        }
    }

}
?>