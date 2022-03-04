

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
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.html">
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
            <a class="nav-link" href="products.html">
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
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
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
   
      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody class = "parent">
          <?php 
    include('classes/DB.php');
    // include('classes/User.php');
    // include('classes/user_verify.php');
    include('classes/admin_dash.php');
    if(isset($_GET['login_type'])){
      $user_data = new admin_dash();
      $arr = $user_data->verify_user();
      $html = "";
      foreach( new RecursiveArrayIterator($arr->fetchAll()) as $k=>$v) {
        // print_r($v);
        $html .= "<tr><td>".$v['user_id']."</td>
        <td>".$v['full_name']."
        </td><td>".$v['email']."</td><td>".$v['role']."</td>
        <td> ";
        if($v['status'] == 'restricted'){

         $html .=  "<button class='btn btn-success' id ='approved' name = 'approve' data-approve_id = ".$v['user_id'].">approved</button>";
        }
        else{
         $html .=  "<button class='btn btn-primary' id ='restrict' name = 'restrict' data-res_id = ".$v['user_id'].">restrict</button>";}
        
        $html .= "<button type='button' class='btn btn-danger' id = 'delete' name = 'delete' data-del_id = ".$v['user_id'].">delete</button>
        <button type='button' class='btn btn-warning' id = 'edit' name = 'edit'>edit</button></td></tr>";

      }
      $html .= "</tbody></table>";
      echo $html ;
      // print_r($arr);
    }
    

?>
      </div>
    </main>
  </div>
</div>

</body>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <script>
  $('.table-responsive').on('click','#approved',function(e){
    e.preventDefault();
    console.log("hello");
    $val = $(this).data('approve_id');
    console.log($val,"approved");
      $.ajax({
           'method':"POST",
           'url':"ajax.php",
           'data':{'status_approve':$val},
          //  datatype :"JSON",
      }).done(function(response){
           location.reload();
      });
  });



  $('.table-responsive').on('click','#restrict',function(e){
    e.preventDefault();
    console.log("restricted");
    $val = $(this).data('res_id');
    console.log($val);
      $.ajax({
           'method':"POST",
           'url':"ajax.php",
           'data':{'status_restrict':$val},
      }).done(function(response){
           location.reload();
          // console.log(response);
      });
  });
  $('.table-responsive').on('click','#delete',function(e){
    e.preventDefault();
    console.log("delete");
    $val = $(this).data('del_id');
    console.log($val);
      $.ajax({
           'method':"POST",
           'url':"ajax.php",
           'data':{'del_user':$val},
      }).done(function(response){
           location.reload();
          // console.log(response);
      });
  });
    </script>
  
</html>