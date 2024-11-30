<?php 
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if($_GET['bg'] == 'AP'){
        $bgg = 'A+';
    }elseif($_GET['bg'] == 'BP'){
        $bgg = 'B+';
    }elseif($_GET['bg'] == 'ABP'){
        $bgg = 'AB+';
    }elseif($_GET['bg'] == 'OP'){
        $bgg = 'O+';
    }else{
        $bgg = $_GET['bg'];
    }
    $type = $_GET['type'];
    $query = "select stock from stocks where blood_group = '$bgg' and donation_type = '$type'";
    $query_result = mysqli_query($connection,$query);
    $total_blood = 0;
    while($row = mysqli_fetch_assoc($query_result)){
        $total_blood = number_format($row['stock']);
    }
    $rem_blood = $total_blood - number_format($_GET['nu']);
    if(number_format($_GET['nu'])<=$total_blood){
        $query = "update stocks set stock = $rem_blood where blood_group = '$bgg' and donation_type = '$type'";
        $query_result = mysqli_query($connection,$query);

        $query1 = "update requests set status = 1 where id = $_GET[rid]";
        $query_result1 = mysqli_query($connection,$query1);
        if($query_result1){
            echo "<script type='text/javascript'>
                alert('Request approved successfully...');
                window.location.href = 'admin_dashboard.php';  
            </script>";
            $email = $_GET['email'];
            require_once '../vendors/autoload.php';
            $mail = new PHPMailer(true);
            try {
            $mail->isSMTP();                                   //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';              //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                          //Enable SMTP authentication
            $mail->Username   = 'bloodkinship051@gmail.com';       //SMTP username
            $mail->Password   = 'humtjoksvwtmegij';            //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
            $mail->Port       = 465;                           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom('bloodkinship051@gmail.com', 'Blood Kinship');
            $mail->addAddress($email);                         //Name is optional
            $mail->addReplyTo('no-reply@bloodkinship.com', 'Do Not Reply To This Mail');

            $mail->isHTML(true);                               //Set email format to HTML
            $mail->Subject = 'Request Approved';
            $mail->Body    = "<p>Your $type request has been approved by the organization.</p>";

            $mail->send();
            } catch (Exception $e) {
                die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error...Plz try again.');
                window.location.href = 'admin_dashboard.php';
            </script>";
        }
    }
    else{
        echo "<script type='text/javascript'>
            alert('Sorry No sufficient blood');
            window.location.href = 'admin_dashboard.php';
        </script>";
    }
}
else{
    header('Location:login.php');
}
?>