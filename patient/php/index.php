<?php
// echo "test";
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $Email = $_POST['email'];
    $Password =  md5($_POST['password']);

    if (!empty($Email) && !empty($Password)) {
        $sql = "SELECT * FROM users WHERE email = '$Email' AND password = '$Password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $_SESSION['unique_id'] = $row['unique_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header("location: ../user.php");
                exit();
            }
        } else {
            header("location: ../login.php?err=404");
            exit();
        }
    } else {
        header("location: ../login.php?err=40");
        exit();
    }
}
?>