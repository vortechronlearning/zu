<?php
  include_once 'products_crud.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My Canned Drinks Ordering System : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

   <?php include_once 'nav_bar.php'; ?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <center>
        <h2>Create New Product</h2>
      </center>
      </div>
      


     <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID :</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>
        </div>
        </div>

     <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name :</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price :</label>
          <div class="col-sm-9">
          <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required>
        </div>
        </div>

      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand : </label>
          <div class="col-sm-9">
            <select name="brand" class="form-control" id="productbrand">
            <option value="">Please select</option>
        <option value="COCA COLA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="COLA") echo "selected"; ?>>COCA COLA</option>
        <option value="RIBENA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="RIBENA") echo "selected"; ?>>RIBENA</option>
        <option value="NESCAFE" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="NESCAFE") echo "selected"; ?>>NESCAFE</option>
        <option value="NESTLE" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="NESTLE") echo "selected"; ?>>NESTLE</option>
        <option value="F&N" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="FN") echo "selected"; ?>>F&N</option>
        <option value="YEO'S" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="YEO") echo "selected"; ?>>YEO'S</option>
        <option value="RED" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="RED") echo "selected"; ?>>RED BULL</option>
        <option value="MONSTER" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="MONSTER") echo "selected"; ?>>MONSTER</option>
        <option value="POKKA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="POKKA") echo "selected"; ?>>POKKA</option></select>
      </div>
        </div>    

        <div class="form-group">
          <label for="productvolume" class="col-sm-3 control-label">Volume :</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
      <input name="volume" id="productvolume" type="radio" value="240ML" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="240") echo "checked"; ?>> 240ml 
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="volume" id="productvolume" type="radio" value="250ML" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="250") echo "checked"; ?>> 250ml 
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="volume" id="productvolume" type="radio" value="300ML" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="300") echo "checked"; ?>> 300ml 
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="volume" id="productvolume" type="radio" value="325ML" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="325") echo "checked"; ?>> 325ml 
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="volume" id="productvolume" type="radio" value="330ML" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="330") echo "checked"; ?>> 330ml 
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="volume" id="productvolume" type="radio" value="355ML" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="355") echo "checked"; ?>> 355ml 
     </label>
            </div>
          </div>
      </div>

        <div class="form-group">
          <label for="packagingtype" class="col-sm-3 control-label">Packaging Type :</label>
          <div class="col-sm-9">
            <div class="radio">
            <label>
      <input name="packaging" type="radio" id="packagingtype" value="SHRINK WRAPPED" <?php if(isset($_GET['edit'])) if($editrow['fld_packaging_type']=="Shrink") echo "checked"; ?> required> SHRINK WRAPPED 
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="packaging" type="radio" id="packagingtype" value="CAN" <?php if(isset($_GET['edit'])) if($editrow['fld_packaging_type']=="can") echo "checked"; ?>> CAN 
      </label>
          </div> 
  </div>
        </div>  

       <div class="form-group">
          <label for="productq" class="col-sm-3 control-label">Quantity :</label>
          <div class="col-sm-9">
          <input name="quantity" type="number" class="form-control" id="productq" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>"  min="0" required>
        </div>
        </div>

        <center>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
      </div>
    </form>
    </div>
  </div>
</center>

<center>
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Brand</th>
        <th>Volume</th>
        <th>Packaging Type</th>
        <th>Quantity</th>
        <th></th>
      </tr>

      <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("select * from tbl_products_a163495 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_volume']; ?></td>
        <td><?php echo $readrow['fld_packaging_type']; ?></td>
        <td><?php echo $readrow['fld_product_quantity']; ?></td>
        <td>
           <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>

  </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a163495");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    </div>
  </center>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>