<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php require_once("includes/FormAppointmentInput.php"); ?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Fittness training, Nutrition" />
  <meta name="subject" content="Reps information of there customers" />
  <meta name="copyright" content="Lesawi Services CC" />
  <meta name="robots" content="index,follow" />
  <meta name="Classification" content="Business" />
  <meta name="author" content="Wim von Benecke, info@lesawi.co.za" />
  <meta name="designer" content="Wim von Benecke" />
  <meta name="reply-to" content="info@lesawi.co.za" />
  <meta name="owner" content="Wim von Benecke" />
  <title>Appointment Iput Form</title>
  <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://kit.fontawesome.com/5b7ab696fa.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- nav start -->
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="https://www.lesawi.co.za">Lesawi Services</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"></li>
          </ul>
          <form class="d-flex">
            <?php
            if (isset($_SESSION["UserId"])) {
              ?>
              <button class="btn btn-outline-danger mx-3" type="submit">
                <a href="Logout.php" class="text-danger" aria-current="page">
                  <i class="fas fa-user-times"></i> Log Out
                </a>
              </button>
            <?php } else { ?>
              <button class="btn btn-outline-success" type="submit">
                <a href="Index.php" class="text-success" aria-current="page">
                  <i class="fas fa-user"></i> Home
                </a>
              </button>
            <?php } ?>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <!-- nav end -->

  <!-- head start-->
  <div class="container">
    <div class="bg-dark text-white">
      <h1><i class="fa-solid fa-pen" style="color: #0000ff"></i> Appointment Input Form</h1>
    </div>
  </div>
  <!-- head end -->

  <!-- main area start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card bg-secondary mb-5">
          <?php
          echo ErrorMessage();
          echo SuccessMessage();
          ?>
          <div class="card-body">
            <form action="AppointmentInput.php" method="post">
              <div class="form-group">
                <label for="AppointmentDate">Appointment Date:
                  <span class="text-white">*
                    <small class="text-white">(Default equals today's date)</small></span>
                  <span class="text-danger bg-white">
                    <?php echo $AppointmentDateError; ?>
                  </span>
                </label>
                <input class="form-control" type="date" name="AppointmentDate">
              </div>
              <div class="form-group">
                <label for="CompName">Company Name:
                  <span class="text-white">*</span>
                  <span class="text-danger bg-white">
                    <?php echo $CompNameError; ?>
                  </span>
                </label>
                <input class="form-control" type="text" name="CompName">
              </div>
              <div class="form-group">
                <label for="Appointment">Appointment type:
                  <span class="text-white">*</span>
                  <span class="text-danger bg-white">
                    <?php echo $AppointmentError; ?>
                  </span>
                </label>
                <br>
                <select class="form-control" name="Appointment">
                  <option value="Unknown">--- Select an option ---</option>
                  <option value="Confirmed Appointment">Confirmed Appointment</option>
                  <option value="No Appointment">No Appointment</option>
                  <option value="Confirmed Assessment">Confirmed Assessment</option>
                  <option value="Confirmed Quote">Confirmed Quote</option>
                  <option value="Possible New Customer">Possible New Customer</option>
                  <option value="Possible Assessment">Possible Assessment</option>
                  <option value="Possible Quote">Possible Quote</option>
                  <option value="Courtesy Call">Courtesy Call</option>
                  <option value="Staff Visit">Staff Visit</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Comment" class="mb-1">Comments:
                  <sub class="text-white">These comments is only available from the appointments view.</sub>
                  <span class="text-danger bg-white">
                    <?php echo $CommentError; ?>
                  </span>
                </label>
                <textarea Class="form-control mb-3" name="Comment" rows="5" cols="25"></textarea>
              </div>
          </div>
        </div>
        <!-- buttons start -->
        <div class="form-group mb-3">
          <div class="text-center">
            <button class="btn btn-outline-success" type="button" name="BackToDashboard">
              <a href="Dashboard.php" class="text-success">
                <i class="fa fa-arrow-left"></i> Back to Dash Board
              </a>
            </button>
            <button class="btn btn-outline-danger mx-3" type="submit" name="Submit">
              <i class="fas fa-arrow-up"></i> Submit
            </button>
          </div>
        </div>
        <!-- buttons end -->
        </form>
      </div>
    </div>
  </div>
  <!-- main area end -->

  <!-- footer start -->
  <footer class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="lead text-center">Product of Lesawi Services | Cell: 061 525 0362 | <span id="year"></span> &copy;
            All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
  <script>
    document.getElementById("year").innerHTML = new Date().getFullYear();    
  </script>
</body>

</html>