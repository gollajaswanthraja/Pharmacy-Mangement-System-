<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>

	body{

		background-image:url('tablet.png');
	}
	</style>

</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <nav class="home-nav">
     	<a href="change-password.php">Change Password</a>
        <a href="2.html">Main</a>
     </nav>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>