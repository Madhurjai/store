<?php
session_start();
// include('../classes/products_table.php');
use App\products_table ;

include('../vendor/autoload.php');

$user_data = new products_table();
$limit = 5 ;
if(isset($_GET['page'])){
  $page_no = $_GET['page'] ;
}
else{
  $page_no = 1;
}
$offset = ($page_no -1)*$limit ;
$_SESSION['print'] = $user_data->product_store($offset);

// $email = $_GET['email'];
if (isset($_GET['email'])) {
    $_SESSION['email'] = $_GET['email'] ;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Home · Bootstrap v5.1</title>


  <!-- Bootstrap core CSS -->
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>

<body>

  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
       
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Cart</h4>
            <p class="text-muted">Cart is empty now.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="../admin/index.php" class="btn btn-primary">login</a></li>
              <li><a href="logout.php" class="btn btn-secondary">logout</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
    
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" />
          </svg>
          <strong>Shop</strong>
          <a>cart</a>
            <?php
            if (isset($_GET['email'])){
                echo '<a href="checkout.php?email:'.$_SESSION['email'].'" class="btn btn-secondary">checkout</a>';
                echo '<a href="cart.php?email:'.$_SESSION['email'].'" class="btn btn-secondary">cart</a>';
          }?>
          <!-- <a href="checkout.php?email:<?php  echo $email ?>" class="btn btn-secondary">checkout</a> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
        <?php
        if(isset($_GET['placed'])) {
        echo  "<p class='bg-success text-white'>your order is placed .</p>" ;
      } ?>
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">My Shop</h1>
          <?php if (isset($_SESSION['email'])) {
          // $email = $_GET['email'];
          echo "hello " . $_SESSION['email'];
        } else {
          $_SESSION['start'] = false ;
          echo "<strong class = 'text-danger'>please login first</strong>";
        } ?>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Shop Now</a>
            <a href="#" class="btn btn-secondary my-2">Subscribe</a>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container overflow-hidden">
        <form class="row row-cols-lg-auto align-items-center mt-0 mb-3" action="ajax_cart.php" method="POST">
          <div class="col-lg-6 col-12">
            <label class="visually-hidden" for="inlineFormInputGroupUsername">Search</label>
            <div class="input-group">
              <input type="text" class="form-control" name="input" placeholder="Product, SKU, Category">
            </div>
          </div>

          <div class="col-lg-3 col-12">
            <label class="visually-hidden" for="inlineFormSelectPref">Sort By</label>
            <select class="form-select" id="inlineFormSelectPref" name="select">
              <option selected>Sort By</option>
              <option value="1">Price</option>
            </select>
          </div>

          <div class="col-lg-3 col-12">
            <button type="submit" class="btn btn-primary w-100" id="search" name="search">Search</button>
          </div>
        </form>
      </div>
      <div class="container">


        <?php
        //  include('../classes/DB.php');
        if ($_SESSION['print_arr'] == true) {

          echo display($_SESSION['print_arr']);
        } else {
          echo display($_SESSION['print']);
        }



        ?>
        <!-- display_product(data) -->

        <div class="col">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
                $count = $user_data->number_of_row();
                // print_r($count);
                $pages = ceil($count/$limit);
                if($page_no > 1){
                  $val = $page_no -1 ;
                  $temp  .= ' <li class="page-item"><a class="page-link" href="index.php?page='.$val.'">Previous</a></li>';
                }
                for($i = 1 ; $i <= $pages ; $i++){
                    $temp .= '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($pages > $page_no){
                  $val = $page_no + 1;
                  $temp .= '<li class="page-item"><a class="page-link" href="index.php?page='.$val.'">Next</a></li> ';
                }
                echo $temp ;
               ?>
              <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
              <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li> -->
              <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
          </nav>
        </div>

      </div>
    </div>
    </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">&copy; CEDCOSS Technologies</p>
    </div>
  </footer>


  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    $(document).ready(function(){
      function load_page(page){
            $.ajax({
              'url':'ajax_cart.php',
              'method':"POST",
              'data':{'page_no':page}
            })
      }

    })
  </script>

</body>

</html>
<?php
function display($arr)
{
  // print_r($arr);
  $html = '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
  foreach ($arr as $k => $v) {

    $html .= '  
            <div class="col">
             <div class="card shadow-sm">
             <img src = "../image_upload/' . $v['image'] . '" width = "100%" height = "225">
               <div class="card-body">
      <h5><a href = "single-product.html" class="btn btn-primary">' . $v['name'] . '</a></h5>
    <p class="card-text">Sample text below</p>
    <div class="d-flex justify-content-between align-items-center">
      <p><strong>' . $v['price'] . '</strong>&nbsp;<del><small class="link-danger"></small></del></p>
      <a href = "cart.php?pro_id=' . $v['product_id'] . '" class="btn btn-primary" >Add To Cart</a>
    </div>
  </div>
</div>
</div>';
  }
  $html .= '</div>';
  return  $html;
} ?>