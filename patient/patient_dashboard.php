<?php
session_start();

if (isset($_SESSION['email'])) {
    include('../includes/connection.php');
    $query = "select * from requests where patient_id = $_SESSION[uid]";
    $query_run = mysqli_query($connection, $query);
    $total_request = mysqli_num_rows($query_run);

    $query = "select * from requests where patient_id = $_SESSION[uid] AND status = 1";
    $query_run = mysqli_query($connection, $query);
    $request_acc = mysqli_num_rows($query_run);

    $query = "select * from requests where patient_id = $_SESSION[uid] AND status = 2";
    $query_run = mysqli_query($connection, $query);
    $request_rej = mysqli_num_rows($query_run);

    $query = "select * from requests where patient_id = $_SESSION[uid] AND status = 1";
    $query_run = mysqli_query($connection, $query);
    $blood_requested = 0;
    while ($row = mysqli_fetch_assoc($query_run)) {
        $blood_requested = $blood_requested + number_format($row['no_units']);
    }
    if (isset($_POST['request_blood'])) {

        $sql = "SELECT stock FROM stocks WHERE blood_group = '$_POST[bgroup]'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result);
        if ($row['stock'] >= $_POST['units']) {
            $query = "insert into requests values(null,$_SESSION[uid],'$_POST[dtype]','$_POST[units]','$_POST[bgroup]','$_POST[reason]',0)";
            $query_result = mysqli_query($connection, $query);
            echo "<script type='text/javascript'>
                    window.location.href = 'patient_dashboard.php?err=200';  
                </script>";
        } else {
            echo "<script type='text/javascript'>
                    window.location.href = 'patient_dashboard.php?err=403';
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- jQuery file -->
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

            .info_card b {
                display: block;
                text-align: right;
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
}  
        </style>


    </head>

    <body>
        <?php
        if (isset($_GET['err'])) {
            $color = "danger";
            if ($_GET['err'] == 200) {
                $err_msg = "Request submitted successfully...";
                $color = "success";
            } else if ($_GET['err'] == 403) {
                $err_msg = "Insufficient Stock";
                $color = "danger";
            }
            echo "
         <div class='alert alert-$color alert-dismissible fade show' role='alert'>
            <strong>$err_msg</strong>
            <a href='patient_dashboard.php'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
            </a>
         </div>
         ";
        }
        ?>

<div class="topnav" id="myTopnav">
      
      <a> <strong><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['name']; ?></strong></a>
   <a class="nav-link" href="../logout.php">Logout</a>
   <a class="nav-link" href="../feedback.php">Feedback</a>
   <a class="nav-link" id="request_history">Status of Requests</a>
   <a class="nav-link" id="request_blood">Request it</a>
 <a class="nav-link" href="patient_dashboard.php">Dashboard</a>
 <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
<h2 style=" padding:15px; color:white;">Blood Kinship</h2>
</div>
        <div class="container-fluid">
            <div class="row" id="main-container">
            <?php 
                    $total_blood_donation = 0 ;
                    $total_plasm_donation = 0 ;
                    $total_platelets_donation = 0 ;

                    $sql = "SELECT SUM(no_units) from requests where patient_id = $_SESSION[uid] and status = 1 and donation_type = 'blood'";
                    $result = mysqli_query($connection, $sql);
                    $total_blood_donation = mysqli_fetch_assoc($result)["SUM(no_units)"];
                    
                    $sql = "SELECT SUM(no_units) from requests where patient_id = $_SESSION[uid] and status = 1 and donation_type = 'plasma'";
                    $result = mysqli_query($connection, $sql);
                    $total_plasm_donation = mysqli_fetch_assoc($result)["SUM(no_units)"];

                    $sql = "SELECT SUM(no_units) from requests where patient_id = $_SESSION[uid] and status = 1 and donation_type = 'platelets'";
                    $result = mysqli_query($connection, $sql);
                    $total_platelets_donation = mysqli_fetch_assoc($result)["SUM(no_units)"];
                    
                ?>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Blood<br> Requested<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="align-items: flex-end;">Total: <?php echo $total_blood_donation; ?> Units</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Plasma<br> Requested<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="align-items: flex-end;">Total: <?php echo $total_plasm_donation; ?> Units</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Platelets<br> Requested<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="align-items: flex-end;">Total: <?php echo $total_platelets_donation; ?> Units</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Total<br> Requests<i class="fa-solid fa-droplet"></i></h3>
                    <br>

                    <b style="">Total: <?php echo $total_request; ?> Request</b>
                </div>

                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Request <br>Pending<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="">Total: <?php echo $total_request - $request_acc - $request_rej; ?> Pending</b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Request<br> Accepted<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="">Total: <?php echo $request_acc; ?></b>
                </div>
                <div class="col-md-3 info_card">
                    <h3 class="text-danger">Request <br>Rejected<i class="fa-solid fa-droplet"></i></h3>
                    <br>
                    <b style="">Total: <?php echo $request_rej; ?></b>
                </div>
            </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../includes/juqery_latest.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#request_blood").click(function() {
                $("#main-container").load("request_blood.php");
            });
        });

        $(document).ready(function() {
            $("#request_history").click(function() {
                $("#main-container").load("request_history.php");
            });
        });
    </script>
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
?>