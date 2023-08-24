<?php 
session_start();
include('db.php');



if(isset($_SESSION['admin_login'])) {
    $row_c = $_SESSION['admin_login'];
}


if (isset($_REQUEST['sid'])) {
  	$sid = $_REQUEST['sid'];
  	$status = $_REQUEST['status'];
  	$pro_id = $_REQUEST['pro_id'];
  	if ($status == "Enable") {
  		$update = "Disable";
  	} else {
  		$update = "Enable";
  	}
  	$query2 = "update tbl_product set status = '$update' where pro_id = '$pro_id' ";
  	$con->query($query2);
  	header("location:product.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
	body {
    /* background-image: url(2255.jpg); */
    background-repeat: no-repeat;
    background-size: cover;
}
div
{
  margin: 20px;
  font-size: 25px;
}
a
{
  margin: 20px;
  font-size: 25px;
}
tr:nth-child(odd) {
	background-color: lightgray;
}

tr:nth-child(even) {
	background-color: lightblue;
}

tr:nth-child(1) {
	background-color: #007bff;
	color: white;
}

.right {
    position: absolute;
    top: 0;
    right: 0;
	margin: 0;
	margin-right: 20px;
}

.admin_home {
    text-align: center; 
    margin-top: 20px;
}
</style>
<body>

	<?php
    if (isset($_SESSION['admin_login'])) {
        ?>
        <div class="right">
			<a class="btn btn-outline-danger" href="logout.php">LOGOUT</a>
        </div>
        <?php
    }
    ?>
	<br>
	<form method="post">
		<table class="mt-5 mb-3" align="center" cellspacing="0" cellpadding="7" width="65%">
			<tr align="center">
				<th>Product ID</th>
				<th>Name</th>
				 <th>Seller Id</th>
				<th>Price by Seller</th>
                <th>Total Bids</th>
				<th>Description</th>
				<th>Status</th>
                <th>Selling Price </th>
				 <th colspan="2">Buyer Id </th>
				
			</tr>
			<?php
            $query1 = "select * from tbl_product";
            $run_q1 = $con->query($query1);
            while ($row_q1 = $run_q1->fetch_object()) {
            ?>		
 			<tr align="center">
 				<td><?php echo $row_q1->pro_id; ?></td>

 				<td><?php echo $row_q1->name; ?></td>
				<td><?php echo $row_q1->uid; ?></td>
 				<td><?php echo $row_q1->price; ?></td>

                <?php
                $query3 = "select * from tbl_bid where pro_id = $row_q1->pro_id ORDER BY bid_amount DESC";
                $run_q3 = $con->query($query3);
                $row_q3 = $run_q3->fetch_object();
				$nub = $run_q3->num_rows;
                ?>
			
                <td><?php echo $num_rows = $run_q3->num_rows; ?></td>
 				<td><?php echo $row_q1->description; ?></td>
                <td><?php echo $row_q1->status; ?></td>

				<?php if($nub>0){?>
				<td><?php echo $row_q3->bid_amount; ?></td>
				<?php }else {?>
				<td><?php echo "Not yet bidded"; ?></td>
				<?php } ?>
				
				
				
				<?php if($nub>0){ ?>
				<?php $query4 = "select * from tbl_purchase where bid_id = $row_q3->bid_id";
                $run_q4 = $con->query($query4);
                $row_q4 = $run_q4->fetch_object(); 
				$nub1 = $run_q4->num_rows;
				?>
				<?php if($nub1>0){?>
				<td><?php echo $row_q4->buyer_id; ?></td>
				<?php }else {?>
				<td><?php echo "Bid going on"; ?></td>
				<?php } ?>
				
				<?php } else {?>
				<td><?php echo "Not yet Bidded"; ?></td>
				<?php } ?>
 			</tr>
            <?php 
            }
            ?>
		</table>
	</form>
    <?php
    if (isset($_SESSION['admin_login'])) {
        ?>
        <div class="admin_home">
            <a class="btn btn-outline-primary" href="admin_home.php">Go to Admin Home Page</a>
        </div>
        <?php
    }
    ?>
</body>
</html>