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
    .name {
        font-size: 20px;
        padding-top: 20px;
        font-family:"Times New Roman", Times, serif;

    }
    .container {
        display: flex;
        align-items: flex-end;
        justify-content: left
    }
    p{
        font-family:"Times New Roman", Times, serif;
        font-size: 25px;
    }
    h4{
        font-family:"Times New Roman", Times, serif;
    }
    hr {
        /*border: none;
        height: 1px;
        /* Set the hr color 
        color: #333;  /* old IE 
        background-color: #333;  /* Modern Browsers
        margin-top: 50px;
        margin-bottom: 50px;
        border-top: 1px solid black;*/
        display: inline-block;
        width: 100%;
        height: 1px;
        border-top: 1px solid black;
    }

  </style>


  <!-- Custom styles for this template -->
  <link href="../assets/dist/css/navbar-top-fixed.css" rel="stylesheet">
  <link href="../assets/dist/css/cca.css" rel="stylesheet">
</head>

<body>
    <!--<a class="introduction" target="_blank" href="/index.php">GO to make an appointment!</a>-->
    <div class='container'><a href="https://www.cityu.edu.hk/" target="_blank"> <img  src="cityu.png" alt="City University" height=100></a></div>
    <center>
        <h2><u>Career Coach Profile</u></h2>
    </center>
    <hr>

  <?php
  require "./navi.php";
  ?>

  <main role="main" class="container">



    <div class="row">

        <?php
            //////////////////////////////////////
            //author: LIN
            //function:build coach profile
            //////////////////////////////////////

            function build_coach_profile(){
                
                require_once('coach_profile_model.php');
                $coach_list = get_coach_profile();
                $profile = "";

                foreach ($coach_list as $key => $value){
                    $dash_name = str_replace(" " , "_", $value['name']);
                    $dash_name = str_replace("," , "_", $dash_name);
                    $pic_str = "<img src='data:image/png;base64,".base64_encode($value["img"])."'  class='image rounded mx-auto d-block'>";
                    $profile .= "<div class='row' id='{$dash_name}'>";
                    $profile .= "<div class='image col-md-4'>";
                    $profile .= "<div>{$pic_str}</div>";
                    $profile .= "</div>";
                    $profile .= "<div class='info col-md-6'>";
                    $profile .= "<div class='name'><h3> <b>{$value["name"]}</b></h3></div>";
                    $profile .= "<h4><i>{$value["career"]}</i></h4>";
                    $profile .= "<p><b>Familiar industries and job function: </b><br>{$value["industries"]}</p>";
                    //$profile .= "<br><br>";
                    $style_str = 'style="font-size: 22px;"';
                    
                    $profile .= "</div>";
                    $profile .= "</div>";
                    $profile .= "<p {$style_str}>{$value["detail"]}</p>";
                    $profile .= "<br>";

                    #$profile .="<br><br>";
                    $profile .= "<hr>";

                }
                return $profile;
            }
            $coach_profile = build_coach_profile();
            print($coach_profile);
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

    

