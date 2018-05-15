<?php 
session_start();
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order Food</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
    <script type="text/javascript">
        function getOrders() {
    var pnr=document.getElementById('pnr').value;

    
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("odet").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "det.php?pnro="+pnr, true);
  xhttp.send();
}
      
        function showStop() {
    var pnr=document.getElementById('pnr').value;
        if(isNaN(pnr)){
      alert("Please Give Valid PNR Number");
    }
    else{

 
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("stop").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "det.php?pnr="+pnr, true);
  xhttp.send();
}
}
    </script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Order Food</a>
        <a class="btn btn-primary" href="orders.php">Orders</a>
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
           <?php 
          if(isset($_GET['m'])){
            if($_GET['m']=='sins'){
              echo '<h5>Inserted Successfully</h5>';
            }
          }
          ?>
            <h4>Enter your PNR number to know your order status</h4>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <!--<form>
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
                </div>
                </form>-->
                        <table class="table table-hover">
  <form action="validate.php" method="post">
  <tbody>

    <tr>
      <th>PNR No:</th>
      <td><input id="pnr" type="text" name="pnr" pattern="[0-9]{10}" title="Enter Valid PNR Number" required>
      <div id="gorder"><a onclick="getOrders();" class="btn btn-info">Get Orders</a></div></td>
    </tr>
       <tr>
      <th></th><th>Orders Details</th><th></th>
      
    </tr>
    <tr>
    <td></td><td></td><td></td>
       </tr>
       <!-- <tr>
      <th>Password:</th>
      <td><input title="To manage Items in future" type="Password" name="pass"></td>

    </tr>-->
  </tbody>
</form>
</table>
<div id="odet">Details will be Displayed HERE</div>
              </div>
            
          </div>
        </div>

      </div>
    </header>



    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
