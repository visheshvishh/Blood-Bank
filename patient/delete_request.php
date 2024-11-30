<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if(isset($_GET['cppid'])){
        echo "<script type='text/javascript'>
            if(confirm('Are you sure you want to delete this request?')){
                window.location.href = 'delete_request.php?pid=$_GET[cppid]';
            }else{
                window.location.href = 'patient_dashboard.php';
            }
        </script>";
    }else if(isset($_GET['pid'])){
        $query = "delete from requests where id = $_GET[pid]";
        $query_result = mysqli_query($connection,$query);
        if($query_result){
            echo "<script type='text/javascript'>
            alert('Request Deleted successfully...');
            window.location.href = 'patient_dashboard.php';  
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error...Plz try again.');
            window.location.href = 'patient_dashboard.php';
            </script>";
        }
    }else{
        echo "<script type='text/javascript'>
            window.location.href = 'patient_dashboard.php';
        </script>";
    }
}
else{
    header('Location:login.php');
}

?>