<?php
namespace Base;

use Illuminate\Database\Capsule\Manager as Database;

include_once 'database.php';
include_once 'catalogue_controller.php';

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
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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

    <div class="container" id="workspace">
      <h1 class="text-center font-hairline mt-6 gradient-text">Catalogue</h1>
      <h5 class="text-center my-6 pb-6 text-grey-dark">Manage and Organize your products.</h5>

      <?php if($_SESSION['query']['name'] == '' && $_SESSION['query']['brand'] == '' && $_SESSION['query']['type'] == ''): ?>
      
      <?php else: ?>
      <div class="text-center py-2">
        <p class="badge" href="">Name: <?= $_SESSION['query']['name'] ?></p>
        <p class="badge" href="">Brand: <?= $_SESSION['query']['brand'] ?></p>
        <p class="badge" href="">Type: <?= $_SESSION['query']['type'] ?></p>
        <p class="btn btn-primary text-md" @click="reset">Reset</p>
      </div>
      <?php endif ?>

      <!-- Filter and sort section -->
      <nav class="navbar navbar-default bg-white ">
        <div class="container">
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter by Brand <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $base?>">All</a></li>
                  <?php foreach($brands as $brand) : ?>
                  <li><a href="<?php echo $url . 'brand='.$brand['fld_product_brand']?>"><?= $brand['fld_product_brand'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter by Packaging Type <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $base?>">All</a></li>
                  <?php foreach($pckg_types as $type) : ?>
                  <li><a href="<?php echo $url . 'type='.$type['fld_packaging_type']?>"><?= $type['fld_packaging_type'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sort <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $base.'&sort=name|asc' ?>">Name, A to Z</a></li>
                  <li><a href="<?php echo $base.'&sort=name|desc' ?>">Name, Z to A</a></li>
                  <li><a href="<?php echo $base.'&sort=volume|asc' ?>">Volume, Low to High</a></li>
                  <li><a href="<?php echo $base.'&sort=volume|desc' ?>">Volume, High to Low</a></li>
                  <li><a href="<?php echo $base.'&sort=quantity|asc' ?>">Can, Low to High</a></li>
                  <li><a href="<?php echo $base.'&sort=quantity|desc' ?>">Can, High to Low</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <!-- Products display section -->
      <div class="row pt-1">
        <?php foreach($products as $product) : ?>
          <div class="col-md-4">
            <div class="panel panel-default shadow">
              <div class="panel-body">
                <a href="products_details.php?pid=<?= $product['fld_product_id'] ?>" >
                  <img src="products/<?= $product['fld_product_image'] ?>" alt="..." width="600" height="400" class="img-rounded">
                </a>

                <div class="p-3 font-sans font-hairline">
                  <a href="products_details.php?pid=<?= $product['fld_product_id'] ?>" class="text-3xl block"><?= $product['fld_product_name'] ?>
                    <span class="float-right badge ml-1"><?= $product['fld_product_volume'] ?></span>
                    <span class="float-right badge"><?= $product['fld_product_quantity'] ?></span>
                  </a>
                  <a href="products_details.php?pid=<?= $product['fld_product_id'] ?>"  class="text-5xl leading-none"><?= $product['fld_product_price'] ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <?php if(isset($_GET['brand']) || isset($_GET['type'])) : ?>

      <?php elseif(count($products) == 0) : ?>

      <?php else: ?>

      <!-- Pagination section -->
      <nav aria-label="Page navigation" class="text-center">
        <ul class="pagination">
          <?php for($temp = 1; $temp <= $total_pages; ++$temp) : ?>
          <li class="<?php echo $temp == $page ? 'active' : ''?>"><a href="<?= $url ?>page=<?= $temp ?>&sort=<?= $sort ?>"><?= $temp ?></a></li>
          <?php endfor ?>
        </ul>
      </nav>

      <?php endif ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.11/vue.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
      new Vue({
        el: '#workspace',

        methods: {
          reset: function(){
            window.location.href = 'search_reset.php';
          }
        }
      })
    </script>
  </body>
  </html>