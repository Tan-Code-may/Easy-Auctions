<?php 
session_start();
include('db.php');
include('pro_table_check.php');


if(isset($_SESSION['admin_login'])) {
    $row_c = $_SESSION['admin_login'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<style type="text/css">
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

body {
    background-image: url(images/admin_home_bg.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;  
    background-attachment: fixed;
}

.right {
    margin: 20px;
    position: absolute;
    top: 0;
    right: 0;
}

.links-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.links-container a {
    margin: 0 20px;
    padding: 50px;
    font-size: 25px;
    text-decoration: none;
    color: #1A2242;
}

.links-container a:hover {
    text-decoration: underline;
    color: #1A2242;
}

.div {
    color: white;
    margin: 20px;
    font-size: 25px;
}

.admin {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -150%);
}

</style>
<body>

  <div id="background-image"></div>
  <div class="links-container">
    <a href="view.php">View All Users</a>
    <a href="admin_product.php">View All Product</a>
  </div>

	<div class="admin">
        <form>    
            <table align="center">
                <tr align="center">
                    <td align="center">
                        <a class="btn btn-outline-danger" href="logout.php">LOGOUT</a>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>