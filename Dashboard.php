<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login()
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
  <title>Dashboard</title>
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
                <a href="Login.php" class="text-success" aria-current="page">
                  <i class="fas fa-user"></i> Log In
                </a>
              </button>
            <?php } ?>
          </form>
        </div>
      </div>
    </nav>
    <div class="bg-dark text-white" style="height: 10px;"></div>
  </div>
  <!-- nav end -->

  <!-- head start-->
  <div class="container">
    <div class="bg-dark text-white">
      <h1>Dashboard</h1>
    </div>
  </div>
  <!-- head end -->

  <!-- main area start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h1>Rep Name</h1>
      </div>
      <div class="col-lg-6">
        <h1>Rep Company</h1>
      </div>
      <div class="col-lg-4">
        <!-- temp place holders to be replaced with nav bar at top and info below -->
        <a href="Login.php">
          <p>Log In</p>
        </a><br>
        <a href="CompanyInput.php">
          <p>Company Input</p>
        </a><br>
        <a href="RepInput.php">
          <p>Rep Input</p>
        </a><br>
        <a href="VehicleInput.php">
          <p>Vehicle Input</p>
        </a><br>
      </div>
      <div class="col-lg-4">
        <!-- temp place holders to be replaced with nav bar at top and info below -->
        <a href="CustomerInput.php">
          <p>Customer Input</p>
        </a><br>
        <p>Dashboard</p><br>
        <p>Home Page</p><br>
        <p>Log In Page</p><br>
      </div>
      <div class="col-lg-4">
        <!-- temp place holders to be replaced with nav bar at top and info below -->
        <p>Product Input</p><br>
        <p>Rep Input</p><br>
        <p>Trave Log Book</p><br>
        <p>Vehicle Input</p><br>
      </div>
    </div>
  </div>
  <!-- main area end -->

  <!-- footer start -->
  <div class="container">
    <footer class="bg-dark text-white">
      <div class="row">
        <div class="col">
          <p class="lead text-center">Product of Lesawi Services | Cell: 061 525 0362 | <span id="year"></span> &copy;
            All rights reserved.</p>
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