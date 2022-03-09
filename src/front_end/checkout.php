<?php
session_start();
// include('../classes/products_table.php');
// include('../classes/checkout_cls.php');
use App\products_table ;
use App\Checkout_cls ;

include('../vendor/autoload.php');
$detail = new checkout_cls();
$array = $detail->user_checkout_details($_SESSION['email']);
// print_r($arr[0]['email']);

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

      <div class="py-5 text-center">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <?php
            $cart_product = new products_table();
            $arr = $cart_product->cart();
            $html = '' ;
            foreach ($arr as $key => $val) {
                $html .= '<li class="list-group-item d-flex justify-content-between lh-sm">
              <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">'.$val['product_name'].'</h6>
              </div>
              <span class="text-muted">$'.$val['price'].'</span></li>';

            }
            echo $html ;

            ?>
            </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </form>
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate method = "POST" , action = "ajax_cart.php">
            <div class="row g-3">
              


              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" id="username" name = "username"  value= <?php echo $array[0]['full_name'] ;?>>
                  <div class="invalid-feedback">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" name = "email" value ="<?php echo $array[0]['email']; ?>">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
                <div class="col-sm-6">
                <label for="address" class="form-label">address</label>
                <input type="text" class="form-control" id="address" placeholder="" name = "address" required>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="col-sm-6">
                <label for="zipcode" class="form-label">zip code</label>
                <input type="number" class="form-control" id="zipcode" placeholder="" name = "zipcode" required>
                <div class="invalid-feedback">
                </div>
              </div>

<div class="form-check">
  <input type="checkbox" class="form-check-input" id="save-info">
  <label class="form-check-label" for="save-info">Save this information for next time</label>
</div>

<hr class="my-4">

<h4 class="mb-3">Payment</h4>

<div class="my-3">
  <div class="form-check">
    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" value = "credit_card" checked required>
    <label class="form-check-label" for="credit">Credit card</label>
  </div>
  <div class="form-check">
    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" value = "debit_card" required>
    <label class="form-check-label" for="debit">Debit card</label>
  </div>
  <div class="form-check">
    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" value = "paypal" required>
    <label class="form-check-label" for="paypal">PayPal</label>
  </div>
</div>




            <hr class="my-4">

            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>

          
            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required name = "name_on_card">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>

              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required name = "card_number">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>

              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required name = "expiry">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>

              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required name = "cvv">
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" name = "place_order">Place Order</button>
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
  <script src="./assets/js/form-validation.js"></script>
</body>

</html>