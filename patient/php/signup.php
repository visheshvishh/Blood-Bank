<?php
session_start();
include_once  "config.php";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
$Role = 'user';

// checking fields are not empty
if (!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($cpassword)) {
    //if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //checking email already exists
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($sql) > 0) {
            header("location: ../register.php?err=202");
            exit();
        } 
        else 
        {
            if ($password == $cpassword) {
                //let's check user upload file or not
                $random_id = rand(time(), 10000000);
                $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, name, email, phone, password, Role)VALUES ($random_id,'$name','$email','$phone','$password','$Role')");
                header("location: ../login.php?err=200");
                exit();
            }
             else {
                header("location: ../register.php?err=401");
                exit();
            }
        }
    } else {
        header("location: ../register.php?err=402");
        exit();
    }
} else {
    header("location: ../register.php?err=403");
    exit();
}
