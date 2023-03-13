
<!DOCTYPE html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CityU Career Coach appointment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/navbar-fixed/">

    

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
    <link href="../assets/dist/css/navbar-top-fixed.css" rel="stylesheet">
    <link href="../assets/dist/css/cca.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">CityU CCA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Appointment <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main" class="container">
  <div class = "reminder"> ** See the timetable and profile of career coaches <a class = "introduction" target="_blank" href="https://www.cityu.edu.hk/sds/web/tpg/careerservice/cap/Career_Coaches_Timetable_Mar2023_v2.pdf">HERE</a> before choosing your preferred timeslot.</div>
  <div class = "reminder"> ** origin <a class = "introduction" target="_blank" href="https://cityuhk.questionpro.com/a/TakeSurvey?tt=XUT1Bc3X%2BesECHrPeIW9eQ%3D%3D">HERE</a></div>

      <div class = "row">
 <div class="col-md-4">
    <?php
    require 'calendar.php';
    print $calendar;
    ?>
  </div>
  
    
<table class="table col-md-8">
<caption id = "tbs">Time Slot</caption>
<tr>
  <td>Amy Leung</td>
  <td>09:30 - 10:15</td>
  <td>10:15 - 11:00</td>
  <td>11:00 - 11:45</td>
</tr>
<tr>
  <td>Steve Man</td>
  <td>11:45 - 12:30</td>
  <td>12:30 - 13:15</td>
  <td>14:00 - 14:45</td>
  <td>14:45 - 15:30</td>
</tr>
<tr>
  <td>Winnie Lee</td>
  <td>15:30 - 16:15</td>
  <td>16:15 - 17:00</td>
  <td>17:00 - 17:45</td>
</tr>
</table>
</div>

</main>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
