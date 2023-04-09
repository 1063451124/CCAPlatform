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

  <main role="main" class="container align-middle">
  <div class="reminder"> ** See the timetable and profile of career coaches <a class="introduction" target="_blank"
        href="https://www.cityu.edu.hk/sds/web/tpg/careerservice/cap/Career_Coaches_Timetable_Mar2023_v2.pdf">HERE</a>
      before choosing your preferred timeslot.</div>
    <div class="reminder"> ** origin <a class="introduction" target="_blank"
        href="https://cityuhk.questionpro.com/a/TakeSurvey?tt=XUT1Bc3X%2BesECHrPeIW9eQ%3D%3D">HERE</a></div>

    <!--
    By:duyulin 
    profile要求填写的信息
    -->

    <form action="http://www.abc.com/" method="get">
      <div class="form-group">
        <label for="formGroupExampleInput" class="control-label" >First Name </label>
        <input type="text" class="form-control" id="#" placeholder="" required>
      </div>

      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" id="LastName" required>
      </div>
      <div class="form-group">
        <label>Student ID</label>
        <input type="text" class="form-control" id="StudentID" required>
      </div>
      <div class="form-group">
        <label>HK Mobile</label>
        <input type="text" class="form-control" id="HKMobile" required>
      </div>
      <div class="form-group">
        <label>CityU Email Address</label>
        <input type="email" class="form-control" id="CityU Email Address" required>
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Update your CV</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>


      <div class="form-group">
        <label>Prefer date</label><br>
        <select name="date" required>
         <option value="27 March 2023(Monday)">27 March 2023(Monday)</option>
         <option value="30 March 2023(Thursday)">30 March 2023(Thursday)</option>
        </select>
      </div>

    <!--
    By:duyulin 
    checkbox 多选但至少选一个功能未实现
    -->
      <div class="form-group">
        <label>Prefer timeslot (You may choose more than one timeslot)</label>
        <input type="checkbox" class="form-control" name="timeslot" value="1">09:30 - 10:15
      </div>

      <div class="form-group">
        <label>Desired work destination after graduation</label><br>
        <select name="destination" required>
         <option value="HongKong">HongKong</option>
         <option value="Mainland China">Mainland China</option>
         <option value="Macao">Macao</option>
         <option value="Taiwan">Taiwan</option>
         <option value="Notsure">Not sure</option>
        </select>
      </div>
      <div class="form-group">
        <label>Purpose of the consultation</label><br>
        <select name="purpose" required>
         <option value="1">CV and Cover Letter Review</option>
         <option value="2">Career Planning</option>
         <option value="3">Interview Skills</option>
         <option value="4">Job application advertising</option>
         <option value="5">Career Direction</option>
         <option value="6">Job Search Techniques</option>
         <option value="7">Professional Development</option>
        </select>
      </div>
      <div class="form-group">
        <label>Wechat ID (Optional)</label>
        <input type="text" class="form-control" id="WechatID" >
      </div>
      <input type="submit" value="Done">


    </form>

  </main>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>