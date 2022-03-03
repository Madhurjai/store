<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>    

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">


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
    <link href="./assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="POST" action = "index.php">
    <h1 class="h3 mb-3 fw-normal">Sign up</h1>

    <!-- <div class="form-floating">
      <input type="number" class="form-control" id="floatingInput" placeholder="user id" name = "user_id">
      <label for="floatingInput">user_id</label> -->

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="full name" name = "full_name">
      <label for="floatingInput">full name</label>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name = "email">
      <label for="floatingInput">Email address</label>

    
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="re-Password" name = "re_pass">
      <label for="floatingPassword">RE-Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
      <?php 
  if($_GET['correct'] == 1 ){
      $err = "<p style = 'color : red ;'>password not match !!</p>";
      echo "$err";
    }
      ?>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name = "submit">Sign in</button>
    <a href="login.php" class="h5 text-primary pt-4" style = "text-decoration :none ;">login</a>
    
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
  </form>
</main>
  </body>
  </html>
 