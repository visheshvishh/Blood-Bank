<?php
session_start();
if (isset($_SESSION['email'])) {
?>
    <html>

    <head>
        <style>
            .donate-form {
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
            <div class="col-md-3 m-auto donate-form">
                <center>
                    <h4>Donation Form</h4>
                </center><br>
                <form action="donor_dashboard.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Donation Type:</label>
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
                        <label for="units">No of Units:</label>
                        <input type="text" class="form-control" name="units" placeholder="No of units">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Disease (if any):</label>
                        <textarea name="disease" cols="45" rows="3" class="form-control" placeholder="About your medical condition "></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="fitness">Upload your fitness certificate :</label>
                        <input type="file" accept=".png,.jpg,.jpeg" class="form-control" id="fitness" name="fitness">
                        <small>"Image size must be less than 1MB"</small>
                    </div><br>
                    <input type="submit" class="btn btn-danger" name="donate_submit" value="Submit">
                </form>
            </div>
            <div class="col-md-6 m-auto">
                <img src="img/donor1.jpg" class="img-fluid" style="border-radius:10%;">
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header('Location:login.php');
}
?>