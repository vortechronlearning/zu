<?php
namespace Base;

use Illuminate\Database\Capsule\Manager as Database;

include_once 'database.php';

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <title>My Canned Drinks Ordering System : Orders</title>
 <!-- Bootstrap -->
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
 <style>
 .gradient-text {
   -moz-background-clip: text;
   -webkit-background-clip: text;
   -o-background-clip: text;
   -moz-text-fill-color: transparent;
   -webkit-text-fill-color: transparent;
   -o-text-fill-color: transparent;
   background-image: linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%);
 }
</style>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include_once 'nav_bar.php'; ?>
    <form action="catalogue.php" method="POST">
      <div class="container">
        <h1 class="text-center font-hairline mt-6 gradient-text py-6">Search</h1>

        <div class="row py-4">
          <div class="col-lg-offset-3 col-lg-6">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">Name</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="name">
            </div>
          </div>
        </div>

        <div class="row text-center">
          or
        </div>

        <div class="row py-4">
          <div class="col-lg-offset-3 col-lg-6">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">Brand</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="brand">
            </div>
          </div>
        </div>

        <div class="row text-center">
          or
        </div>

        <div class="row py-4">
          <div class="col-lg-offset-3 col-lg-6">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">Packaging Type</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="type">
            </div>
          </div>
        </div>

        <div class="row text-center">
          <button class="btn btn-primary" name="submit">Submit</button>
        </div>

      </div>
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>