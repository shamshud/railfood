<?php
session_start();
include '../db.php';

?>
<?php
if(isset($_GET['cat'])){
	//$cat=$_GET['cat'];
	//echo '<td><input type="text" placeholder="Enter Item name" name="item" required></td>';
	//echo '<input type="text" placeholder="Enter Item name" name="item" required>';
	     echo '
	     <table class="table table-hover">
      <tr><th>Item Name</th>
      <td><input type="text" placeholder="Enter Item name" name="item" required></td>
    </tr>
    <tr>
      <th>Price</th>
      <td><input type="number" placeholder="Enter Price" name="price" required></td>
      </tr>
         <tr>
      <th>Description</th>
      <td><input type="text" placeholder="Description" name="dsc" required></td>
      </tr>
      </table>
    ';
}
if(isset($_POST['itsub'])){
	$cat=$_POST['cat'];
	$item=$_POST['item'];
	$price=$_POST['price'];
	$dsc=$_POST['dsc'];
	$q=$mysqli->query("insert into item (item,cid,price,dsc) values('$item',$cat,'$price','$dsc')") or die($mysqli->error);
	if($q==1){
		header("Location:adit.php?m=sint");
	}
	else{
		header("Location:adit.php?m=nint");
	}
}
if(isset($_GET['a'])){
	if($_GET['a']=='del'){
		$id=$_GET['id'];
		$r=$mysqli->query("delete from item where id=$id");
		if($r==1){
			header("Location:remit.php");
		}
	}
}

if(isset($_POST['trnmsub'])){
	$train=$_POST['trnm'];
	$q=$mysqli->query("insert into train (name) values('$train')") or die($mysqli->error);
	if($q==1){
		header("Location:adtr.php?m=sint");
	}
	else{
		header("Location:adtr.php?m=nint");
	}
}

if(isset($_GET['trn'])){
	//$cat=$_GET['cat'];
	echo '<th>Stop Name</th>
		<td><input type="text" placeholder="Enter Stop Name" name="stop" required></td>';
	//echo '<input type="text" placeholder="Enter Item name" name="item" required>';
	    /* echo '
	     <table class="table table-hover">
      <tr><th>Item Name</th>
      <td><input type="text" placeholder="Enter Item name" name="item" required></td>
    </tr>
    <tr>
      <th>Price</th>
      <td><input type="number" placeholder="Enter Price" name="price" required></td>
      </tr>
         <tr>
      <th>Description</th>
      <td><input type="text" placeholder="Description" name="dsc" required></td>
      </tr>
      </table>
    ';*/
}

if(isset($_POST['trssub'])){
	$trid=$_POST['trn'];
	$stop=$_POST['stop'];
	
	$q=$mysqli->query("insert into stops (stop,tid) values('$stop',$trid)") or die($mysqli->error);
	if($q==1){
		header("Location:adtrs.php?m=sint");
	}
	else{
		header("Location:adtrs.php?m=nint");
	}
}

if(isset($_GET['trnst'])){
	//$cat=$_GET['cat'];
	//echo '<td><input type="text" placeholder="Enter Item name" name="item" required></td>';
	//echo '<input type="text" placeholder="Enter Item name" name="item" required>';
	     $s=$mysqli->query("select * from stops");
	     echo '
	     <table class="table table-hover">
      <tr><th>Select Stop</th>
      <td><select onchange="insPnr();" id="stop" name="stop" required>
      		<option value="selected" selected disabled>Select Stop</option>';
      		while($st=mysqli_fetch_array($s)){
      			echo '
      			<option value="'.$st['id'].'">'.$st['stop'].'</option>';
      		}
      	
      		echo '
</select></td>
    </tr>
    <tr>
      <th>PNR</th>
      <td><input type="number" placeholder="Enter PNR" name="pnr" required></td>
      </tr>

         <tr>
      <th>Date</th>
      <td><input type="date" placeholder="Date of Journey" name="date" required></td>
      </tr>
      </table>
    ';
}


if(isset($_POST['pnrsub'])){
	//$cat=$_GET['cat'];
	//echo '<td><input type="text" placeholder="Enter Item name" name="item" required></td>';
	//echo '<input type="text" placeholder="Enter Item name" name="item" required>';
	     $train=$_POST['trn'];
	     $stop=$_POST['stop'];
	     $pnr=$_POST['pnr'];
	     $date=$_POST['date'];
	     $in=$mysqli->query("insert into pnr (`tid`,`pnr`,`stid`,`date`) values($train,$pnr,$stop,'$date')") or die($mysqli->error);
	     if($in==1){
	     	header("Location:adpnr.php?m=sins");
	     }
	     else{
	     	header("Location:adpnr.php?m=nins");
	     }
}

if(isset($_GET['upd'])){
	$upd=$_GET['upd'];
	$id=$_GET['id'];
	$up=$mysqli->query("update orders set status='$upd' where id=$id") or die("Error updating");
	if($up==1){
		header("Location:updos.php?m=upds");
	}
	else{
		header("Location:updos.php?m=npds");
	}
}
?>