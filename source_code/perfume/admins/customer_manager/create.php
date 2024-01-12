
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../resources/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../resources/css/admin.css">
    <title>Add a customer</title>
</head>
<body style="background-color: #232D45">

<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 250px"></div>
        <div class="position-fixed" style="height: 100%">
            <?php
            include("../../layouts/navbar_adminMenu.php");
            ?>
        </div>

        <!--  content  -->

        <div class="content-container">
            <h4 class="content-heading">Add a new customer</h4>
            <form action="store.php" method="post" class="w-75 m-auto">
                <div class="dashboard-block w-100 h-100 mb-3">
                    <div class="db-title">
                        Enter new customer's information
                    </div>

                    <div class="dashboard-body" style="height: 200px">
                        <div class="d-flex justify-content-evenly align-items-center" style="height: 33.33%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    First Name
                                </div>
                                <div>
                                    <input name="name" type="text" class="form-control-sm" required/>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Last Name
                                </div>
                                <div>
                                    <input name="name" type="text" class="form-control-sm" required/>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center" style="height: 33.33%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Email
                                </div>
                                <div>
                                    <input name="email" type="email" class="form-control-sm" required/>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Password
                                </div>
                                <div>
                                    <input name="password" type="text" class="form-control-sm" required/>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center" style="height: 33.33%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Phone
                                </div>
                                <div>
                                    <input name="phone" type="text" class="form-control-sm" required/>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Address
                                </div>
                                <div>
                                    <input name="address" type="text" class="form-control-sm" required/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary nice-box-shadow" href="index.php">Back</a>
                    <button class="btn btn-primary nice-box-shadow" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>