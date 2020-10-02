<?php
// Include config file
require_once "database/connect.php";

// Define variables and initialize with empty values
$firstname = $lastname = $email = $mobilenumber = $password = $confirm_password = "";
$firstname_err = $lastname_err = $email_err = $mobilenumber_err = $password_err  = $confirm_password_err = $firstname_err = $lastname_err = "";

// Set empty form vars for validation mapping
$_first_name = $_last_name = $_email = $_mobile_number = $_password = $_comfirm_password = "";

// Processing form data when form is submitted
if (isset($_POST["signup"])) {

    // ===== collect user form data ======
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST['email']);
    $mobilenumber = $_POST['mobilenumber'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // ===== verify if form values are not empty =====
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobilenumber) && !empty($password) && !empty($confirm_password)) {
        // clean the form data before sending to database
        $_first_name = mysqli_real_escape_string($conn, $firstname);
        $_last_name = mysqli_real_escape_string($conn, $lastname);
        $_email = mysqli_real_escape_string($conn, $email);
        $_mobile_number = mysqli_real_escape_string($conn, $mobilenumber);
        $_password = mysqli_real_escape_string($conn, $password);
        $_confirm_password = mysqli_real_escape_string($conn, $confirm_password);

        // ============================== PREG_MATCH CONDITION ==================== 
        // i. First name validation
        if (!preg_match("/^[a-zA-Z ]*$/", $_first_name)) {
            $firstname_err = '<div class="alert alert-danger">
                    Only letters and white space allowed.
                </div>';
        }

        // ii. Last name validation
        if (!preg_match("/^[a-zA-Z ]*$/", $_last_name)) {
            $lastname_err = '<div class="alert alert-danger">
                    Only letters and white space allowed.
                </div>';
        }

        // iii. 10-digit only validation for mobile number
        if (!preg_match("/^[0-9]{10}+$/", $_mobile_number)) {
            $mobilenumber_err = '<div class="alert alert-danger">
                    Only 10-digit mobile numbers allowed.
                </div>';
        }

        // iv. [character length check, must contain 1special character,lowercase,uppercase and digit] use 8 or more characters with a mix of letters, numbers & symboles
        // if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password)) {
        //     $password_err = '<div class="alert alert-danger">
        //              Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
        //         </div>';
        // }
    } else {
        // ===== Error Handling (Display error(s) if any of the user input field is empty) =======
        if (empty($firstname)) {
            //$fNameEmptyErr 
            $firstname_err = '<div class="text-danger">
                First name can not be blank.
            </div>';
        }
        if (empty($lastname)) {
            //$lNameEmptyErr
            $lastname_error = '<div class="text-danger">
                Last name can not be blank.
            </div>';
        }

        if (empty($email)) {
            //$emailEmptyErr
            $email_err = '<div class="text-danger">
                Email can not be blank.
            </div>';
        }

        if (empty($mobilenumber)) {
            //$mobileEmptyErr 
            $mobilenumber_err = '<div class="text-danger">
                Mobile number can not be blank.
            </div>';
        }

        if (empty($password)) {
            // $passwordEmptyErr 
            $password_err = '<div class="text-danger">
                Password can not be blank.
            </div>';
        }

        if (empty($confirm_password)) {
            // $confirmPasswordEmptyErr 
            $confirm_password_err = '<div class="text-danger">
                Confirm password can not be blank.
            </div>';
        }
    }

    // ============================== BASIC VALIDATION ==================== 
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $check_mobilenumber_email = "SELECT * FROM agro_users WHERE mobilenumber ='$mobilenumber' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $check_mobilenumber_email);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
        if ($user['mobilenumber'] === $mobilenumber) {
            $mobilenumber_err = "Mobile number already exists.";
        }
        if ($user['email'] === $email) {
            $email_err = "Email already exists.";
        }
    }

    // ===== 1. Validate mobile number (verify if mobile number exists)=====
    if (empty($mobilenumber)) {
        $username_err = "Please enter your mobile number.";
    } else {
        // check if mobile number already exists
        $check_mobilenumber = "SELECT id FROM agro_users WHERE mobilenumber = ?";

        if ($stmt = mysqli_prepare($conn, $check_mobilenumber)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_mobilenumber);

            // Set parameters
            $param_mobilenumber = $_mobile_number;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $mobilenumber_err = "This mobile number is already taken.";
                } else {
                    $mobilenumber = $_mobile_number;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // ===== 2. Validate email =====
    if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
        $_emailErr = '<div class="text-danger">
                Email format is invalid.
            </div>';
    }

    // ===== 3. Validate password =====
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // ===== 4. Validate confirm password =====
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database [insert if there are no errors]
    if (empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($mobilenumber_err) &&  empty($password_err) && empty($confirm_password_err)) {

        // Add user into the users1 table
        $add_user = "INSERT INTO agro_users (firstname, lastname, email, mobilenumber, password) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $add_user)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_firstname, $param_lastname, $param_email, $param_mobilenumber, $param_password);

            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_mobilenumber = $mobilenumber;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {



                // Add user into the users1 table
                $add_user2 = "INSERT INTO mango_user_credentials (ref, first_name, last_name, mobile_number, id_number, email) VALUES (?, ?, ?, ?, ?, ?)";
                $ref = $param_mobilenumber . date('ymdhis');
                if ($stmt2 = mysqli_prepare($conn, $add_user2)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt2, "ssssss", $ref, $param_firstname, $param_lastname, $param_mobilenumber, $param_mobilenumber, $param_email);
                }
                mysqli_stmt_execute($stmt2);




                // email activation
                // ....

                // Store data in session variables
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";

                // Redirect to login page
                header("location: signin.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<?php include 'dashboard/controllers/user_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Create an Account with MangoChat</title>
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
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-mango-orange">
                                    <h3 class="text-center font-weight-light my-4 text-white">Create Merchant Account
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                        <?php include('dashboard/controllers/errors.php'); ?>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <!-- First Name -->
                                                <div
                                                    class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                                                    <!-- <label class="small mb-1" for="inputFirstName">First Name</label> -->
                                                    <!-- <input class="form-control py-4" id="inputFirstName" type="text" name="fname" placeholder="Enter first name" /> -->
                                                    <input type="text" name="firstname" class="form-control input-lg"
                                                        value="<?php echo $firstname; ?>" id="firstname"
                                                        aria-describedby="firstNameHelp" placeholder="First name">
                                                    <span class="help-block"><?php echo $firstname_err; ?></span>
                                                </div>
                                            </div>
                                            <div
                                                class="col-md-6 <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                                                <!-- Last Name -->
                                                <div class="form-group">
                                                    <!-- <label class="small mb-1" for="inputLastName">Last Name</label> -->
                                                    <!-- <input class="form-control py-4" id="inputLastName" type="text" name="lname" placeholder="Enter last name" /> -->
                                                    <input type="text" name="lastname" class="form-control input-lg"
                                                        value="<?php echo $lastname; ?>" id="lastname"
                                                        aria-describedby="lastNameHelp" placeholder="Last name">
                                                    <span class="help-block"><?php echo $lastname_err; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Business or Company Name -->
                                        <!-- <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputBusinessname" type="text" name="business-name" aria-describedby="businessNameHelp" placeholder="Enter Business Name" />
                                            </div> -->
                                        <!-- Business or Company Address -->
                                        <!-- <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputBusinessaddress" type="text" name="business-address" aria-describedby="businessAddressHelp" placeholder="Enter Business Address" />
                                            </div> -->

                                        <!-- Email -->
                                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                            <!-- <label class="small mb-1" for="inputEmailAddress">Email</label> -->
                                            <!-- <input class="form-control py-4" id="email" type="email" name="email" aria-describedby="emailHelp" placeholder="Email" /> -->
                                            <input type="email" name="email" class="form-control input-lg"
                                                value="<?php echo $email; ?>" id="email" aria-describedby="emailHelp"
                                                placeholder="Email">
                                            <span class="help-block"><?php echo $email_err; ?></span>
                                        </div>
                                        <!-- Mobile Number -->
                                        <div
                                            class="form-group <?php echo (!empty($mobilenumber_err)) ? 'has-error' : ''; ?>">
                                            <!-- <label class="small mb-1" for="mobilenumber">Mobile Number</label> -->
                                            <!-- <input class="form-control py-4" id="mobilenumber" type="tel" name="mobilenumber" aria-describedby="mobileNumberHelp" placeholder="Mobile Number" /> -->
                                            <input type="tel" name="mobilenumber" class="form-control input-lg"
                                                id="mobilenumber" value="<?php echo $mobilenumber; ?>"
                                                aria-describedby="mobilenumberHelp" placeholder="Mobile Number">
                                            <span class="help-block"><?php echo $mobilenumber_err; ?></span>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                    <!-- <label class="small mb-1" for="password">Password</label> -->
                                                    <!-- <input class="form-control py-4" id="password" type="password" name="password" placeholder="Enter password" /> -->
                                                    <input type="password" name="password" class="form-control input-lg"
                                                        value="<?php echo $password; ?>" id="password"
                                                        placeholder="Password">
                                                    <span
                                                        class="help-block"><?php echo '<p class="text-danger">' . $password_err . '</p>'; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                    <!-- <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label> -->
                                                    <!-- <input class="form-control py-4" id="inputConfir" type="password" name="confirm_password" placeholder="Confirm password" /> -->
                                                    <input type="password" name="confirm_password"
                                                        class="form-control input-lg"
                                                        value="<?php echo $confirm_password; ?>" id="cpassword"
                                                        placeholder="Confirm Password">
                                                    <span
                                                        class="help-block"><?php echo '<p class="text-danger">' . $confirm_password_err . '</p>'; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" name="signup" class="btn btn-lg btn-block mb-4"
                                            style="background-color: #ffcc80;" value="Sign Up">
                                        <!-- <input type="submit" name="reg_user" value="Create Account" class="btn btn-block" style="background-color: #ffcc80"> -->
                                        <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-block" style="background-color: #ffcc80;" href="login.php">Create Account</a></div> -->
                                    </form>
                                </div>
                                <div class="card-footer text-center bg-mango-orange">
                                    <div class="small"><a href="signin.php" class="text-white">Already have an account?
                                            Sign in!</a></div>
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