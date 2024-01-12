<?php
session_start();
if(!isset($_SESSION['email'])){
header("Location: ../login_logout/login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../resources/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../resources/css/admin.css">
    <script src="../../resources/bootstrap/js/bootstrap.js"></script>
    <title>Manage Customers</title>
</head>
<body style="background-color: #232D45">
<?php
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
include_once('../../connect/open.php');
//pagination
$recordOnePage = 5;
$sqlCountRecord = "SELECT COUNT(*) as count_record FROM customers WHERE first_name AND last_name LIKE '%$search%'";
$countRecords = mysqli_query($connect, $sqlCountRecord);
foreach ($countRecords as $countRecord) {
    $records = $countRecord['count_record'];
}

$countPage = ceil($records / $recordOnePage);

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$start = ($page - 1) * $recordOnePage;
//main
$sql = "SELECT * FROM customers WHERE first_name OR last_name LIKE '%$search%' ORDER BY id LIMIT $start, $recordOnePage";
$customers = mysqli_query($connect, $sql);
include_once('../../connect/close.php');

?>
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 250px"></div>
        <div class="position-fixed rounded-left " style="height: 100%">
            <?php
            include("../../layouts/navbar_adminMenu.php");
            ?>
        </div>

        <!--  content  -->

        <div class="content-container ">
            <!--            thong bao action -->
            <?php
            if (!isset($_SESSION['ad-destroy'])) {
                $_SESSION['ad-destroy'] = 0;
            }
            if (!isset($_SESSION['ad-create'])) {
                $_SESSION['ad-create'] = 0;
            }
            if (!isset($_SESSION['ad-edit'])) {
                $_SESSION['ad-edit'] = 0;
            }

            if ($_SESSION['ad-destroy'] === 1) {
                echo '<div id="close-target" class="alert alert-success position-absolute" role="alert"
                style="top: 11%; right: 10%; box-shadow: 1px 1px green; animation: fadeOut 5s;">
              Delete successfully!
              <i id="click-close" class="fa-solid fa-x" style="font-size: 12px; padding: 8px; cursor: pointer" onclick="closeMes()"></i>
              </div>';
                $_SESSION['ad-destroy'] = 0;
            }
            if ($_SESSION['ad-create'] === 1) {
                echo '<div id="close-target" class="alert alert-success position-absolute" role="alert"
                style="top: 11%; right: 10%; box-shadow: 1px 1px green; animation: fadeOut 5s;">
              Create successfully!
              <i id="click-close" class="fa-solid fa-x" style="font-size: 12px; padding: 8px; cursor: pointer" onclick="closeMes()"></i>
              </div>';
                $_SESSION['ad-create'] = 0;
            }
            if ($_SESSION['ad-edit'] === 1) {
                echo '<div id="close-target" class="alert alert-success position-absolute" role="alert"
                style="top: 11%; right: 10%; box-shadow: 1px 1px green; animation: fadeOut 5s;">
              Edit successfully!
              <i id="click-close" class="fa-solid fa-x" style="font-size: 12px; padding: 8px; cursor: pointer" onclick="closeMes()"></i>
              </div>';
                $_SESSION['ad-edit'] = 0;
            }
            ?>

            <div class="d-flex">
                <h4 class="content-heading me-sm-5">Customer list</h4>
                <nav style="width: 520px"></nav>
                <form class="search-form" action="" method="get">
                    <input type="text" name="search" value="<?= $search; ?>" placeholder="Search here..."
                           class="form-outline rounded-2 my-sm-5 text-white" style="background-color: #28334E">
                    <button type="submit" class="btn btn-primary nice-box-shadow bi-search border-secondary" style="background-color: #28334E">
                        <a href="" class="text-white" style="text-decoration: none"></a>
                    </button>
                </form>
            </div>
            <table class="table-variants table table-striped table-dark table-hover table-borderless align-middle text-center nice-box-shadow">
                <thead class="text-white">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                foreach ($customers as $customer) {
                    ?>
                    <tr style="background-color: #000000">
                        <td> <?= $customer['id'] ?></td>
                        <td> <?= $customer['first_name'] ?> </td>
                        <td> <?= $customer['last_name'] ?> </td>
                        <td> <?= $customer['email'] ?> </td>
                        <td> <?= $customer['phone_number'] ?> </td>
                        <td> <?= $customer['address'] ?> </td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                <a href="edit.php?id=<?= $customer['id'] ?>" class="text-white"
                                   style="text-decoration: none">Edit</a>
                            </button>
                            <button type="button" class="btn bg-danger border-danger-subtle">
                                <a href="#delete-modal?cus=<?= $customer['id'] ?>" class="text-white"
                                   style="text-decoration: none">Delete</a>
                            </button>
                        </td>
                    </tr>
                    <!--          modal  delete        -->
                    <div id="delete-modal?cus=<?= $customer['id'] ?>" class="my-modal" style="z-index: 10">
                        <div class="modal__content">
                            <h2>Confirm delete</h2>

                            <p>
                                Do you really want to delete <span style="color: red"><?= $customer['first_name'] ?>
                                    <?= $customer['last_name'] ?>
                                </span>?
                            </p>

                            <div class="modal__footer">
                                <div>
                                    <a href="destroy.php?id=<?= $customer['id'] ?>" class="btn btn-danger"
                                       style="font-size: 16px;">
                                        Delete</a>
                                </div>
                            </div>

                            <a href="#" class="modal__close">&times;</a>
                        </div>
                    </div>
                    <!--          end modal          -->
                    <?php
                }
                ?>
            </table>


            <div style="display: flex" >
                <button type="button" class="btn btn-primary nice-box-shadow">
                    <a href="create.php" class="text-white" style="text-decoration: none">Add a customer</a>
                </button>
                <!-- for de hien thi so trang -->
                <nav class="justify-content-center mx-auto" style="height: 38px">
                    <ul class="pagination justify-content-center">
                        <li class="page-item" style="width: 40px">
                            <a class="page-link"
                                <?php
                                if ($page == 1) {
                                    echo 'href="#"';
                                } else {
                                    echo 'href="?page=' . ($page - 1) . ' & search=' . $search . '"';
                                }
                                ?>>
                                <span class="bi-caret-left-fill"></span>
                            </a>
                        </li>
                        <li class="page-item" style="width: 120px">
                            <?php
                            for ($i = 1; $i <= $countPage; $i++) {
                            }
                            ?>
                            <span class="page-link">
                            Page <?= $page ?> / <?= ($i - 1) ?>
                        </span>
                        </li>
                        <li class="page-item" style="width: 40px">
                            <a class="page-link"
                                <?php
                                if ($page == ($i - 1)) {
                                    echo 'href="#"';
                                } else {
                                    echo 'href="?page=' . ($page + 1) . ' & search=' . $search . '"';
                                }
                                ?>>
                                <span class="bi-caret-right-fill"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>


