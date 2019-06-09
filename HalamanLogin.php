

<?php 
//NAMA 	: FABIAN GILANGGI
//NIM 	: M0517014


session_start();


if (isset($_COOKIE['login'])) {
	if ($_COOKIE['login'] == 'true') {
		$_SESSION['login'] = true; 
		# code...
	}
	# code...
}

if(isset($_SESSION["login"])){
	header("Location: index.php");
	exit;

}

require 'functions.php';

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysql_query($conn, "SELECT * FROM user WHERE username = 'username'");

	if (mysql_num_rows($result) === 1) {
		# code...
		$row = mysql_fetch_assoc($result);
		if (password_verify($password, $row["password"]){
			$_SESSION["login"] = true;
			
			//cookie
			if (isset($_POST['remember'])) {
				setcookie('login', 'true', time() +3600)
			}


			header("Location: index.php");
			exit;
		}
	}
	# code...
	$error = true;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

<h1>Halaman Login</h1>

<?php if (isset($error)) : ?> 
	<p style="color: red; font-style: italic;">username / password salah </p>
<?php endif; ?>

<form action="" method="post">
	<ul>
		<li>
			<label for="username">Username :</label> 
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="remember">remember :</label>
			<input type="checkbox" name="remember" id="remember">

		</li>
		




	</ul>



</form>


</body>
</html>

