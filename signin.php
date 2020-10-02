<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "database/connect.php";

// Define variables and initialize with empty values
$username = $email = $mobilenumber = $password = "";
$username_err = $email_err = $mobilenumber_err = $password_err = "";

// Processing form data when form is submitted
if (isset($_POST["signin"])) {

    // ===== collect user form data ======
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if username is empty
    if (empty($username)) {
        $username_err = "Please enter your mobile number or email address.";
    }

    // Check if password is empty
    if (empty($password)) {
        $password_err = "Please enter your password.";
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $check_email_mobileno = "SELECT * FROM agro_users WHERE mobilenumber='$username' OR email='$username' LIMIT 1";
    $result = mysqli_query($conn, $check_email_mobileno);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
        $email = $user['email'];
        $mobilenumber = $user['mobilenumber'];
        $firstname = $user['firstname'];
        $lastname =  $user['lastname'];
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $select_email_mobileno = "SELECT id, email, mobilenumber, password FROM agro_users WHERE email= ? OR mobilenumber = ? LIMIT 1";

        if ($stmt = mysqli_prepare($conn, $select_email_mobileno)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",  $param_username, $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["mobilenumber"] = $mobilenumber;
                            $_SESSION["user_name"] = $mobilenumber;
                            $_SESSION["username"] = $mobilenumber;
                            $_SESSION["firstname"] = $firstname;

                            // Redirect user to welcome page
                            header("location: index.php");
                            end();
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<?php //include 'dashboard/controllers/user_auth.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MangoChat Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body style="background-color: #ffcc80;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                <div class="card-header bg-mango-orange">
                                    <h3 class="text-center font-weight-light my-4  text-white">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <?php //include('dashboard/controllers/errors.php'); 
                                        ?>
                                        <!-- Mobile No or Email Input -->
                                        <div class="form-group">
                                            <!-- <label class="small mb-1" for="inputEmailAddress">Email</label> -->
                                            <!-- <input class="form-control py-3" id="inputPhone" type="phone" name="phone" placeholder="Mobile number or Email" /> -->
                                            <input type="text" name="username" class="form-control py-3 input-lg"
                                                value="<?php echo $username ?>" id="username"
                                                aria-describedby="emailHelp"
                                                placeholder="Mobile Number or Email Address">
                                            <span class="help-block"><?php echo $username_err; ?></span>
                                        </div>
                                        <!-- Password Input -->
                                        <div
                                            class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                            <!-- <label class="small mb-1" for="inputPassword">Password</label> -->
                                            <!-- <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Password" /> -->
                                            <input type="password" class="form-control py-3 input-lg" name="password"
                                                id="password" placeholder="Password" />
                                            <span class="help-block"><?php echo $password_err; ?></span>
                                        </div>
                                        <!-- Remember Password -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck"
                                                    type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember
                                                    password</label>
                                            </div>
                                        </div>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!-- Forgot Password -->
                                            <a class="small text-mango-orange" href="password.php">Forgot Password?</a>
                                            <!-- Singin Btn -->
                                            <input type="submit" name="signin" value="Login" class="btn pull-right"
                                                style="background-color: #ffcc80">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center bg-mango-orange">
                                    <div class="small"><a href="signup.php" class="text-white">Need an account? Sign
                                            up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MangoChat 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>