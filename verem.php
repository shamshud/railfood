<?php
session_start();
include 'db.php';

?>
<?php
if(isset($_GET['email'])){
	$email=$_GET['email'];
	$_SESSION['email']=$email;
		$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
		$_SESSION['valcode']=$s;
		if(isset($_SESSION['valcode'])){
			header("Location:mail/mail.php?q=vcode");
		}
}
if(isset($_GET['vcode'])){
	$vcode=$_SESSION['valcode'];
	$uvcode=$_GET['vcode'];
	if($vcode==$uvcode){
		$_SESSION['ever']="1";
		echo '
		<button class="btn btn-success" disabled>Verified<span class="glyphicon glyphicon-ok"></span></button>';
	}
	else{
		$_SESSION['ever']="0";
		echo '
		<button class="btn btn-danger" disabled>Invalid OTP<span class="glyphicon glyphicon-ok"></span></button>
		<p>Try Again.!</p>
		<div id="validate"><a onclick="verEmail();" class="btn btn-info">Verify Again</a></div>
		';

	}
}
?>