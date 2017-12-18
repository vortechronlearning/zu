<!DOCTYPE html>
<html>

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
    <div class="panel panel-default col-md-6 col-md-offset-3">
      <div class="panel-body">

        <div class="row">
          <div class="">
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
        </div>

        <div class="row mt-3">
          <div class="">
            <input type="text" class="form-control" name="password" placeholder="Password">
          </div>
        </div>

        <div class="row mt-3">
          <div class="">
            <button class="btn btn-primary" name="submit">Submit</button>
          </div>
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