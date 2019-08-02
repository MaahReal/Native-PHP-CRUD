<?php

$dbServerName ="localhost";
$dbUserName="root";
$dbpass="";
$dbName="crud";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbpass,$dbName);

if(isset($_POST['add'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address= $_POST['address'];

    $conn->query("INSERT INTO info (name,age,address) VALUES ('$name','$age','$address')") or die($conn->error);
}