<?php
namespace Base;

use Illuminate\Database\Capsule\Manager as Database;

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$per_page = 6;

// get default products with pagination
// raw: select * from `tbl_products_a163495` order by `fld_product_name` asc limit ? offset ?
if(isset($_POST['submit'])){

  $_SESSION['query']['name'] = isset($_POST['name']) ? $_POST['name'] : '';
  $_SESSION['query']['brand'] = isset($_POST['brand']) ? $_POST['brand'] : '';
  $_SESSION['query']['type'] = isset($_POST['type']) ? $_POST['type'] : '';
}else{
  $_SESSION['query']['name'] = isset($_SESSION['query']['name']) ? $_SESSION['query']['name'] : '';
  $_SESSION['query']['brand'] = isset($_SESSION['query']['brand']) ? $_SESSION['query']['brand'] : '';
  $_SESSION['query']['type'] = isset($_SESSION['query']['type']) ? $_SESSION['query']['type'] : '';
}

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name|asc';
$sort_arr = explode('|', $sort);
$products = Database::table('tbl_products_a163495')
                    ->limit($per_page)
                    ->skip($per_page * ($page - 1))
                    ->orderBy('fld_product_'.$sort_arr[0], $sort_arr[1])
                    ->where(function($query){
                      if($_SESSION['query']['name'] !== ''){
                        $query->where('fld_product_name', 'LIKE', "%{$_SESSION['query']['name']}%");
                      }

                      if($_SESSION['query']['brand'] !== ''){
                        $query->orWhere('fld_product_brand', 'LIKE', "%{$_SESSION['query']['brand']}%");
                      }

                      if($_SESSION['query']['type'] !== ''){
                        $query->orWhere('fld_packaging_type', 'LIKE', "%{$_SESSION['query']['type']}%");
                      }
                    
                    })
                    ->get();

// get filtered products
if(isset($_GET['brand'])){
  $products = Database::table('tbl_products_a163495')->where('fld_product_brand', $_GET['brand'])->get();
}else if(isset($_GET['type'])){
  $products = Database::table('tbl_products_a163495')->where('fld_packaging_type', $_GET['type'])->get();
}

// get filterables attributes
$brands = Database::table('tbl_products_a163495')->select('fld_product_brand')->distinct()->get();
$pckg_types = Database::table('tbl_products_a163495')->select('fld_packaging_type')->distinct()->get();
$total_pages = ceil(Database::table('tbl_products_a163495')
                    ->orderBy('fld_product_'.$sort_arr[0], $sort_arr[1])
                    ->where(function($query){
                      if($_SESSION['query']['name'] !== ''){
                        $query->where('fld_product_name', 'LIKE', "%{$_SESSION['query']['name']}%");
                      }

                      if($_SESSION['query']['brand'] !== ''){
                        $query->orWhere('fld_product_brand', 'LIKE', "%{$_SESSION['query']['brand']}%");
                      }

                      if($_SESSION['query']['type'] !== ''){
                        $query->orWhere('fld_packaging_type', 'LIKE', "%{$_SESSION['query']['type']}%");
                      }
                    
                    })
                    ->count()/$per_page);

// get url
$base =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}".'?page=1';
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}?";