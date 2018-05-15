<?php
session_start();
include 'db.php';

?>
<?php 
if(isset($_POST['pnr'])){
	$pnr=$_POST['pnr'];
	$stop=$_POST['stop'];

	$p=$mysqli->query("select * from pnr where pnr=$pnr") or die("Error Querying pnr");
	$c=$p->num_rows;
	if($c==1){
	$_SESSION['pnr']=$pnr;
	$_SESSION['stop']=$stop;
		if(isset($_SESSION['pnr'])){
			header("Location:selitem.php");
		}
	}
	else{
		header("Location.php?m=invpnr");
	}

}
else{
	echo '<h5>Don`t you ever try</h5>';
	header("Refresh:0; url=index.php");
}
?>