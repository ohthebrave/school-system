<?php

$host = "localhost";
$user = "root";
$password = '';
$db = "school";

$data = mysqli_connect($host,$user,$password,$db);
if ($data === false){
    die('connection error'. mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql="select * from user where email='".$email."' AND password='".$password."'";

    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row['usertype']== 'student'){
        header("location: welcome.php");
    } elseif ($row['usertype']== 'admin') {
        header("location: admin.php");
    } else {
        echo "email or password do not match";
    }
}
?>


