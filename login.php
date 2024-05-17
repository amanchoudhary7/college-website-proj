<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Amity University</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<?php
    session_start();

    // Database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'scholarsphere';

    // Establish connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle user registration
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
		$email = $_POST['email'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$university = $_POST['university'];
		$department = $_POST['department'];
		$employee_id = $_POST['employee_id'];
		
		// File upload handling
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["avatar_file"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
		// Check if file is selected and uploaded successfully
		if (isset($_FILES["avatar_file"]) && $_FILES["avatar_file"]["error"] === UPLOAD_ERR_OK) {
			// Check if file is an image
			$check = getimagesize($_FILES["avatar_file"]["tmp_name"]);
			if ($check === false) {
				echo "File is not an image.";
				$uploadOk = 0;
			}
	
			// Check file size (limit to 2MB)
			if ($_FILES["avatar_file"]["size"] > 2000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
	
			// Allow certain file formats
			$allowed_extensions = array("jpg", "jpeg", "png", "gif");
			if (!in_array($imageFileType, $allowed_extensions)) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
	
			// Try to upload file if all checks are passed
			if ($uploadOk == 1) {
				if (move_uploaded_file($_FILES["avatar_file"]["tmp_name"], $target_file)) {
					$avatar_filename = basename($_FILES["avatar_file"]["name"]);
	
					// Insert user data into database
					$sql = "INSERT INTO registerinfo (emp_id, email, user_name, password, university, department, avatar_filename) 
							VALUES ('$employee_id', '$email', '$user_name', '$password', '$university', '$department', '$avatar_filename')";
					
					if ($conn->query($sql) === TRUE) {
						echo "Registration successful";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		} else {
			echo "File upload error: " . $_FILES["avatar_file"]["error"];
		}
	}
	// Handle user login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Validate user credentials
    $employee_id = $_POST['employee_id'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM registerinfo WHERE emp_id='$employee_id' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $user_name = $row['user_name'];
		$university = $row['university'];
        $department = $row['department'];
		$employee_id = $row['emp_id'];
		$email = $row['email'];
		$avatar_filename = $row['avatar_filename'];
        // Start the session (if not already started)
        session_start();
        
        // Store the username, university, department, email, and emp_id in the session for later use
        $_SESSION['user_name'] = $user_name;
        $_SESSION['university'] = $university;
        $_SESSION['department'] = $department;
		$_SESSION['employee_id'] = $employee_id;
		$_SESSION['email'] = $email;
		$_SESSION['avatar_filename'] = $avatar_filename;

        
        // Redirect to index1.php
        header("Location: index1.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Invalid username or password";
    }
}

// Handle password retrieval
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forgot_password'])) {
    // Retrieve email from the form
    $email = $_POST['email'];
    
    // Check if the email exists in the database
    $sql = "SELECT * FROM registerinfo WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Generate a random password reset token
        $token = md5(uniqid(rand(), true));
        
        // Update the user's record in the database with the token
        $sql_update = "UPDATE registerinfo SET reset_token='$token' WHERE email='$email'";
        if ($conn->query($sql_update) === TRUE) {
            // Send email with password reset instructions
            $to = $email;
            $subject = "Password Reset Instructions";
            $message = "Dear User,\r\n\r\nPlease click the following link to reset your password: http://example.com/reset_password.php?token=$token\r\n\r\nThank you.";
            $headers = "From: $email" . "\r\n" .
                       "Reply-To: $email" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();
            
            if (mail($to, $subject, $message, $headers)) {
                echo "Password reset instructions sent to your email.";
            } else {
                echo "Failed to send password reset instructions.";
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Email not found in our records.";
    }
}
	// Close connection
	$conn->close();
	?>




<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									
									<span class="white">Amity University</span>
									
								</h1>
								
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											<form method="post" action="">
    <fieldset>
        <label class="block clearfix">
            <span class="block input-icon input-icon-right">
                <input type="text" class="form-control" name="employee_id" placeholder="Employee ID" />
                <i class="ace-icon fa fa-user"></i>
            </span>
        </label>

        <label class="block clearfix">
            <span class="block input-icon input-icon-right">
                <input type="password" class="form-control" name="password" placeholder="Password" />
                <i class="ace-icon fa fa-lock"></i>
            </span>
        </label>

        <div class="space"></div>

        <div class="clearfix">
            <label class="inline">
                <input type="checkbox" class="ace" />
                <span class="lbl"> Remember Me</span>
            </label>

            <button type="submit" name="login" class="width-35 pull-right btn btn-sm btn-primary">
                <i class="ace-icon fa fa-key"></i>
                <span class="bigger-110">Login</span>
            </button>
        </div>

        <div class="space-4"></div>
    </fieldset>
</form>


											
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											<form method="post" action="">
    <fieldset>
        <label class="block clearfix">
            <span class="block input-icon input-icon-right">
                <input type="email" class="form-control" name="email" placeholder="Email" />
                <i class="ace-icon fa fa-envelope"></i>
            </span>
        </label>

        <div class="clearfix">
            <button type="submit" name="forgot_password" class="width-35 pull-right btn btn-sm btn-danger">
                <i class="ace-icon fa fa-lightbulb-o"></i>
                <span class="bigger-110">Send Me!</span>
            </button>
        </div>
    </fieldset>
</form>

										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>
											

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

											<form method="post" action="" enctype="multipart/form-data">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" name="email" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="user_name" placeholder="Full Name" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="confirm_password" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<!-- New fields for university, department, and employee ID -->
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="university" placeholder="University" />
															<i class="ace-icon fa fa-university"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="department" placeholder="Department" />
															<i class="ace-icon fa fa-building"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="employee_id" placeholder="Employee ID" />
															<i class="ace-icon fa fa-id-badge"></i>
														</span>
													</label>
															<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" name="avatar_file" accept="image/*" />
															<i class="ace-icon fa fa-image"></i> Upload Profile Picture
														</span>
													</label>
													<!-- Existing checkbox for user agreement -->
													<label class="block">
														<input type="checkbox" class="ace" />
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="submit" name="register" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>
															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>


											

										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<span id="btn-login-dark" class="mode-icon"><i class="fa fa-moon-o"></i></span>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<span id="btn-login-blur" class="mode-icon"><i class="fa fa-cloud"></i></span>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<span id="btn-login-light" class="mode-icon"><i class="fa fa-sun-o"></i></span>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
				$('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				e.preventDefault();
			});

			// Function to change the mode to blur
			$('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				e.preventDefault();
			});

			// Function to change the mode to light
			$('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				e.preventDefault();
			});
		});
		</script>
	</body>
</html>
