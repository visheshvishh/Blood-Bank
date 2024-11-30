<?php 
session_start();
if(isset($_SESSION['email'])){
?>
<html>
    <head>
        <style>
            .donate-form{
                box-shadow: 3px 3px 3px gray;
                border-left: 1px solid gray;
                border-top: 1px solid gray;
                border-radius: 7px;
                padding: 7px;
            }
        </style>
    </head>
<body>
    <div class="row" style="margin-top: 4%;">
    <div class="col-md-6 m-auto">
                <img src="img/tips4.png" class="img-fluid" style="border-radius:8%; height:500px;">
            </div>
        <div class="col-md-3 m-auto donate-form">
        <center><h4>Request Form</h4></center><br>
       
        <form action="patient_dashboard.php" method="POST">
            <div class="form-group">
                <label for="units">No of Units:</label>
                <input type="text" class="form-control" name="units" placeholder="No of units (in ml)">
            </div>
            <div class="form-group">
                        <label for="name">Request Type</label>
                        <select name="dtype" class="form-control" required id="dtype">
                            <option value="blood">Blood</option>
                            <!-- a+ , a- , b+ ,b- , o+ , o- , ab+ , ab- -->
                            <option value="plasma">Plasma</option>
                            <!-- ab+ , ab- -->
                            <option value="platelets">Platelets</option>
                            <!-- a+ , a- , b+ , o+ , ab+ , ab- -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Blood Group:</label>
                        <select name="bgroup" class="form-control" required id='bgroup'>
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
                    </script>
            <div class="form-group">
                <label for="">Reason</label>
                <textarea name="reason" cols="45" rows="3" class="form-control" placeholder="Mention the reason"></textarea>
            </div>
            <input type="submit" class="btn btn-danger" name="request_blood" value="Request">
        </form>
        </div>
    </div>
</body>
</html>
<?php 
}
else{
    header('Location:login.php');
}
?>