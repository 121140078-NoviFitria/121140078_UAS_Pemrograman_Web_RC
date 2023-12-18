<?php
session_start();

require 'functions.php';

if (isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result)=== 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify ($password, $row["password"])){
            $_SESSION["login"] = true;

            header("Loxcation : index.php");
            exit();
        }
    }
    $error=true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
    <script src="validasi.js" defer></script> 
    <link rel="stylesheet" href="style/loginn.css">
</head>
<body>

    
    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
        <?php endif; ?>
        
        <form action="registrasi.php" method="post" id="loginForm">
            
            <h1>Halaman Login</h1>
	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username" placeholder="Username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password" placeholder="Password">
		</li>
		<li>
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>
		</li>
		<li>
			<button type="submit" value ="login" name="login" id="loginBtn">Login</button>
		</li>
	</ul>
	
</form>







</body>
</html>