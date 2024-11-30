<?php 
    session_start();
    if(isset($_SESSION['email'])){
?>
<html>
    <head>
        <style type='text/css'>
            body, html {
                margin: 0;
                padding: 0;
            }
            body {
                color: black;
                display: table;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
            }
            .container {
                border: 20px solid tan;
                width: 750px;
                height: 563px;
                display: table-cell;
                vertical-align: middle;
            }
            .logo {
                color: tan;
                font-size: 30px;
            }

            .marquee {
                color: tan;
                font-size: 40px;
                margin: 20px;
            }
            .assignment {
                margin: 20px;
            }
            .person {
                border-bottom: 2px solid black;
                font-size: 20px;
                font-style:20 italic;
                margin: 20px auto;
                width: 400px;
            }
            .reason {
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="img">
                <img src="img/medal.jpg" alt="" style="height: 120px;">
            </div>
            <div class="logo">
              Blood Kinship
            </div>

            <div class="marquee">
                Certificate of Appriciation
            </div>

            <div class="assignment">
                This certificate is proudly presented to
            </div>

            <div class="person">
                <h1><i><?php echo $_SESSION['name']; ?></i></h1>
            </div>

            <div class="reason">
              We are grateful for your contributions and proud to have you as a part of our team.
            </div>
        </div>
    </body>
</html>
<?php
}
else{
    header('Location:login.php');
}