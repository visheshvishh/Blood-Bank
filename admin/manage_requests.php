<html>
<head>
       <style type="text/css">
        tr:nth-child(even)
         {background-color: #D3D3D3;
         }
         h1{
            color: crimson;
         }
    </style>
</head>
    <body>
        <div class="row">
            <div class="col-md-10 m-auto">
            <br><center><h4><u>Manage Blood Requests</u></h4><br></center>
            <table class="table">
                <thead style="background-color: gray;">
                    <th>S.No</th>
                    <th>Request ID</th>
                    <th>Recipient Name</th>
                    <th>Type</th>
                    <th>Blood group</th>
                    <th>Units(in ml)</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from requests where status = 0";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        $query1 = "select name,mobile,email from users where id = $row[patient_id]";
                        $query_run1 = mysqli_query($connection,$query1);
                        while($row1 = mysqli_fetch_assoc($query_run1)){
                            // $donor_name = $row['name'];
                            if($row['blood_group'] == 'A+'){
                                $bg = 'AP';
                            }elseif($row['blood_group'] == 'B+'){
                                $bg = 'BP';
                            }elseif($row['blood_group'] == 'AB+'){
                                $bg = 'ABP';
                            }elseif($row['blood_group'] == 'O+'){
                                $bg = 'OP';
                            }else{
                                $bg = $row['blood_group'];
                            }
                            $type = $row['donation_type'];
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td><?php echo $row['donation_type']; ?></td>
                            <td><?php echo $row['blood_group']; ?></td>
                            <td><?php echo $row['no_units']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php if($row['status'] == 0){echo '<span class="badge bg-secondary">No Action</span>';} ?></td>
                            <td><a onclick="disablebtn(this)" class="btn btn-sm btn-success" href="accept_req.php?rid=<?php echo $row['id']; ?>&bg=<?php echo $bg; ?>&nu=<?php echo $row['no_units']; ?>&email=<?php echo $row1['email'];?>&type=<?php echo $type; ?>">Approve</a>
                            <a class="btn btn-sm btn-danger" href="reject_req.php?rid=<?php echo $row['id']; ?>">Reject</a></td>
                        </tr>
                        <?php
                        }
                        $sno++;
                    }
                ?>
            </table> 
            </div>
        </div>  
    </body>
    <script>
        function disablebtn(btn){
            btn.disabled = true;
            btn.innerHTML = "please wait...";
            btn.style.backgroundColor = "gray";
            btn.style.pointerEvents = "none";
            btn.style.cursor = "not-allowed";
        }
    </script>
</html>