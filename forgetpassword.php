<html>

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/homestyle.css">
  <script src="https://kit.fontawesome.com/3477ae541c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style type="text/css">
body{
  background-color: #d3d3d3;
}

    nav {
      background: #222222;
      padding: 10px 40px 10px 70px;
      border: 1px solid #000;
      border-left: none;
      border-right: none;
    }

    nav ul {
      display: flex;
      list-style: none;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
    }

    nav ul li.logo {
      flex: 1;
      font-size: 30px;
      font-weight: 700;
    }

    nav ul div.items {
      padding: 0 25px;
      display: inline-flex;
    }

    nav ul div.items a {
      text-decoration: none;
      font-size: 18px;
      padding: 0 12px;
      color: crimson;
    }

    nav ul div.items a:hover {
      color: cyan;
    }

    nav ul .search-icon {
      height: 40px;
      width: 240px;
      display: flex;
      background: #f2f2f2;
      border-radius: 5px;
    }

    nav ul .search-icon input {
      height: 100%;
      width: 200px;
      border: none;
      outline: none;
      padding: 0 10px;
      color: #000;
      font-size: 16px;
      border-radius: 5px 0 0 5px;
    }

    nav ul .search-icon .icon {
      height: 100%;
      width: 40px;
      line-height: 40px;
      text-align: center;
      border: 1px solid #cccccc;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
    }

    nav ul .search-icon .icon:hover {
      background: #e6e6e6;
    }

    nav ul .search-icon .icon span {
      color: #222222;
      font-size: 18px;
    }

    nav ul li.btn {
      font-size: 29px;
      flex: 1;
      padding: 0 40px;
      display: none;
    }

    nav ul li.btn span {
      height: 42px;
      width: 42px;
      text-align: center;
      line-height: 42px;
      border: 1px solid #ff6967;
      border-radius: 5px;
      cursor: pointer;
    }

    nav ul li.btn span.show:before {
      content: '\f00d';
    }

    @media screen and (max-width: 1052px) {
      nav {
        padding: 10px 40px 10px 0px;
      }

      nav ul li.logo {
        display: none;
      }

      nav ul div.items {
        flex: 4;
      }
    }

    @media screen and (max-width: 800px) {
      nav ul li.btn {
        display: block;
      }

      nav {
        z-index: 1;
        padding: 9px 40px 9px 0;
      }

      nav ul div.items {
        z-index: -1;
        position: fixed;
        top: -220px;
        right: 0;
        width: 100%;
        background: #222222;
        display: inline-block;
        transition: top .4s;
      }

      nav ul div.items.show {
        top: 60px;
      }

      nav ul div.items li {
        text-align: center;
        line-height: 30px;
        margin: 30px 0;
      }

      nav ul div.items li a {
        font-size: 19px;
      }
    }

    @media screen and (max-width: 405px) {
      nav ul {
        flex-wrap: nowrap;
      }

      nav ul li.search {
        width: 50vmin;
      }

      nav ul li input {
        width: 40vmin;
      }

      nav ul li .search-icon {
        width: 10vmin;
      }
    }
  </style>

</head>

<body>
  <nav>
    <ul>
      <li class="logo">Blood Kinship</li>
      <li class="btn"><span class="fas fa-bars"></span></li>
      <div class="items">
        <li><a href="#">Home</a></li>
        <li><a href="admin/login.php">Admin</a></li>
        <li><a href="donor/login.php">Donor</a></li>
        <li><a href="patient/login.php">Recipient</a></li>
        <li><a href="#">Contribution</a></li>
        <li><a href="#">Feedback</a></li>
        <li><a href="blog.php">Blogs</a></li>
        <li><a href="#">Tips</a></li>
      </div>
    </ul>
  </nav>
  <form class="container" id="reset_form" style="display:flex;align-items: center;justify-content: center; height: 80vh;" action="verify.php" method="POST">
    <div class="card text-center" style="width: 300px;">
      <div class="card-header h5 " style="color: #fff; background-color:#ff6967;">Password Reset</div>
      <div class="card-body px-5">
        <p class="card-text py-2">
          Enter your email address.
        </p>
        <div class="form-outline">
          <input type="email" id="reset_pass" name="reset_pass" class="form-control my-3" required />
          <label class="form-label" for="typeEmail">Email input</label>
        </div>
        <button type="submit" class="btn  w-100" id="sub_btn" style="color: #fff; background-color:#ff6967">Reset password</button>
      </div>
    </div>
  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
  let reset_form = document.getElementById('reset_form');
  let email = document.getElementById('reset_pass');
  let sub_btn = document.getElementById('sub_btn');
  reset_form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (email.value == '') {
      alert('Please enter your email address');
    }else{
      sub_btn.innerHTML = 'Please wait...';
      sub_btn.disabled = true;
      reset_form.submit();
    }
  });
</script>

</html>