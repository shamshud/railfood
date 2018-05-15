<?php
session_start();
include 'db.php';
?>
<?php 
if(isset($_GET['qty'])){
	if($_GET['qty']=='p'){
		$caid=$_GET['caid'];
		$q=$mysqli->query("update cart set qty=qty+1 where id=$caid");
		$q=$mysqli->query("update cart set total=qty*price where id=$caid");
		if($q==1){

			header("Location:cart.php");
		}

	}
		if($_GET['qty']=='m'){
		$caid=$_GET['caid'];
		$q=$mysqli->query("update cart set qty=qty-1 where id=$caid");
		$q=$mysqli->query("update cart set total=qty*price where id=$caid");
		if($q==1){
			header("Location:cart.php");
		}

	}
}
if(isset($_GET['remi'])){
	if($_GET['remi']=='y'){
	$caid=$_GET['id'];
	$q=$mysqli->query("delete from cart where id=$caid") or die("error removing item from cart");
	if($q==1){
		header("Location:cart.php");
	}
}
}
?>
