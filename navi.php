 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand">CityU CCA</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <?php
      
      //remember to add tags when adding new web pages
      $pages=array("/index.php"=>"Appointment","/profile.php"=>"Profile","/coach_profile.php"=>"Coaches");
      foreach ($pages as $key => $value){
        if ($_SERVER['PHP_SELF'] == $key){
          print("<li class='nav-item active'>");
          print("<a class='nav-link' href='".$key."'>".$value." <span class='sr-only'>(current)</span></a>");
        }
        else{
          print("<li class='nav-item'>");
          print("<a class='nav-link' href='".$key."'>".$value."</a>");
        }
        print("</li>");
      }
      ?>
      <!--<li class="nav-item active">
        <a class="nav-link" href="/index.php">Appointment <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>-->
    </ul>
    <!--<form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    <span class="navbar-text">
    Welcome! 
    <?php 
    session_start();
    // how you get session which is a public variable
    if ($_SESSION["admin"] == false){
      echo("Student: ");
    } 
    else {
      echo("Teacher: ");
      } 
      echo($_SESSION["username"]);?>
    </span>
  </div>

</nav>

