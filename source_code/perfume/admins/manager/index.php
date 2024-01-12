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

    </div>


</body>
</html>


