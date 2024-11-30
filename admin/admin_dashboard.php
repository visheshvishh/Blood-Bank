<?php
session_start();
if (isset($_SESSION['email'])) {
    include('../includes/connection.php');
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
        <!-- jQuery file -->
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
                padding: 1% 0 0 1%;
                border-radius: 3%;
                margin: 2% 0 2% 2%;
                width: 250px;
            }

            .deactive {
                display: none;
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

        <script type="text/javascript">
            $(document).ready(function() {
                $("#donors_list").click(function() {
                    $("#main-container").load("donors.php");
                });
            });

            $(document).ready(function() {
                $("#patients_list").click(function() {
                    $("#main-container").load("patients.php");
                });
            });

            $(document).ready(function() {
                $("#manage_donation").click(function() {
                    $("#main-container").load("manage_donations.php");
                });
            });

            $(document).ready(function() {
                $("#manage_requests").click(function() {
                    $("#main-container").load("manage_requests.php");
                });
            });
        </script>
    </head>

    <body>
    <div class="topnav" id="myTopnav">
      
      <a> <strong><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['name']; ?></strong></a>
   <a class="nav-link" href="../logout.php">Logout</a>
   <a class="nav-link" id="manage_requests">Recipient's Requests</a>
   <a class="nav-link" id="manage_donation">Donation Requests</a>
   <a class="nav-link" id="patients_list">Recipients</a>
   <a class="nav-link" id="donors_list">Donors</a>
   <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
 <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
<h2 style=" padding:15px; color:white;">Blood Kinship</h2>
</div>
        <div class="container-fluid">
            <div class="row" id="main-container">
                <div class="box">  
                    <select id="stocks" style="border-radius:10px; height:50px; width:100px; margin-left: 800px; background:crimson; color:#fff; margin-top:50px;">
                        <option value="blood">Blood</option>
                        <option value="plasma">Plasma</option>
                        <option value="platelets">Platelets</option>
                    </select>
                </div>
                <?php
                $sql = "SELECT * from stocks";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $deactive = "deactive";
                    if ($row['donation_type'] == "blood") {
                        $deactive = "";
                    }
                ?>
                    <div class="col-md-2 info_card <?php echo $deactive; ?>" data-type="<?php echo $row['donation_type']; ?>">
                        <h2 class="text-danger"><?php echo $row['donation_type'] . " : " . $row['blood_group']; ?> </i></h2>
                        <br>
                        <b>Stock: <?php echo $row['stock']; ?> Units</b>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


    </body>
    <script>
        const stocks = document.getElementById('stocks');
        const info_card = document.querySelectorAll('.info_card');
        stocks.addEventListener('change', (e) => {
            info_card.forEach((card) => {
                if (card.dataset.type === stocks.value) {
                    card.classList.remove('deactive');
                } else {
                    card.classList.add('deactive');
                }
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
