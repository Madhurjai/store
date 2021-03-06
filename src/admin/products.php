<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


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

    
    <!-- Custom styles for this template -->
    <link href="./assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../front_end/logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin/dashboard.php?login_type=1">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <form class="row row-cols-lg-auto g-3 align-items-center">
        <div class="col-12">
          <label class="visually-hidden" for="inlineFormInputGroupUsername">Search</label>
          <div class="input-group">
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Enter id,name...">
          </div>
         
        </div>
      
        
      
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
        <div class="col-12">
          <a class="btn btn-success" href="add_product.php">Add Product</a>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              //  include('../classes/DB.php');
              //  include('../classes/products_table.php');
              use App\products_table ;

               include('../vendor/autoload.php');
                $user_data = new products_table();
                $limit = 5 ;
                if(isset($_GET['page'])){
                  $page_no = $_GET['page'] ;  
                }
                else{
                  $page_no = 1 ;
                }
                $offset = ($page_no -1)*$limit ;
                $arr = $user_data->product_store($offset);
                $html = "";
                foreach($arr as $k=>$v) {
                  // print_r($v);
                  $html .= "<tr><td>".$v['product_id']."</td>
                  <td>".$v['name']."
                  </td><td>".$v['price']."</td>
                  <td><img src = '../image_upload/".$v['image']."' width = '100' height = '100'> </td>
                  <td> <button type='button' class='btn btn-danger' id = 'delete' name = 'delete' data-del_id = ".$v['product_id'].">delete</button>
                  <a  href = 'add_product.php?id=".$v['product_id']."' class='btn btn-warning' id = 'edit' name = 'edit' data-edit_id = ".$v['product_id'].">edit</a></td></tr>";
                }
                
                $html .= "</tbody></table>";
                echo $html ;
                // print_r($arr);
              
              
          
          ?>



      
          </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
              <?php 
              $count = $user_data->number_of_row();
              // print_r($count);
              if($count >0){
              $pages = ceil($count/$limit); 
              $html = '' ;
              if($page_no > 1){
                $val = $page_no -1 ;
                $html .= '<li class="page-item"><a class="page-link" href="products.php?page='.$val.'">Previous</a></li>' ;
              }
               for($i =1 ; $i <= $pages ; $i++){
                  $html .= '<li class="page-item"><a class="page-link" href="products.php?page='.$i.'">'.$i.'</a></li>' ;

               } 
               if($pages > $page_no){
                $val = $page_no +1 ;
                $html .= '<li class="page-item"><a class="page-link" href="products.php?page='.$val.'">next</a></li>' ;
               }
               echo $html ;}?>
              <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li> -->
              <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
          </nav>
      </div>
    </main>
  </div>
</div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      //  $('.table-responsive').on('click', "#edit", function(){
      // $id = $(this).data('edit_id');
      // console.log($id);
      // // header("location: add_product.php") ;
      // $.ajax({
      //      'method':"POST",
      //      'url':"ajax.php",
      //      'data':{'edit_product':$id},
      // }).done(function(response){
      //     //  location.reload();
      //     // console.log(response);
      // });

      
  // });
      $('.table-responsive').on('click','#delete',function(e){
    e.preventDefault();
    console.log("delete");
    $val = $(this).data('del_id');
    console.log($val);
      $.ajax({
           'method':"POST",
           'url':"ajax.php",
           'data':{'del_product':$val},
      }).done(function(response){
           location.reload();
          // console.log(response);
      });
  });
 
 
    </script>
  </body>
</html>