<?php 
session_start();
include('db.php');

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
    //print_r($row_c);
}

if (!isset($_SESSION['user'])) {
    header("location:index.php");
}

 

if (isset($_REQUEST['final'])) {
	$bid_id = $_REQUEST['bid_id'];
	$query1 = "insert into tbl_purchase (bid_id) values ($bid_id);";
	$con->query($query1);

	$query2 = "select * from tbl_bid where bid_id = '$bid_id'; ";
	$run_q2 = $con->query($query2);
	$row_q2 = $run_q2->fetch_object();
	print_r($row_q2);

	$query3 = "update tbl_product set status = 'Sold' where pro_id = '$row_q2->pro_id';";
	$con->query($query3);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
body {
    background-image: url(1920x1200-data_out_12_164084632-blur-wallpapers.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

.bg-nav {
    /*background-color: rgba(24, 44, 97, .6);
    background-color:  rgba(179, 55, 113, .6);*/
    background-color: rgba(87, 75, 144, .6);
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 5;
}
</style>
<body>
	<?php include 'nav.php'; ?>
<br>
<br>
	<a href="?final='true'">FINAL</a>
</body>
</html>