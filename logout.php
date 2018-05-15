<?php 
session_start();

if(isset($_SESSION['pnr'])){
	session_destroy();
	header("Location:index.php");

}
else{
	header("Location:index.php");
}
?>