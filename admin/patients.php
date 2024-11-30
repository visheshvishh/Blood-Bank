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
            <div class="col-md-9 m-auto">
            <br><center><h1>List of all Recipients</h1><br></center>
            <table class="table">
                <thead style="background-color: gray;">
                    <th>S.No</th>
                    <th>Recipient ID</th>
                    <th>Recipient Name</th>
                    <th>Recipient Email</th>
                    <th>Mobile No</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from users where usertype = 'patient'";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><a class="btn btn-sm btn-danger" href="delete_patient.php?pid=<?php echo $row['id']; ?>">Delete</a></td>
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