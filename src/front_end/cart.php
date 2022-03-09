<?php
// include('../classes/products_table.php');
use App\products_table ;

include('../vendor/autoload.php');
$product = new products_table();
if (isset($_GET['pro_id'])) {
    $id = $_GET['pro_id'];
    $item = $product->add_to_cart($id);
    $cart_id = $item['product_id'];
    $cart_name = $item['name'];
    $cart_price = $item['price'];
    $val = $product->cart();

    if (sizeof($val) > 0) {
        foreach ($val as $key => $v) {
      if ($v['product_id'] == $id) {
        // print_r($v['product_id']);
        // print_r($id);
        $quantity = $v['quantity'] + 1;
        $product->update_quantity($quantity, $id);
        break;
      } else {
        $quantity = 1;
        $total = $quantity * $cart_price;
        $product->insert_into_cart($cart_id, $cart_name, $cart_price, $quantity, $total);
      }
    }
  } else {
    $quantity = 1;
    $total = $quantity * $cart_price;
    $product->insert_into_cart($cart_id, $cart_name, $cart_price, $quantity, $total);
  }
  // header("location: cart.php");

}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Checkout example · Bootstrap v5.1</title>


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

<body class="bg-light">

  <div class="container">
    <main>
    <a href="logout.php" class="btn btn-secondary">logout</a>
    <a href="index.php" class="btn btn-secondary">home</a>
      <div class="py-5 text-center">
        <h2>Cart</h2>
      </div>

      <div class="row g-5">
        <div class="col order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <table class="table">
            <tr>
              <th>Product id</th>
              <th>Product name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>update</th>
              <th>Total</th>
            </tr>
            <?php
            //$product = new products_table();
            $val = $product->cart();
            // print($val);


            $html = '';
            foreach ($val as $key => $v) {
              $html .= "<tr><td>" . $v['product_id'] . "</td><td>" . $v['product_name'] . "</td>
              <td>" . $v['price'] . "</td>
              <td>" . $v['quantity'] . "</td>
              <td><input type = 'number' class = 'w-20' id = '" . $v['product_id'] . "'>
              <button class='btn btn-secondary ms-1 w-20' id = 'submit'  data-id = '" . $v['product_id'] . "'>update</button>
              <button class='btn btn-secondary ms-1 w-20' id = 'remove'  data-del_id = '" . $v['product_id'] . "'>remove</button>
              </td>
                    <td>" . $v['price'] * $v['quantity'] . "</td></tr>";
            }
            echo $html;
            // header("location: cart.php");

            ?>
            <!--            
            <tr>
                <td>Soccer</td>
                <td>$100</td>
                <td>
                    <input type="text" class="w-20">
                    <input type="button" class="btn btn-secondary ms-1 w-20" value="update">
                    <a href="#" class="link-danger">Remove</a>
                </td>
                <td>$120</td>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>$100</td>
                <td><input type="text" class="w-20">
                    <input type="button" class="btn btn-secondary ms-1 w-20" value="update">
                    <a href="#" class="link-danger">Remove</a></td>
                <td>$120</td>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>$100</td>
                <td><input type="text" class="w-20">
                    <input type="button" class="btn btn-secondary ms-1 w-20" value="update">
                    <a href="#" class="link-danger">Remove</a>
                </td>
                <td>$120</td>
            </tr> -->
            <tfoot>
              <tr>
                <td colspan="4" class="text-end">$1000</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row g-5 align-items-right">
        <div class="col-3">
          <form>
            <a href="login_check.php">Checkout</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2017–2021 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>


  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- <script src="./assets/js/form-validation.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

  </script>
  <script>
    $(".table").on('click', '#submit', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var val = $('#' + id).val();

      // console.log(val);
      // $val = ("#input").val();
      $.ajax({
        'method': "POST",
        'url': 'ajax_cart.php',
        'data': {
          'id': id,
          'value': val
        }
      }).done(function(response) {
        location.reload();
        // console.log(response);
      })

    })
    $(".table").on('click', '#remove', function(e) {
      e.preventDefault();
      var id = $(this).data('del_id');

      $.ajax({
        'method': "POST",
        'url': 'ajax_cart.php',
        'data': {
          'del_id': id
        }
      }).done(function(response) {
        location.reload();
        // console.log(response);
      })

    })
  </script>
</body>

</html>