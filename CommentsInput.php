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
  <title>Comments Input Form</title>
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
          <form class="d-flex" role="search">
            <button class="btn btn-outline-danger" type="submit">Logon</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!-- head start-->
  <div class="container">
    <div class="bg-dark text-white">
      <h1><i class="fa fa-comment" style="color: #0000ff"></i> Comments Input Form</h1>
    </div>
  </div>
  <!-- head end -->

  <!-- nav end -->
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form action="CommentsInput.php" method="post">
          <div class="card bg-secondary">
            <div class="card-body">
              <div class="form-group">
                <label for="CustomerNumber">Customer Account Number:</label>
                <select class="form-control" name="CustomerNumber" id="">
                  <option value=""></option>
                  <option value="">abc001</option>
                  <option value="">bdc002</option>
                  <option value="">cbc002</option>
                  <option value="">dbc002</option>
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="Comment">Comments:</label>
                <textarea class="form-control" name="Comment" id="" cols="30" rows="8"></textarea>
              </div>
              <div class="d-flex">
                <button class="btn btn-success form-control mt-4" name="SearchButton">
                  <i class="fa fa-arrow-left" style="color: #0000ff; font-size: 23px;"></i>
                  &nbsp; Back to Dashboard
                </button>
                <button class="btn btn-danger form-control mt-4" name="SearchButton">
                  <i class="fa fa-arrow-up" style="color: #0000ff; font-size: 23px;"></i>
                  &nbsp; Submit
                </button>
              </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  <br>
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