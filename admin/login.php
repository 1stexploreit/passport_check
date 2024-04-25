<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["oxmsid"]) && $_SESSION["oxmsid"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, clientid,fullname, photo,mobile, email,role, password FROM tbl_admin WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $clientid,$fullname, $photo,$mobile, $email,$role, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["oxmsid"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["clientid"] = $clientid;
                            $_SESSION["fullname"] = $fullname;
                            $_SESSION["photo"] = $photo;
                            $_SESSION["mobile"] = $mobile;
                            $_SESSION["role"] = $role;
                            $_SESSION["email"] = $email;


                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection

}
?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="img/" href="../assets/img/logo.png">
    <title> Admin </title>
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/bootstrap4.min.css">
    <link rel='stylesheet' href='../assets/css/login.css'>
</head>

<body>
    <!-- partial:index.partial.html -->
    <section class="myform-area">
        <div class="container">
 
                <div class="login-bg"  >
                    <header class="header">
                        <img src="../assets/img/logo.png" height="80" alt=""   />
                        <h4 style="padding: 10px; border-bottom: 1px dashed #eee;"> Login</h4>
                    </header>
                    <div class="form-area login-form">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-input">
                             
                                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                    <label>User ID</label>
                                    <input type="text" value="<?php echo $email; ?>" class="form-control" placeholder="Email" name="email" required>
                                    <span class="help-block"><?php echo $email_err; ?></span>
                                </div>
                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
                                <div class="myform-button">
                                    <button type="submit" class="myform-btn">Login </button>
                                    <p>
                                   
                                </div>
                        </form>
                    </div>
                </div>
                </div>
				
				<p class="copyright-text text-center text-secondary; mt-3">  &copy; 2024
                    <a rel="nofollow" href="http://www.noorsoftbd"> NOORSOFT </a> All Right Reservd
                </p>
				
 
                
            </div>
        </div>
        </div>
    </section>
     

    <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
 
 <!--===============================================================================================-->
     <script src="vendor/tilt/tilt.jquery.min.js"></script>
     <script >
         $('.js-tilt').tilt({
             scale: 1.1
         })
     </script>
 <!--===============================================================================================-->
  