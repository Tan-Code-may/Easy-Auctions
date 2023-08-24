<!DOCTYPE html>
<html>
<head>
    <style>
        .navbar-custom {
            background-color: #2B3F87;
        }

        .navbar-custom .navbar-brand {
            color: #FCC85D;
        }

        .navbar-custom .nav-link {
            color: white;
        }
        
        .navbar-custom .logout-link {
            color: #FF0000 !important;
        }
        
        .navbar-custom .dropdown-toggle {
            color: #FCC85D;
        }
        
        .navbar-custom .dropdown-menu {
            background-color: #2B3F87;
        }

        .navbar-custom .dropdown-item {
            color: #FCC85D;
        }
        
        .custom-btn-warning {
            background-color: #FCC85D; 
            color: #2B3F87; 
        }
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark navbar-custom animated fadeInDown">
		<div class="container">

			<a style="color: #FCC85D;" class="navbar-brand" href="index.php">
				<img style="max-width:50px; margin-top: -7px;" src="logo/auction.svg">&nbsp;
				Easy Auctions
			</a>
			<div align="center">
				<a class="btn custom-btn-warning" href="new_product.php">Add A Product For Bid</a>
			</div>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle text-warning" data-toggle="dropdown"><?php echo $row_c->name." ".$row_c->surname;?></a>
					<div class="dropdown-menu">
						<a href="view.php" class="text-warning dropdown-item ">View Profile</a>
						<a href="bid.php" class="text-warning dropdown-item ?>">Bids I made on Products</a>
						<a href="product.php" class="text-warning dropdown-item ">Products I put for Sale</a>
						<a href="got.php" class="text-warning dropdown-item ">Products You WON !</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link text-danger logout-link" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
</body>
</html>