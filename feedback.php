


<!DOCTYPE html>
<html>

<head>
   <title>Feedback form</title>
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="feedd.css">

<style>
   *{
   padding: 0;
   margin: 0;
   box-sizzing: content-box;
}
body{
   background: #ff6967;
   
}
.form-container{
   height: 600px;
   width: 600px;
   margin: 50px auto;
}
.form-container form{
   margin: auto;
   display: flex;
   flex-direction: column;
   padding: 30px;
   text-transform: capitalize;
   border-radius: 30px;
   color: #000000;
}
.form-container form h3{
   text-align: center;
   font-size: 2.5rem;
   color: #000000;
}
.form-container form label{
   font-size: 1.3rem;
   padding: 3px 0;
}
.form-container form textarea{
   padding: 8px;
   border-radius: 20px;
   margin: 5px 0 5px 0;
   border: none;
   box-shadow: 3px 3px 3px 0 rgba(0, 0, 0, 0.3);
   text-transform: capitalize;
   font-size: 1rem;

}
.form-container form input{
   padding: 8px;
   border-radius: 20px;
   margin: 5px 0 5px 0;
   border: none;
   box-shadow: 3px 3px 3px 0 rgba(0, 0, 0, 0.3);
   text-transform: capitalize;
   font-size: 1rem;

}
.form-container form input[type="button"]{
   align-self: flex-end;
   height: 50px;
   width: 70px;
   font-size: 100%;
   color: #000000;
}
.form-container form input[type="button"]:hover{
   align-self: flex-end;
   height: 50px;
   width: 70px;
   font-size: 100%;
   background-color: #ffd1dc;
}
</style>
   
   
</head>


<body>
  
   <div class="form-container">
      <form action="">
         <h3> GIVE YOUR FEEDBACK!!! </h3>
         <label for="">name:</label>
         <input type="text" name="name" placeholder="name" required>
         <label for="">email:</label>
         <input type="email" name="email" placeholder="e-mail" required>
         <label for="">phone number:</label>
         <input type="#" name="mobile" placeholder="phone number" required>
         <label for="">Your Message:</label>
         <textarea name="" id="" name="msg" cols="20" rows="8" placeholder="Your Message"></textarea>
         <input type="button" value="Submit">
         <body background="img/2.jpeg">
            
         </body>
      </form>
   </div>
   
   
</body>
</html>