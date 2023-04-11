<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CityU Career Coach appointment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
<!--     
author sunyt
func login form → /signin_model.php
-->
<form class="form-signin" action="/signin_model.php" method="post">
  <img class="mb-4" src="cityu.png" alt="cityu_logo" width="300" height="85">
  <h1 class="h3 mb-3 font-weight-normal">Career Coach Appointment</h1>
  <label for="inputEmail" class="sr-only">Student Number</label>
  <input type="number" name="snumber" class="form-control" placeholder="Student Number" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="spwd" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
  </div>
  <button class="btn btn-lg btn-block" type="submit" style="background-color: #BF165E; color:white">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; Group CCA CS5281 2023 </p>
</form>


    
  </body>
</html>
