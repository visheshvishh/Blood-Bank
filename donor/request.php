<html>
<head>
    <style type="text/css">
        tr:nth-child(even)
         {background-color: #D3D3D3;
         }

         h1{
            color: crimson;
            text-decoration: none;
         }
    </style>
</head>
    <body>
        <div class="row">
            <div class="col-md-10 m-auto">
            <br><center><h1>Donation Requests</h1><br></center>
            <table class="table" >
                <thead>
                    <th>S.No</th>
                    <th>Donation ID</th>
                    <th>Type</th>
                    <th>Units (in ml)</th>
                    <th>Blood Group</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from donation where donor_id = $_SESSION[uid]";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['donation_type']; ?></td>
                            <td><?php echo $row['no_units']; ?></td>
                            <td><?php echo $row['blood_group']; ?></td>
                            <td><?php if($row['status'] == 0){echo '<span class="badge bg-secondary">No Action</span>';}elseif($row['status'] == 1){echo '<span class="badge bg-success">Approved</span>';}else{echo '<span class="badge bg-danger">Rejected</span>';} ?></td>
                            <td><?php if($row['status'] == 0){?> <a href="edit_request.php?did=<?php echo $row['id']; ?>"><span class="badge bg-primary">Edit</span></a> | <a href="delete_request.php?did=<?php echo $row['id']; ?>"><span class="badge bg-danger">Delete</span></a> <?php } ?></td>
                        </tr>
                        <?php
                        $sno++;
                    }
                ?>
            </table> 
            </div>
        </div>  
    </body>
</html>