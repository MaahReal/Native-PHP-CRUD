<?php

session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbpass = "";
$dbName = "crud";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbpass, $dbName) or die(mysqli_connect_error($conn));

$id = 0;
$update=false;
$name='';
$age='';
$address='';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $conn->query("INSERT INTO info (name,age,address) VALUES ('$name','$age','$address')") or die($conn->error);

    $_SESSION['message'] = "Record has been added!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM info WHERE ID='$id'") or die ($conn->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update=true;
    $result = $conn->query("SELECT * FROM info WHERE ID = '$id'") or die($conn->error());
    $data = array($result);


    if (count($data)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $age = $row['age'];
        $address = $row['address'];

    }
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name= $_POST['name'];
    $age= $_POST['age'];
    $address=$_POST['address'];

    $conn->query("UPDATE info SET name = '$name', age = '$age', address = '$address' WHERE ID = '$id'") or die
    ($conn->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: index.php");
}
