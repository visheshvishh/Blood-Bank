<?php 
session_start(); 
if(isset($_SESSION['email'])){
if(isset($_POST['update_request'])){
    include('../includes/connection.php');
    $query = "update donation set blood_group = '$_POST[bgroup]',no_units = '$_POST[units]',disease = '$_POST[disease]' where id = $_POST[did]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
              alert('Request updated successfully...');
            window.location.href = 'donor_dashboard.php';  
          </script>";
    }
    else{
        echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'donor_dashboard.php';
          </script>";
    }
}
?>
<html>
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
        <script src="../includes/juqery_latest.js"></script>
        <style>
            .donate-form{
                box-shadow: 3px 3px 3px gray;
                border-left: 1px solid gray;
                border-top: 1px solid gray;
                border-radius: 7px;
                padding: 7px;
            }
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
    <div class="row" style="margin-top: 4%;">
        <div class="col-md-3 m-auto donate-form">
        <center><h4>Edit your request</h4></center><br>
        <?php 
            include('../includes/connection.php');
            $query = "select * from donation where id = $_GET[did]";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="did" value="<?php echo $_GET['did'];?>">
                </div>
                <div class="form-group">
                        <label for="name">Donation Type:</label>
                        <select name="dtype" class="form-control" required id="dtype" value="<?php echo $row['donation_type']; ?>">
                            <option value="blood">Blood</option>
                            <!-- a+ , a- , b+ ,b- , o+ , o- , ab+ , ab- -->
                            <option value="plasma">Plasma</option>
                            <!-- ab+ , ab- -->
                            <option value="platelets">Platelets</option>
                            <!-- a+ , a- , b+ , o+ , ab+ , ab- -->
                        </select>
                    </div>
                    <br>
                <div class="form-group">
                        <label for="name">Blood Group:</label>
                        <select name="bgroup" class="form-control" required id='bgroup'value="<?php echo $row['blood_group']; ?>">
                        </select>
                    </div>
                <script>
                        var dtype = document.getElementById('dtype');
                        var bgroup = document.getElementById('bgroup');
                        dtype.addEventListener("change", function() {
                            if (dtype.value == 'blood') {
                                bgroup.innerHTML = "<option value='A+'>A+</option><option value='A-'>A-</option><option value='B+'>B+</option><option value='B-'>B-</option><option value='AB+'>AB+</option><option value='AB-'>AB-</option><option value='O+'>O+</option><option value='O-'>O-</option>";
                            } else if (dtype.value == 'plasma') {
                                bgroup.innerHTML = "<option value='AB+'>AB+</option><option value='AB-'>AB-</option>";
                            } else if (dtype.value == 'platelets') {
                                bgroup.innerHTML = "<option value='A+'>A+</option><option value='A-'>A-</option><option value='B+'>B+</option><option value='O+'>O+</option><option value='AB+'>AB+</option><option value='AB-'>AB-</option>";
                            }
                        })
                    </script><br>
                <div class="form-group">
                    <label for="units">No of Units:</label>
                    <input type="text" class="form-control" name="units" placeholder="No of units" value="<?php echo $row['no_units']; ?>">
                </div><br>
                <div class="form-group">
                    <label for="">Disease (if any)</label>
                    <textarea name="disease" cols="45" rows="3" class="form-control" placeholder="Mention disecse if any (Optional)"><?php echo $row['disease']; ?></textarea>
                </div><br>
                <input type="submit" class="btn btn-danger" name="update_request" value="Update">
            </form> 
        <?php     
            }
        ?>
        </div>
        <div class="col-md-6 m-auto">
            <img src="../img/normal2.jpeg" class="img-fluid" style="border-radius:3%; height:500px;">
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
}
else{
    header('Location:login.php');
}