
<?php
session_start();
include 'db.php'; 

if (isset($_SESSION['admin_login'])) {
	header("location:admin_home.php");
}


if (isset($_REQUEST['login'])) {
	$uname = $_REQUEST['uname'];
	$password = $_REQUEST['password'];
	$query1 = "select * from admin where username = BINARY '$uname' and password = BINARY '$password'";
	$run_q1 = $con->query($query1);
	$row_login = $run_q1->fetch_object();
	$num_rows = $run_q1->num_rows;
	if ($num_rows == 1) {
		if (isset($_REQUEST['rem'])) {
			setcookie('username', $row_login->uname, time()+60);
			setcookie('password', $row_login->password, time()+60);
		}

		$_SESSION['admin_login']=$row_login;
		header("location:admin_home.php");  
	}
}

if (isset($_REQUEST['user_login'])) {
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<style type="text/css">

body {
    background-image: url(images/new_product_bg.jpg);
    background-repeat: no-repeat;
}

.container_login {
    width: 40vw;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    justify-content: space-around;
    border-radius: 15px;
    overflow: hidden;
}


.item {
    flex-grow: 1;
    color: #fff;
}

.item-1 {
    background-color: #2B3F87;
}

.user {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -150%);
}

.btn-login{
	background-color: #FCC85D;
	color: #2B3F87;
}

.btn-login:hover{
	color: #1A2242;
}
.login-color{
    color: #FCC85D;
}

</style>



<body>
    <div class="container_login">

        <div class="item item-1 p-4">
            <h2 class="mb-5 login-color" align="center">Admin Login</h2>
            <form method="post">
                <table border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <th>User Name</th>
						<td><input class="form-control" type="text" name="uname" required="required" value="<?php
						if(isset($_COOKIE['username'])){
							echo $_COOKIE['username'];
						}
						?>"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
						<td><input class="form-control" type="Password" name="password" id="weadm" required="required" value="<?php
						if(isset($_COOKIE['password'])){
							echo $_COOKIE['password'];
						}
						?>"></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr align="center">
                        <td colspan="1">
							<label><input type="checkbox" onclick="admin_funcn()"> Show Password</label>
							<script>
								function admin_funcn() {
								var x = document.getElementById("weadm");
								if (x.type === "password") {
									x.type = "text";
								} else {
									x.type = "password";
								}
							}
							</script>
                        </td>
						<td colspan="2">
                            <label><input type="checkbox" name="rem"> Remember Me</label>
                        </td>
                    </tr>
					<?php
					if (isset($_REQUEST['login'])) {
						if($num_rows != 1) {
							?>
							<tr align="center">
								<td colspan="2" ><?php echo "Entered wrong User Name or Password!";?></td>
							</tr>
							<?php
						}
					}
					if (isset($_REQUEST['login'])) {
						if($num_rows == 1) {
							if ($b == 1) {
								?>
								<tr align="center">
									<td><?php echo "You are blocked, GET OUT!!!";?></td>
									<td><a href="index.php"><button>OK</button></a></td>
								</tr>
								<?php
							}
						}
					}
					?>
                    <tr><td><br></td></tr>
                    <tr align="center">
                        <td colspan="2" align="center"><input class="btn btn-login" type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="user">
        <form>    
            <table align="center">
                <tr align="center">
					<td align="center"><input class="btn btn-outline-danger" type="submit" name="user_login" value="User Login"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>