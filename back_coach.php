<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <title>Career Coach Management</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">



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

    table {
      table-layout: fixed;
    }

    td {
      overflow: hidden;

      text-overflow: ellipsis;
    }

    .rich {
      white-space: nowrap;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../assets/dist/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">CCA Management</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Career Coach Management </span>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="/back_timeslot.php">
                  <span data-feather="file-text"></span>
                  Timeslot Management
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/back_coach.php">
                  <span data-feather="file-text"></span>
                  Coach Management
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/back_coach_create.php">
                  <span data-feather="file-text"></span>
                  Coach Create
                </a>
              </li>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="row">
          <div class="col-lg-8">
            <h2 style="padding: 20px;">Coaches Information Management </h2>
          </div>
          <div style="padding: 25px;" class="col-lg-4">
            <a data-toggle='modal' data-target='#createModal' class='btn align-middle btn-outline-success btn-sm pull-right'>Create Coach</a>
          </div>
        </div>

        <div class="table-responsive row">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th style="width: 160px;">Name</th>
                <th style="width: 80px;">Picture</th>
                <th class="col-md-3">Industries</th>
                <th class="col-md-8">Detail</th>
                <th class="col-md-1">Career</th>
                <th style="width: 150px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              //Ekko
              // Connect to the database
              $host = "localhost";
              $username = "root";
              $password = "root";
              $dbname = "cca";
              $conn = mysqli_connect($host, $username, $password, $dbname);

              // Check connection
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              // Retrieve coaches from the database
              $sql = "SELECT * FROM coach";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                  
                  echo "<tr>";
                  $encoded_img = base64_encode($row['img']);
                  echo "<td>" . $row["name"] . "</td>";
                  if (empty($row["img"])){
                    echo "<td>" . "<img style='width: 75px;height:75px;' src='/assets/resources/default.jpg' class='image rounded mx-auto d-block'>" . "</td>";
                  
                  }
                  else{
                    echo "<td>" . "<img style='width: 75px;height:75px;' src='data:" . $row["file_type"] . ";base64," . base64_encode($row["img"]) . "'  class='image rounded mx-auto d-block'>" . "</td>";
                  
                  }
                  echo "<td data-toggle='tooltip' data-placement='bottom' title='{$row["industries"]}'>" . $row["industries"] . "</td>";
                  echo "<td class='rich' data-toggle='tooltip' data-placement='bottom' title='{$row["detail"]}'>" . $row["detail"] . "</td>";
                  echo "<td class='rich' data-toggle='tooltip' data-placement='bottom' title='{$row["career"]}'>" . $row["career"] . "</td>";
                  //echo "<td><a class='btn btn-outline-primary btn-sm' href='back_edit_coach.php?name=" . $row["name"] . "'>Edit</a> <a class='btn btn-outline-danger btn-sm' href='back_delete.php?name=" . $row["name"] . "'>Delete</a></td>";
                  echo "<td><a data-toggle='modal' data-career = '{$row['career']}' data-nm='{$row['name']}'  data-det='{$row['detail']}' data-ind='{$row['industries']}' data-target='#editModal'  class='btn btn-outline-primary btn-sm'>Edit</a> <a onclick='javascript:return del_confirm();' class='btn btn-outline-danger btn-sm' href='back_delete.php?name=" . $row["name"]. "'>Delete</a></td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='6'>No coaches found.</td></tr>";
              }
              mysqli_close($conn);
              ?>
            </tbody>
          </table>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="back_update_coach.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">New message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group" hidden>
                    <label for="recipient-name" class="col-form-label"></label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Industries:</label>
                    <textarea rows="2" maxlength="100" class="form-control" id="industries" name="industries"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Details: </label>
                    <textarea rows="5" maxlength="1000" class="form-control" id="detail" name="detail"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Career: </label>
                    <textarea rows="5" maxlength="1000" class="form-control" id="career" name="career"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Update avatar:</label>
                    <input type="file" class="form-control-file" name="img" id="img" accept=".gif,.jpg,.jpeg,.png,.GIF,.JPG,.PNG">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Save">
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="back_create_coach.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">New message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Coach Name: </label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Industries:</label>
                    <textarea rows="2" maxlength="100" class="form-control" id="industries" name="industries"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Details: </label>
                    <textarea rows="5" maxlength="1000" class="form-control" id="detail" name="detail"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Career: </label>
                    <textarea rows="5" maxlength="1000" class="form-control" id="career" name="career"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Update avatar:</label>
                    <input type="file" class="form-control-file" name="img" id="img" accept=".gif,.jpg,.jpeg,.png,.GIF,.JPG,.PNG">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-success" value="Save">
                </div>
              </form>
            </div>
          </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>
          window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
        </script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="../assets/dist/js/dashboard.js"></script>

        <script>
          //author sunyt
          // func trigger modal
          $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nm = button.data('nm')
            var ind = button.data('ind')
            var career = button.data('career')
            var det = button.data('det')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Edit Coach: ' + nm)
            modal.find('.modal-body #name').val(nm)
            modal.find('.modal-body #industries').val(ind)
            modal.find('.modal-body #career').val(career)
            modal.find('.modal-body #detail').val(det)
          })

          function del_confirm() {
            var msg = "Are you sure to delete?";
            if (confirm(msg) == true) {
              return true;
            } else {
              return false;
            }
          }
        </script>


        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">


        <script>

        </script>
</body>

</html>