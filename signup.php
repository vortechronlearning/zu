<!DOCTYPE html>
<html>
<?php
include_once "database.php";
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Canned Drinks Ordering System : Home</title>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<form action="auth_controller.php" method="POST">
  <div class="container" style="margin-top: 100px">
    <div class=" col-md-6 col-md-offset-3">

      <?php include_once "alert.php" ?>

      <div class="panel panel-default">
        <div class="panel-heading">Sign Up</div>
        <div class="panel-body p-6">

              <input type="text" class="form-control mb-3" name="passcode" placeholder="Passcode" required>

              <input type="text" class="form-control mb-3" name="name" placeholder="Name" required>

              <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>

              <input type="text" class="form-control mb-3" name="password" placeholder="Password" required>

              <input type="text" class="form-control mb-3" name="password_retype" placeholder="Retype Password" required>

              <button class="btn btn-primary" name="submit" value="signup">Submit</button>
              <a href="login.php" class="btn btn-secondary" name="submit">Login</a>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>