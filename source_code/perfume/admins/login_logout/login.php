<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../resources/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../resources/css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">


    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body style="background-color: #232D45">
<!--Thong bao login-->
<?php
    if(!isset($_SESSION['failed'])){
        $_SESSION['failed'] = 0;
    }
?>
<section class="position-relative">
    <?php
        if($_SESSION['failed'] === 1){
           echo '<div class="alert alert-danger position-absolute" role="alert"
            style="top: 5%; right: 2%; box-shadow: 1px 1px red; animation: fadeOut 5s;">
            Wrong email or password!
            <i class="bi-caret-right-fill" style="font-size: 12px; padding: 8px; cursor: pointer"></i>        
            </div>';
           $_SESSION['failed'] = 0;
        }
    ?>

</section>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table w-50 h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4 text-white">
                        <h1 class="h2 text-white">Welcome back</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="rounded-5" style="background-color: #23272b">
                        <div class="card-body">
                            <div class="m-sm-4 ">
                                <form class="text-white" method="post" action="loginProcess.php">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg text-bg-dark" type="email" name="email" placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg text-bg-dark" type="password" name="password" placeholder="Enter your password" />
                                        <small>
                                            <a href="index.html">Forgot password?</a>
                                        </small>
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                            <span class="form-check-label">
              Remember me next time
            </span>
                                        </label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button class="btn btn-lg btn-primary">Sign in</button>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
