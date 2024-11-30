<?php
session_start();
if (isset($_SESSION['email'])) {
    include('../includes/connection.php');
    $query = "select * from donation where donor_id = $_SESSION[uid]";
    $query_run = mysqli_query($connection, $query);
    $total_request = mysqli_num_rows($query_run);

    $query = "select * from donation where donor_id = $_SESSION[uid] AND status = 1";
    $query_run = mysqli_query($connection, $query);
    $request_acc = mysqli_num_rows($query_run);

    $query = "select * from donation where donor_id = $_SESSION[uid] AND status = 2";
    $query_run = mysqli_query($connection, $query);
    $request_rej = mysqli_num_rows($query_run);

    $query = "select * from donation where donor_id = $_SESSION[uid] AND status = 1";
    $query_run = mysqli_query($connection, $query);
    $total_donation = 0;
    while ($row = mysqli_fetch_assoc($query_run)) {
        $total_donation = $total_donation + number_format($row['no_units']);
    }
    if (isset($_POST['donate_submit'])) {
        if (isset($_POST['bgroup']) && isset($_POST['units']) && isset($_POST['disease']) && isset($_FILES['fitness']) && isset($_POST['dtype'])) {
            if ($_POST['bgroup'] == "" || $_POST['units'] == "" || $_POST['disease'] == "" || $_FILES['fitness']['name'] == "" || $_POST['dtype'] == "") {
                echo "<script type='text/javascript'>
                        alert('All fields are required');
                        window.location.href = 'donor_dashboard.php';  
                    </script>";
                exit();
            } else {
                $file_name = $_FILES['fitness']['name'];
                $file_size = $_FILES['fitness']['size'];
                $file_tem_loc = $_FILES['fitness']['tmp_name'];
                $img_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $img_new_name = uniqid('img', false) . rand(-50, -1) . '.' . $img_extension;
                $file_store = "../fitness_certificates/" . $img_new_name;
                $allowed_extensions = ['jpg', 'jpeg', 'png'];
                if ($file_size > 1000000) {
                    echo "<script type='text/javascript'>
                        alert('Image Size Must Be Less Than 1MB');
                        window.location.href = 'donor_dashboard.php';  
                    </script>";
                    exit();
                } else if (!in_array(strtolower($img_extension), $allowed_extensions)) {
                    echo "<script type='text/javascript'>
                        alert('Image Must Be In JPG, JPEG, PNG Format');
                        window.location.href = 'donor_dashboard.php';  
                    </script>";
                    exit();
                }
                if (move_uploaded_file($file_tem_loc, $file_store)) {
                    $query = "insert into donation values(null,$_SESSION[uid],'$_POST[dtype]','$_POST[bgroup]',$_POST[units],'$_POST[disease]',0,'$img_new_name')";
                    $query_result = mysqli_query($connection, $query);
                    if ($query_result) {
                        echo "<script type='text/javascript'>
                        alert('Data submitted successfully...');
                        window.location.href = 'donor_dashboard.php';  
                    </script>";
                    } else {
                        echo "<script type='text/javascript'>
                        alert('Error...Plz try again.');
                        window.location.href = 'donor_dashboard.php';
                    </script>";
                    }
                }
            }
        } else {
            echo "<script type='text/javascript'>
                alert('All fields are required');
                window.location.href = 'donor_dashboard.php????';  
            </script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <!-- Bootstrap files -->
        <link rel="stylesheet" href="../bootstrap/css//bootstrap.min.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        
        <!-- External CSS file -->
        <link rel="stylesheet" href="../css/styles.css">
        <!-- jQuery file -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="../includes/juqery_latest.js"></script>
        <style>
            body {
                background-color: #EFF5F5;
            }

            .info_card {
                box-shadow: 3px 3px 3px gray;
                height: 150px;
                border-left: 2px solid gray;
                border-top: 2px solid gray;
                padding-top: 1%;
                padding-left: 1%;
                border-radius: 3%;
                margin-left: 2%;
                margin-bottom: 2%;
                margin-top: 2%;
                width: 250px;
            }

                    /* .info_card:hover{
                    box-shadow: 3px 3px 3px gray;
                    height:200px;
                    border-left:2px solid gray;
                    border-top:2px solid gray;
                    padding-top:4%;
                    padding-left:3%;
                    margin:2%;
                    border-radius:3%;
                    height: 210px;
                    font-size: large; 
                } */
            
.topnav {
  overflow: hidden;
  background-color: #ff6867;
}

.topnav a {
  float: right;
  display: block;
  color:black;
  text-align: center;
  padding: 23px 28px;
  text-decoration: none;
  font-size: 20px;
}

.active {
  background-color: whitesmoke;
  color: blue;
  border-radius: 10px   ;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 12px 14px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: whitesmoke;
  color:black;
  border-radius: 10px;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}               </style>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#donate").click(function() {
                    $("#main-container").load("donate.php");
                });
            });

            $(document).ready(function() {
                $("#requests").click(function() {
                    $("#main-container").load("request.php");
                });
            });
        </script>
    </head>
    <body>
    <div class="topnav" id="myTopnav">
      
       <a> <strong><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['name']; ?></strong></a>
    <a class="nav-link" href="../logout.php">Logout</a>
    <a class="nav-link" href="../feedback.php">Feedback</a>
    <a class="nav-link" href="cert.php" target="_blank">Print Certificate</a>
    <a class="nav-link" href="../reward.html">Get Reward</a>
  <a class="nav-link" id="requests">Status of Donation Request</a>
  <a class="nav-link"  id="donate">Donate</a>
  <a class="nav-link" href="donor_dashboard.php">Dashboard</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
