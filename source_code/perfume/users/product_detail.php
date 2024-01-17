<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../resources/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../resources/css/main.css">
    <title> Product's Detail</title>
</head>
<body>
<div>
<?php
    session_start();
    include_once "../layouts/navbar.php";
    //Lấy id của sp
    $id = $_GET['id'];
    //Mở kết nối
    include_once '../connect/open.php';
    //Viết query
    $sql = "SELECT products.*, products.image, sizes.size AS size_name, brands.brand_name 
            FROM products
            INNER JOIN sizes ON sizes.id = products.size_id
            INNER JOIN brands ON brands.id = products.brand_id
            WHERE products.id = '$id'";
    //Chạy query
    $products = mysqli_query($connect, $sql);

    //Đóng kết nối
    include_once '../connect/close.php';
    foreach ($products as $product){
?>
        <div class="d-flex justify-content-between">
            <div class="w-100 text-uppercase text-center fs-4 fw-bold">MEN'S PERFUMES</div>
        </div>
    <br>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">

                            <!-- Card -->
                            <div class="card">
                                <!-- Item -->
                                <div class="flickity-viewport" style="width: 389px;">
                                    <div class="flickity-slider"">
                                        <img src="<?= $product["image"] ?>" class="card-header" height="389px">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 ps-lg-10">

                            <!-- Heading -->
                            <h3 class="mb-2"> <?= $product['product_name'] ?> </h3>

                            <!-- Price -->
                            <div class="mb-7">
                                <p class="ms-1 fs-5 fw-bolder text-danger"> $<?= $product['price'] ?></p>
                            </div>
                            
                            <!-- Brand -->
                            <p class="mb-5">
                                Brand: <strong id="colorCaption"> <?= $product['brand_name'] ?> </strong>
                            </p>

                            <!-- Size -->
                            <p class="mb-5">
                                Size: <strong><span id="sizeCaption"><?= $product['size_name'] ?> </span>ml</strong>
                            </p>

                            <div class="col-12 col-lg">
                                <!-- Submit -->
                                <button type="submit" class="btn w-50 btn-dark mb-2">
                                    Add to Cart <i class="fe fe-shopping-cart ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
?>

</div>
<script src="../resources/bootstrap/js/bootstrap.js"></script>
<script src="../resources/js/product.js"></script>
</body>
</html>
