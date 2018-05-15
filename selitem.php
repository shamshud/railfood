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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
    <script type="text/javascript">
       function getStatus() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("status").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "paystatus.php?q=status", true);
  xhttp.send();
}
    </script>
  </head>

  <body>
      <?php 
        $user=$_SESSION['pnr'];
        ?>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Order Food</a>
       <a class="btn btn-primary" href="cart.php">Cart <?php $c=$mysqli->query("select * from cart where pnr=$user");
                                                              $co=$c->num_rows;
                                                              echo '['.$co.']';?> <span class="glyphicon glyphicon-shopping-cart"></span></a>
           <ul class="nav navbar-nav navbar-right">
     
      <!--<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>-->

          <li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $user ?>
        </a>        <ul class="dropdown-menu">
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          
        </ul>
        </li>
   </ul>
       <!--<ul><b>User PNR: </b><strong> <?php echo $_SESSION['pnr']; ?><span class="caret"></span><li> </strong>-->
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <!--<h1 class="mb-5">Order your food on the Go!</h1>-->
            <h4>Choose Menu to Order</h4><br>
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
                        <table class="table">
  <form action="itemc.php" method="post">
  <tbody>

  <?php 
  
  $q=$mysqli->query("select * from cat");
  while($qui=mysqli_fetch_array($q)){
$id=0;
    echo ' <tr><td></td><td></td><td></td><td><h5>Category: '.$qui['cat'].'</h5></td><td></td></tr>';
    echo '<tr>
      <td>Id</td>
      <td>Item</td>
      <td>Price</td>
      <td>Description</td>
      <td>Select Items</td>
      </tr>';
      $cid=$qui['id'];
    $i=$mysqli->query("select * from item where cid=$cid");
    while($it=mysqli_fetch_array($i)){
      $id=$id+1;
      echo '<tr>
      
      <td>'.$id.'</td>
      <td>'.$it['item'].'</td>
      <td>'.$it['price'].'</td>
      <td>'.$it['dsc'].'</td>
      <td><input type="checkbox" name="item_list[]" value="'.$it['id'].'"</td>
    </tr>';

    }

  
  }
       ?>
      



        <tr>
      <th></th>
      <td></td><td></td><td><input type="submit" name="submit" value="submit" class="btn btn-success"></td>
    </tr>
  </tbody>
</form>
</table>
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
