<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"libms");
	$author_id = "";
	$author_name = "";
	$query = "select * from authors where author_id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$author_name = $row['author_name'];
		$author_id = $row['author_id'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdn.usebootstrap.com/bootstrap/latest/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.usebootstrap.com/bootstrap/latest/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.usebootstrap.com/bootstrap/latest/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin_dashboard.php">Library_Management_System</a>
			</div>
			<font style="color: greenyellow;"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: red;"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="#">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>(For Source Code Mail Here: fahimshahoriar66@gmail.com)</marquee></span><br><br>
		<center><h4>Edit Book</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Author Name:</label>
						<input type="text" class="form-control" name="author_name" value="<?php echo $author_name; ?>" required>
					</div>
					<button type="submit" name="update_author" class="btn btn-primary">Update Author</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
	if(isset($_POST['update_author'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"libms");
		$query = "update authors set author_name = '$_POST[author_name]' where author_id = $_GET[aid]";
		$query_run = mysqli_query($connection,$query);
		header("location:manage_author.php");
	}
?>