<h2 style=" padding:15px; color:white;">Blood Kinship</h2>
</div>
        <div class="container-fluid">
            <div class="row" id="main-container">
                <?php 
                    $total_blood_donation = 0 ;
                    $total_plasm_donation = 0 ;
                    $total_platelets_donation = 0 ;

                    $sql = "SELECT SUM(no_units) from donation where donor_id = $_SESSION[uid] and status = 1 and donation_type = 'blood'";
                    $result = mysqli_query($connection, $sql);
                    $total_blood_donation = mysqli_fetch_assoc($result)["SUM(no_units)"];
                    
                    $sql = "SELECT SUM(no_units) from donation where donor_id = $_SESSION[uid] and status = 1 and donation_type = 'plasma'";
                    $result = mysqli_query($connection, $sql);
                    $total_plasm_donation = mysqli_fetch_assoc($result)["SUM(no_units)"];

                    $sql = "SELECT SUM(no_units) from donation where donor_id = $_SESSION[uid] and status = 1 and donation_type = 'platelets'";
                    $result = mysqli_query($connection, $sql);
                    $total_platelets_donation = mysqli_fetch_assoc($result)["SUM(no_units)"];
                    
                ?>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Blood<br> donated<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="align-items: flex-end;">Total: <?php echo $total_blood_donation; ?> Units</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Plasma<br> donated<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="align-items: flex-end;">Total: <?php echo $total_plasm_donation; ?> Units</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Platelets<br> donated<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="align-items: flex-end;">Total: <?php echo $total_platelets_donation; ?> Units</b>
                </div>
                

                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Request <br>Pending<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b>Total: <?php echo $total_request - $request_acc - $request_rej; ?> Pending</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Request<br> Accepted<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b>Total: <?php echo $request_acc; ?> Accepted</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Request <br>Rejected<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b>Total: <?php echo $request_rej; ?> Rejected</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Total<br> Requests<i class="fa-solid fa-droplet"></i></h3>
                    <br>

                    <b style="">Total: <?php echo $total_request; ?> Request</b>
                </div>
            </div>


    </body>

    <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
    </html>
<?php
} else {
    header('Location:login.php');
}
