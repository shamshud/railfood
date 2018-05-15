<?php
session_start();
include '../db.php';
if(isset($_POST['submit'])){
	$unm=$_POST['unm'];
	$pwd=$_POST['pass'];
	$qu=$mysqli->query("select * from admin where unm='$unm' and pwd='$pwd' ") or die("Error querying credentials ADMIN");
	//$qui=mysqli_fetch_array($qu);
	echo $count=$qu->num_rows;
	if($count>0){
		$_SESSION['unm']=$unm;
		header("Location:home.php");

	}
	else{
		header("Location:index.php?m=wrong");
	}
}
?>