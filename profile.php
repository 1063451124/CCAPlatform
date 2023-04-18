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
  session_start();
  require "./navi.php";
  require 'profile_model.php';
  $userinfo = get_profile($_SESSION["username"])[0];
  ?>

  <main role="main" class="container align-middle">
    <div class="reminder"> ** See the timetable and profile of career coaches <a class="introduction" target="_blank" href="https://www.cityu.edu.hk/sds/web/tpg/careerservice/cap/Career_Coaches_Timetable_Mar2023_v2.pdf">HERE</a>
      before choosing your preferred timeslot.</div>
    <div class="reminder"> ** origin <a class="introduction" target="_blank" href="https://cityuhk.questionpro.com/a/TakeSurvey?tt=XUT1Bc3X%2BesECHrPeIW9eQ%3D%3D">HERE</a></div>
    <div class="reminder">Profile last modified at: <?php echo ($userinfo['last_modify_time']); ?> </a></div>

    <!--
    By:duyulin 
    profile要求填写的信息  
    -->

    <form method="post" action="profile_model.php" onsubmit="return check();" enctype="multipart/form-data">
      <div class="form-group">
        <label>First Name </label>
        <input type="text" class="form-control" name="FirstName" value="<?php echo ($userinfo['first_name']); ?>" placeholder="" required>
      </div>

      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="LastName" value="<?php echo ($userinfo['last_name']); ?>" required>
      </div>

      <!--
      <div class="form-group">
        <label>Student ID</label>
        <input type="text" class="form-control" id="StudentID" value="<?php echo ($userinfo['first_name']); ?>" required>
      </div>
         -->

      <div class="form-group">
        <label>HK Mobile</label>
        <input type="text" class="form-control" name="HKMobile" id="HKMobile" value="<?php echo ($userinfo['hk_mobile_no']); ?>" required>
      </div>
      <div class="form-group">
        <label>CityU Email Address</label>
        <input type="email" class="form-control" name="CityUEmail" value="<?php echo ($userinfo['cityu_email']); ?>" required>
      </div>

      <div class="form-group">
        <label>Update your CV</label>
        <input type="file" class="form-control-file" name="CV" id="CV" accept=".gif,.jpg,.jpeg,.png,.GIF,.JPG,.PNG" value="<?php $userinfo["cv"]; ?>">
        <?php
        //print_r($userinfo);
        echo "<img src='data:" . $userinfo["file_type"] . ";base64," . base64_encode($userinfo["cv"]) . "'  class='image rounded mx-auto d-block'>";
        ?>
      </div>

      <div class="form-group">
        <label>Desired work destination after graduation</label><br>
        <select name="destination" required>
          <?php
          $x = array("Hong Kong", "Mainland China", "Macao", "Taiwan", "Not Sure");
          foreach ($x as $value) {
            if ($value == $userinfo['work_location']) {
              echo "<option value='" . $value . "' selected>$value</option>";
            } else {
              echo "<option value='" . $value . "' >$value</option>";
            }
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Purpose of the consultation</label><br>
        <select name="purpose" required>
          <?php
          $x = array(
            "CV and Cover Letter Review", "Career Planning", "Interview Skills", "Job application advertising",
            "Career Direction", "Job Search Techniques", "Professional Development"
          );
          foreach ($x as $value) {
            if ($value == $userinfo['purpose']) {
              echo "<option value='" . $value . "' selected>$value</option>";
            } else {
              echo "<option value='" . $value . "' >$value</option>";
            }
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Wechat ID (Optional)</label>
        <input type="text" class="form-control" name="WechatID" value="<?php echo ($userinfo['wechat_id']); ?>">
      </div>
      <input type="submit" name="action" value="Update">


    </form>
  </main>

  <script>
    // author
    //func
    function check() {
      alert("Are you sure to submit?");
      var p = /^\d{8}$/;
      var hkmobileno = document.getElementById('HKMobile').value;
      if (!p.test(hkmobileno)) {
        alert("Error mobile format, please check.");
        //return false;
      }
      //author sunyt
      //func verify file format
      var files = document.getElementById('CV').files;
      var fileSize = 0;
      if (files.length != 0) {
        fileSize = files[0].size / 1024 / 1024;
      }
      if (fileSize > 5) {
        alert("File not larger than 5M, please check.");
        return false;
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>