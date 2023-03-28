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

  <?php
  require "./navi.php";
  ?>

  <main role="main" class="container">
    
    <div class="reminder"> ** See the timetable and profile of career coaches <a class="introduction" target="_blank"
        href="https://www.cityu.edu.hk/sds/web/tpg/careerservice/cap/Career_Coaches_Timetable_Mar2023_v2.pdf">HERE</a>
      before choosing your preferred timeslot.</div>
    <div class="reminder"> ** origin <a class="introduction" target="_blank"
        href="https://cityuhk.questionpro.com/a/TakeSurvey?tt=XUT1Bc3X%2BesECHrPeIW9eQ%3D%3D">HERE</a></div>

    <div class="row">
      <div class="col-md-4">
        <?php
        // $month = date('m')

        
        require 'calendar.php';
        $calendar = build_calendar(3, 2023);
        $calendar = '<div>' . $calendar . '</div>';
        $calendar .= '<style type="text/css">table tbody tr td, table tbody tr th { text-align: center; }</style>';
        print($calendar);
        ?>
      </div>
      <?php
        require 'schedule.php';
        ?>
    </div>

  </main>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>