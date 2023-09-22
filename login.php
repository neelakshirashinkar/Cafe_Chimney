<!-- <h5 style="font: bold 60px 'Cookie', cursive;">Welcome <span style="color:#e0ac1c;"><?php echo $_SESSION['username'] ?> </span></h5><br> -->
<?php
    session_start();
    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <TITLE>Cafe Chimney</TITLE>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
<body style="background-image: url('product-images/login.jpg');">
<div class="container" id="container">
	<div class="form-container sign-up-container">
    <form action="login.php" method="POST">
            <h1>Create Account</h1><br>
            <input type="text" name="username" placeholder="Username" class="inputfield" required>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="Password" name="password" placeholder="Password" class="inputfield" required>
            <input type="password" name="cpassword" name="pname" placeholder="Confirm Password" class="inputfield" required><br><br>
			<button name = "submit_btn">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="login.php" method="POST">
			<h1>Sign in</h1><br>
			<input type="text" placeholder="Username" name="username" required/>
			<input type="password" placeholder="Password" name="password" required/> <br>
			<button name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<?php
            if(isset($_POST['submit_btn']))
            {
                $fullname = $_POST['fullname'];
                                
                $username = $_POST['username'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

               

                $encrypted_password = md5($password);
                if($password == $cpassword)
                {
                    $query ="SELECT * from login_info_table WHERE username='$username'";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                        echo'<script type="text/javascript">alert("User already exists, please try another username")</script>';
                    }
                    
                    else
                    {
                        $query="INSERT INTO login_info_table VALUES ('','$username','$fullname','$encrypted_password')";
                        $query_run = mysqli_query($con,$query);
                        if($query_run){
                            echo'<script type="text/javascript">alert("User registered,You can Login now.")</script>';
                        }
                    }
                }
                else
                {
                    echo'<script type="text/javascript">alert("Passwords do not match")</script>';
                }
            }
        ?>
<?php
            if(isset($_POST['login'])) 
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $encrypted_password = md5($password);
                $query="SELECT * from login_info_table WHERE password='$encrypted_password' AND username='$username'";
                $query_run = mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    $row = mysqli_fetch_assoc($query_run);
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $row['username'];
                    header('location:index.php'); 
                }
                else
                {
                    $_SESSION['login'] = false;
                    echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
                }
            }
            
        ?>
<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>

<!-- <body style="background-color:#bdc3c7">
    <div class="container">
        <h2>Login</h2>
    <div class="inner-container">  
        <center><img src="images/rushi.png" alt="" style="height:200px"></center>   
        <form action="login.php" method="post">
            <label><b>Username</b></label>
            <input type="text" name="username" placeholder="Enter username" class="inputfield" required>
            <label><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter password" class="inputfield" required >
            <input type="submit" id="login_btn" value="Login" name="login">
            <a href="register.php"><input type="button" id="register_btn" value="Register"></a><br>
        </form>
        
    </div>
    </div>
</body> -->
</body>
</html>