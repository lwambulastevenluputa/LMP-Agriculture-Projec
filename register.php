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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #ffcc80;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-mango-orange"><h3 class="text-center font-weight-light my-4 text-white">Create Merchant Account</h3></div>
                                    <div class="card-body">
                                        <form action="register.php" method="post">

                                            <?php include('dashboard/controllers/errors.php'); ?>
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <label class="small mb-1" for="inputFirstName">First Name</label> -->
                                                        <input class="form-control py-4" id="inputFirstName" type="text" name="fname" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <label class="small mb-1" for="inputLastName">Last Name</label> -->
                                                        <input class="form-control py-4" id="inputLastName" type="text" name="lname" placeholder="Enter last name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <!-- <label class="small mb-1" for="inputEmailAddress">Username</label> -->
                                                <input class="form-control py-4" id="inputBusinessname" type="text" name="business-name" aria-describedby="businessNameHelp" placeholder="Enter Business Name" />
                                            </div>
                                            <div class="form-group">
                                                <!-- <label class="small mb-1" for="inputEmailAddress">Username</label> -->
                                                <input class="form-control py-4" id="inputBusinessaddress" type="text" name="business-address" aria-describedby="businessAddressHelp" placeholder="Enter Business Address" />
                                            </div>
                                            <div class="form-group">
                                                <!-- <label class="small mb-1" for="inputEmailAddress">Email</label> -->
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <label class="small mb-1" for="inputPassword">Password</label> -->
                                                        <input class="form-control py-4" id="inputPassword" type="password" name="password_1" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label> -->
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" name="password_2" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" name="reg_user" value="Create Account" class="btn btn-block" style="background-color: #ffcc80">
                                            <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-block" style="background-color: #ffcc80;" href="login.php">Create Account</a></div> -->
                                        </form>
                                    </div>
                                    <div class="card-footer text-center bg-mango-orange">
                                        <div class="small"><a href="dashboard_merchant.php" class="text-white">Merchant Dashboard</a><a href="login.php" class="text-white d-none">Have an account? Go to login</a></div>
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
