
<?php 
//create connection credentials
$db_host="localhost";
$db_name="food1";
$db_user="root";
$db_pass="shamshu726372";

//mysqli object
$mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name) or die("Error connecting database");

//Error Handler
if($mysqli->connect_error){
		printf("Connect failed : %s\n",$mysqli->connect_error);
		exit();
}
?>
