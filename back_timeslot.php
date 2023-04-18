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
      white-space: nowrap;
      text-overflow: ellipsis;
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
            <h2 style="padding: 20px;">Timeslots Management </h2>
          </div>
          <div style="padding: 25px;" class="col-lg-4">
            <a data-toggle='modal' data-target='#createModal' class='btn align-middle btn-outline-success btn-sm pull-right'>Create Timeslot</a>
          </div>
        </div>
        <div class="table-responsive row">


          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <!--<th>Date/Timeslot</th>-->
                <th>Book Date</th>
                <th>Timeslot</th>
                <th>Coach</th>
                <th>Booker</th>
                <th>Last Modify Time</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
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

              // Retrieve timeslots from the database
              $sql = "SELECT * FROM timeslots";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  //echo "<td>" . $row["date_timeslot"] . "</td>";
                  echo "<td>" . $row["book_date"] . "</td>";
                  echo "<td>" . $row["timeslot"] . "</td>";
                  echo "<td>" . $row["coach"] . "</td>";
                  echo "<td>" . $row["booker"] . "</td>";
                  echo "<td>" . $row["last_modify_time"] . "</td>";
                  //echo "<td><a target='_blank' class='btn btn-outline-primary btn-sm' href='back_timeslot_edit.php?date_timeslot=" . $row["date_timeslot"] . "'>Edit</a> <a class='btn btn-outline-danger btn-sm' href='back_delete.php?date_timeslot=" . $row["date_timeslot"] . "'>Delete</a></td>";
                  echo "<td><a data-toggle='modal' data-ts='{$row["date_timeslot"]}' data-bk='{$row["booker"]}' data-cc='{$row["coach"]}' data-target='#editModal'  class='btn btn-outline-primary btn-sm'>Edit</a> <a onclick='javascript:return del_confirm();' class='btn btn-outline-danger btn-sm' href='back_delete.php?date_timeslot=" . $row["date_timeslot"] . "'>Delete</a></td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='7'>No timeslots found.</td></tr>";
              }

              mysqli_close($conn);
              ?>
            </tbody>
          </table>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="back_update_timeslot.php" method="post">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">New message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form-group" hidden>
                    <label for="recipient-name" class="col-form-label"></label>
                    <input type="text" class="form-control" name="date_timeslot" id="date_timeslot">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Booker:</label>
                    <input type="text" class="form-control" id="booker" name="booker">
                  </div>
                  <div class="">
                    <label for="recipient-name" class="form-select">Coach:</label>

                    <select id="coach" name="coach">

                      <?php
                      // Connect to the database  <input type="text" class="form-control" id="cc">
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
                      $sql = "SELECT name FROM coach";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                          if ($row["name"] == $coach) {
                            echo "<option value='" . $row["name"] . "' selected>" . $row["name"] . "</option>";
                          } else {
                            echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                          }
                        }
                      } else {
                        echo "<option value=''>No coaches found.</option>";
                      }

                      mysqli_close($conn);
                      ?>
                    </select>
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
              <form action="back_create_timeslot.php" method="post" onsubmit="return selectVaild()">
                <div class="modal-header">


                  <h5 class="modal-title" id="createModalLabel">Create Timeslot</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Date (Click to select date): </label>
                    <input class="form-control" type="text" id="datepicker" name="date" onfocus="this.blur();" required>
                  </div>

                  <div class="form-group">
                    <input class="form-control" type="text" id="alternate" name="book_date" hidden>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Timeslot: </label>

                    <div class="form-check">
                      <input class="form-check-input" value="0930" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">09:30 - 10:15</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1015" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">10:15 - 11:00</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1100" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">11:00 - 11:45</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1145" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">11:45 - 12:30</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1230" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">12:30 - 13:15</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1400" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">14:00 - 14:45</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1445" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">14:45 - 15:30</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1530" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">15:30 - 16:15</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1615" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">16:15 - 17:00</label>

                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1700" type="checkbox" name="timeslots[]" onclick="return checkCount(this)" /><label class="form-check-label" for="flexCheckDefault">17:00 - 17:45</label>

                    </div>
                    <input type="button" name="selectall" value="Select All" onclick="checkboxed('timeslots[]')" />
                    <input type="button" name="selectnone" value="Select None" onclick="uncheckboxed('timeslots[]')" />

                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="form-label">Coach:</label>
                    <select class="form-select" id="coach" name="coach">

                      <?php
                      // Connect to the database  <input type="text" class="form-control" id="cc">
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
                      $sql = "SELECT name FROM coach";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                      } else {
                        echo "<option value=''>No coaches found.</option>";
                      }

                      mysqli_close($conn);
                      ?>
                    </select>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-success" value="Create" id ="submitc">
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
            var ts = button.data('ts')
            var cc = button.data('cc')
            var bk = button.data('bk')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Edit timeslot: ' + ts)
            modal.find('.modal-body #date_timeslot').val(ts)
            modal.find('.modal-body #coach').val(cc)
            modal.find('.modal-body #bk').val(bk)
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
          //author sunyt
          // func datepicker init
          $(function() {
            $("#datepicker").datepicker({
              showButtonPanel: true,
              changeMonth: true,
              changeYear: true,
              altField: "#alternate",
              altFormat: "yymmd",
              minDate: 1,
              editable: false
            });

          });
        </script>
        <script type="text/javascript">
          //author sunyt
          // func at least 1 timeslot
          var checkedCount = 0;

          function checkCount(obj) {
            if (obj.checked === true) {
              checkedCount++;
            } else {
              checkedCount--;
            }

            return true

          }

          function selectVaild() {
            if (checkedCount == 0) {
              alert("Select at least one timeslot");
              return false;
            }
            return true;
          }
          //author sunyt
          // func select all/none
          function checkboxed(objName) {
            var objNameList = document.getElementsByName(objName);
            checkedCount = 10;
            if (null != objNameList) {
              for (var i = 0; i < objNameList.length; i++) {
                objNameList[i].checked = "checked";
              }
            }
          }

          function uncheckboxed(objName) {
            var objNameList = document.getElementsByName(objName);
            checkedCount = 0;
            if (null != objNameList) {
              for (var i = 0; i < objNameList.length; i++) {
                objNameList[i].checked = "";
              }
            }
          }
        </script>
        <script>

        </script>
</body>

</html>