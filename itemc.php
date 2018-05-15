<?php
session_start();
include 'db.php';

?>
<?php
$pnr=$_SESSION['pnr'];
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['item_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['item_list'] as $selected){
	$qu=$mysqli->query("select * from item where id=$selected");
	while($que=mysqli_fetch_array($qu)){
		$iid=$selected;
		$price=$que['price'];
		$in=$mysqli->query("insert into cart (`pnr`,`iid`,`price`,`total`) values($pnr,$iid,$price,$price)");
	}
//echo $selected."</br>";
}
header("Location:cart.php");
}
}
?>