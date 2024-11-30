<?php 
session_start();
session_unset($_SESSION['unique_id'] , $_SESSION['email'] , $_SESSION['otp']);
session_destroy();
header("location: ../login.php");