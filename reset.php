<?php
session_start();
if (!isset($_SESSION['reset_pass'])) {
    header("location: ./forgetpassword.php?msg=Please enter your email first");
    exit();
}else{
    include("./includes/connection.php");
    if(isset($_POST['password'],$_POST['cpassword'])){
        if($_POST['password'] == $_POST['cpassword']){
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $email = $_SESSION['reset_pass'];
            $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
            $result = mysqli_query($connection,$sql);
            if($result){
                unset($_SESSION['reset_pass']);
                header("location: ./?msg=password changed successfully");
                exit();
            }else{
                header("location: ./reset.php?msg=something went wrong");
            }
        }else{
            header("location: ./reset.php?msg=Password not matched");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Login</title>
    <!-- Bootstrap files -->
    <!-- <link rel="stylesheet" href="../bootstrap/css//bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script> -->
    <!-- External CSS file-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #FF7377;
        }

        li {
            float: right;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: white;
            color: black;
        }

        .active {
            background-color: white;
            color: black;
            border-radius: 10px;
        }

        a {
            display: inline;
            text-align: right;
            text-decoration: none;
            color: #999;
            font-size: 1rem;
            transition: .3s;
        }
        #name-input{
            width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
        }


     

        .btn {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #ff6961, #ff2041, #ff6961);
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }

        .btn:hover {
            background-position: right;
        }

        .wave {
            position: absolute;
            bottom: 0;
            right: 0;
            height: 100%;
            z-index: -1;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 7rem;
            padding: 0 2rem;
        }

        .img {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .login-content {
            display: flex;
            margin-left: 100px;
            /*justify-content: flex-end;*/
            align-items: center;
            text-align: center;
        }

        .img img {
            width: 500px;
        }

        form {
            width: 360px;
        }

        .login-content img {
            height: 100px;
        }

        .login-content h2 {
            margin: 15px 0;
            color: #333;
            text-transform: uppercase;
            font-size: 2.9rem;
        }

        .login-content .input-div {
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px 0;
            border-bottom: 2px solid #d9d9d9;
        }


        .btn {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #ff6961, #ff2041, #ff6961);
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }

        .btn:hover {
            background-position: right;
        }


        @media screen and (max-width: 1050px) {
            .container {
                grid-gap: 5rem;
            }
        }

        @media screen and (max-width: 1000px) {
            form {
                width: 290px;
            }

            .login-content h2 {
                font-size: 2.4rem;
                margin: 8px 0;
            }

            .img img {
                width: 400px;
            }
        }

        @media screen and (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
            }

            .img {
                display: none;
            }

            .wave {
                display: none;
            }

            .login-content {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">

        <ul>
            <li style="float: left"> <a href="index.php">Blood Kinship</a></li>
            <li><a href="../patient/login.php">Recipient</a></li>
            <li><a class="active" href="../donor/login.php">Donor</a></li>
            <li><a href="login.php">Admin</a></li>
            <li><a href="../index.php">Home</a></li>
        </ul>
    </nav>
    <img class="wave" src="img/canva3.png">
    <div class="container">
        <div class="login-content">
            <form action="" method="POST">
                <h2 class="title">Welcome</h2>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="password" id="name-input" class="input" required>
                </div>
                <div class="div">
                    <h5> Confirm Password</h5>
                    <input type="password" name="cpassword" id="name-input" class="input" required>
                </div>

                <input type="submit" class="btn btn-danger" name="change" value="Change Password">
            </form>
        </div>
        <div class="img">
            <img src="img/mi.jpeg">
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
 

</html>