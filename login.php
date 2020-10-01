<?php include 'dashboard/controllers/user_auth.php'; ?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #ffcc80;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header bg-mango-orange"><h3 class="text-center font-weight-light my-4  text-white">Login</h3></div>
                                    <div class="card-body">
                                        <form action="login.php" method="post">
                                            <?php include('dashboard/controllers/errors.php'); ?>
                                            <div class="form-group">
                                                <!-- <label class="small mb-1" for="inputEmailAddress">Email</label> -->
                                                <input class="form-control py-4" id="inputPhone" type="phone" name="phone" placeholder="Enter mobile number" />
                                            </div>
                                            <div class="form-group">
                                                <!-- <label class="small mb-1" for="inputPassword">Password</label> -->
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small text-mango-orange" href="password.php">Forgot Password?</a>
                                                <input type="submit" name="login_user" value="Login" class="btn pull-right" style="background-color: #ffcc80">
                                                <!-- <a class="btn bg-mango-orange" name="login_user">Login</a> -->
                                                <!-- <button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button> -->

                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center bg-mango-orange">
                                        <div class="small"><a href="register.php" class="text-white">Need an account? Sign up!</a></div>
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
