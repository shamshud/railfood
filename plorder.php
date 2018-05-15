<?php
session_start();
include 'db.php';

?>
<?php

if(isset($_POST['submit'])){
$pnr=$_SESSION['pnr'];
$ever=$_SESSION['ever'];
$email=$_POST['email'];
$non=$_POST['non'];
$cno=$_POST['cno'];
$cvv=$_POST['cvv'];
$edate=$_POST['edate'];
$amt=$_SESSION['tot'];
$tid=substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);

$q=$mysqli->query("select * from cart where pnr=$pnr");
while($ca=mysqli_fetch_array($q)){
	$cait=$ca['iid'];
	$qty=$ca['qty'];
	$it=$mysqli->query("select * from item where id=$cait");
		while($ite=mysqli_fetch_array($it)){
			$item=$ite['item'];
		$oins=$mysqli->query("insert into orders (`pnr`,`email`,`item`,`qty`,`status`) values($pnr,'$email','$item',$qty,'Received')");
	}
}
		if($oins==1){
			$oq=$mysqli->query("select * from orders where pnr=$pnr order by date desc");
			$oqu=mysqli_fetch_array($oq);
			$oid=$oqu['id'];
			$tins=$mysqli->query("insert into trans (`tid`,`pnr`,`oid`,`non`,`cno`,`cvv`,`edate`,`amount`) values('$tid','$pnr','$oid','$non','$cno','$cvv','$edate',$amt)");
			if($tins==1){
			$dq=$mysqli->query("delete from cart where pnr=$pnr");
		}
		header("Location:index.php?ins=s");
		}
		}
	
	

?>