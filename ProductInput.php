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
  <title>Product Input Form</title>
  <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://kit.fontawesome.com/5b7ab696fa.js" crossorigin="anonymous"></script>
  <style>
    tr {
      border: 1px #000 solid;
    }

    td {
      border: 1px #000 solid;
    }
  </style>
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
    <div class="bg-dark text-white" style="height: 10px;"></div>
  </div>
  <!-- nav end -->

  <!-- head start-->
  <div class="container mb-3">
    <div class="bg-dark text-white pb-2">
      <h1><i class="fa-brands fa-product-hunt" style="color: #0000ff"></i> &nbsp;Product Input Form</h1>
    </div>
  </div>
  <!-- head end -->

  <!-- main start  -->
  <div class="container">
    <div class="row">
      <!-- input products start -->
      <div class="col-lg-6 offset-3">
        <form action="ProductInput.php" method="post">
          <div class="card bg-secondary">
            <div class="card-body">
              <div class="form-group">
                <label for="Supplier">Supplier:</label>
                <input type="text" name="Supplier" class="form-control">
              </div>
              <div class="form-group">
                <label for="Description">Description:</label>
                <input type="text" name="Description" class="form-control">
              </div>
              <div class="form-group">
                <label for="ItemCode">Item Code:</label>
                <input type="Unit" name="ItemCode" class="form-control">
              </div>
              <div class="form-group">
                <label for="Unit">Unit:</label>
                <input type="Unit" name="Unit" class="form-control">
              </div>
              <div class="form-group">
                <label for="Qty">Quantity:</label>
                <input type="Unit" name="Qty" class="form-control">
              </div>
              <div class="form-group">
                <label for="UnitPrice">Unit price: (Excluding vat/tax)</label>
                <input type="Unit" name="UnitPrice" class="form-control">
              </div>
              <div class="d-grid">
                <button type="submit" name="Submit" class="btn btn-success mt-3" value="">
                  <i class="fa fa-arrow-up" style="color: #0000ff; font-size: 23px;"></i>
                  &nbsp; Submit
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- input products end -->

      <!-- button i -->
      <!-- <i class="fa fa-arrow-up" style="color: #0000ff; font-size: 23px;"></i> -->
      <div class="mt-5">
        <h2>List of products</h2>
      </div>
      <div class="col-lg-8 offset-2">
        <div class="card bg-secondry mb-3">
          <div class="card-body">
            <table class="table table striped hover" border="5">
              <thead>
                <tr>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                  <td>test</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- show all products end  -->
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