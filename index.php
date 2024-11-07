<?php session_start(); ?>
<?php  require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php 
//check for form submission
if(isset($_POST['submit'])){
    $errors =array();
    //check if the username and password has been entered
    if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1){
        $errors[] = 'Username is Missing / Invalid';
    }
    if(!isset($_POST['password'])|| strlen(trim($_POST['password'])) < 1){
        $errors[] = 'Password is Missing / Invalid';
    }

    // check if there are any errors in the form
    if(empty($errors)){

        //save username and password into variables (for saving mysql injection use "mysqli_real_escape_string" )
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        // Username: user@gmail.com    
        // Password: password
        // Password for other accounts: apassword

        //prepare databse query
        $query = "SELECT * FROM user
                    WHERE email = '{$email}' 
                    AND password = '{$hashed_password}' 
                    LIMIT 1 ";
                    
                    
        $result_set = mysqli_query($connection, $query);
        verify_query($result_set); //same thing doing in  if($result_set){...}


        if($result_set){
            //query suceessful
            
            //check if user is valid
            if (mysqli_num_rows($result_set)== 1){
                // valid user found
                

                //if valid user, save user id and first name to session variable
                $user = mysqli_fetch_assoc($result_set);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                
				// updating last login ( NOW() - function returns current date and time)
				$query = "UPDATE user SET last_login = NOW() ";
				$query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

				$result_set = mysqli_query($connection, $query);

				verify_query($result_set);

                //redirect to user.php
                header('Location: users.php');
            }else{
                //user name and password invalid
                $errors[]= 'Invalid username/ Password';
            }
        }else{
            //query faild
            $errors[] = 'Database Query failed';
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User Management System</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="login">
        <form action="index.php" method="post">
            <fieldset>
                <legend><h1>Login</h1></legend>
                <?php 
                if(isset($errors) && !empty($errors)) {
                    echo '<p class="error">Invalid Username or Password</p>';
                }      
                ?>
                <?php 
                    if(isset($_GET['logout'])){
                        echo '<p class="info">You have sucessfully Logout</p>';
                    }
                

                ?>



                <p>
                    <label for="">Username:</label>
                    <input type="text" name="email" id= ""  placeholder="Email Address">
                </p>
                <p>
                    <label for="">Password:</label>
                    <input type="password" name="password" id= ""  placeholder="Password">
                </p>

                <p>
                    <button type="submit" name="submit">Log In</button>
                </p>

            </fieldset>

        </form>


    </div> <!--  .login -->
</body>
</html>
<?php mysqli_close($connection); ?>