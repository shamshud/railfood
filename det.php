<?php
session_start();
include 'db.php';

if(isset($_GET['tid'])){
	$tid=$_GET['tid'];
	$qu=$mysqli->query("select * from stops where tid=$tid");
	echo '<select name="stop" id="stop">';
	while($qui=mysqli_fetch_array($qu)){
		echo '<option value="'.$qui['stop'].'">'.$qui['stop'].'</option>';
	}
	echo '</select>';
}
if(isset($_GET['pnr'])){
	$pnr=$_GET['pnr'];
	$qu=$mysqli->query("select * from pnr where pnr=$pnr");
	$count=$qu->num_rows;
	if($count>0){
		$qui=mysqli_fetch_array($qu);
		$stid=$qui['stid'];
		$st=$mysqli->query("select * from stops where id=$stid");
		$sto=mysqli_fetch_array($st);
		$stop=$sto['stop'];
		//$_SESSION['vpnr']=1;
		echo '<table class="table table-hover"><tbody><tr><td>Stop</td><td>';
		echo '<input disabled type="text" value="'.$stop.'">';
		echo '<input type="hidden" name="stop" value="'.$stop.'">';
		echo '</td></tr>
		<tr>
      <th></th>
      <td><input class="btn btn-success" type="Submit" name="submit"></td>
    </tr>
    </tbody>
    </table>';
	}
	else{
		$_SESSION['vpnr']=0;
		echo 'Invalid PNR Number';
	}
}
if(isset($_GET['pnro'])){
	$pnr=$_GET['pnro'];
	$i=0;
	echo '
	<table class="table table-hover">
	<tr>
	<td>S.No</td>
	<td>Item</td>
	<td>Quantity</td>
	<td>Status</td>
	<td>Ordered on</td></tr> ';

	$qu=$mysqli->query("select * from orders where pnr=$pnr");
		while($qui=mysqli_fetch_array($qu)){
			$i=$i+1;
		echo '
		<tr>
		<td>'.$i.'</td>
		<td>'.$qui['item'].'</td>
		<td>'.$qui['qty'].'</td>
		<td>'.$qui['status'].'</td>
		<td>'.$qui['date'].'</td></tr>';

		}
		echo '</table>';
		
	}


?>