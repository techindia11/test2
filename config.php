<?php
$conn = mysqli_connect("localhost","root","","test_3",3306);

if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}
?>