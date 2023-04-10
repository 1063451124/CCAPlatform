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
    /* 
       //////////////////////////////////////
      //author: steven
      //function: color 
      //////////////////////////////////////
     */
    .available {
    background-color: #c3e6cb; 
    }
    .booked{
      background-color: #dc3545; 
    }
    .coach_name:hover {
  background-color: #6c757dbf; 
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
        href="/coach_profile.php">HERE</a>
      before choosing your preferred timeslot.</div>

    <div class="reminder"> ** origin <a class="introduction" target="_blank"
        href="https://cityuhk.questionpro.com/a/TakeSurvey?tt=XUT1Bc3X%2BesECHrPeIW9eQ%3D%3D">HERE</a></div>
    

          
        <div class="reminder">
        <div class="row">
            <div class="col-md-2" style="align-items: center;">Select Year:</div>
            <select id ="year" class="form-select col-md-2" aria-label="Default select example">
            <option value='2023' selected>2023</option>
            <option value='2024'>2024</option>
            </select>

            <div class="col-md-2" style="align-items: center;" >Select Month:</div>

            <select id ="month" class="form-select col-md-2" aria-label="Default select example">
            <?php
                $current_month = date('m');
                for ($month = 1; $month <= 12; $month++) {
                  if ($month == $current_month) {
                  echo "<option value='{$month}' selected>{$month}</option>";
                  } else {
                  echo "<option value='{$month}'>{$month}</option>";
                  }  
                }
            ?>
            </select>
            <div class="col-md-1">
            <button type="button" class="gomonth btn btn-secondary">GO</button>
            </div>
          </div>
    </div>





    <div class="row">

      <div class="col-md-4">
        <?php
      //////////////////////////////////////
      //author: sunyt
      //function: render calendar
      //////////////////////////////////////

        // $month = date('m') 
        $day_time = isset($_GET['day']) ? $_GET['day'] : "01"; 
        $month_time = isset($_GET['month']) ? $_GET['month'] : "03"; 
        $year_time = isset($_GET['year']) ? $_GET['year'] : "2023"; 
        
        require 'calendar.php';
        $calendar = build_calendar($month_time, $year_time);
        $calendar = '<div>' . $calendar . '</div>';
        $calendar .= '<style type="text/css">table tbody tr td, table tbody tr th { text-align: center; }</style>';
        print($calendar);
        ?>
      </div>
      <?php
      //////////////////////////////////////
      //author: LIN
      //function: show timeslot
      //////////////////////////////////////
        require 'schedule.php';
        $timeslot = build_timeslot($day_time, $month_time , $year_time );
        #$timeslot = '<div>' . $timeslot . '</div>';
        #$timeslot .= '<style type="text/css">table tbody tr td, table tbody tr th { text-align: center; }</style>';
        print($timeslot);
        ?>
    </div>

  </main>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
   
  <script>
    /*
     //////////////////////////////////////
      //author: sunyt
      //function: update calendar
      //////////////////////////////////////
*/
$('.gomonth').on("click",function(){
var year = $("#year").val();
var month = $("#month").val();
  window.location.href = "/index.php?year="+year+"&month="+month;
})

    /*
     //////////////////////////////////////
      //author: steven
      //function: update schedule
      //////////////////////////////////////
*/
  $('.day').on("click",function(){
  var cell_value = $(this).text();

  cell_value = (cell_value.length >= 2) ? cell_value : "0"+cell_value ;
  window.location.href = '/index.php?day='+cell_value ;
}
  )
      /*
     //////////////////////////////////////
      //author: steven
      //function: go to coach's page
      //////////////////////////////////////
*/
  $('.coach_name').on("click",function(){
  var cell_value = $(this).text();
  var space_value = cell_value.replaceAll(" ","_");
  var dash_value = space_value.replaceAll(",","_");
 
  window.location.href = '/coach_profile.php#'+dash_value ;
}
  )

  </script>


</body>

</html>