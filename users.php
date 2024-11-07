<?php session_start(); ?>
<?php  require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php 
    //checking if the user logged in
    if (!isset($_SESSION['user_id'])){
        header('Location: index.php');
    }


	$search = '';//pass to input box value
    $user_list = '';
    //if user search or display all
	if(isset($_GET['search'])){
		$search = mysqli_real_escape_string($connection,$_GET['search']);
		$query = "SELECT * FROM user WHERE (first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%' OR email LIKE '%{$search}%' ) AND  is_deleted=0 ORDER BY first_name";

	} else{
		// getting the list of users
		$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
	}



	$users = mysqli_query($connection, $query);

    verify_query($users); //same as doing in if ($users){...}else { echo "Database query failed.";}

	if ($users) {
		while ($user = mysqli_fetch_assoc($users)) {
			$user_list .= "<tr>";
			$user_list .= "<td>{$user['first_name']}</td>";
			$user_list .= "<td>{$user['last_name']}</td>";
			$user_list .= "<td>{$user['last_login']}</td>";
			$user_list .= "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
			$user_list .= "<td><a href=\"delete-user.php?user_id={$user['id']}\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>";
			$user_list .= "</tr>";
		}
	} else {
		echo "Database query failed.";
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <div class="appname">User Management system</div>
        <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a> </div>
    </header>

    <main>
		<h1>Users 
			<span>
				<a href="add-user.php" class="btn btn-primary">+ Add New</a> 
				<a href="users.php" class="btn btn-secondary">Refresh</a>
			</span>
		</h1>

		<div class="search">
			<form action="users.php" method="get">
			<p>				
				<input type="text" name="search" id="" placeholder="User Search" value="<?php echo $search; ?>" required autofocus>
			</p>
		</form>
		</div>
		<table class="masterlist">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Last Login</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			<?php echo $user_list; ?>

		</table>
		
		
	</main>
</body>
</html>