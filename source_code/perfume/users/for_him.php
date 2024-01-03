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
    <script src="../resources/bootstrap/js/bootstrap.js"></script>
    <title>Male Perfumes</title>
</head>
<body>
<?php
require_once '../layouts/navbar.php';
include '../connect/open.php';
?>

<div class="container-fluid vh-100 py-3 fs-6">
    <div class="d-flex justify-content-between">
        <div class="w-100 text-uppercase text-center fs-4 fw-bold">Male perfumes</div>
    </div>
    <hr>
    <div class="d-flex">
        <div class="w-20 pe-3">
            <form action="" method="get">
                <div class="w-100 filter-item">
                    <div>
                        <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                             data-bs-toggle="collapse" data-bs-target="#sort" aria-expanded="false"
                             aria-controls="sort">
                            <div class="filter-title">Sort by</div>
                            <div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="collapse collapsing expand" id="sort">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" id="re" value=""
                                           checked>
                                    <label class="form-check-label" for="re">
                                        Recommended
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" id="ne" value="">
                                    <label class="form-check-label" for="ne">
                                        Newest
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" id="lo" value="">
                                    <label class="form-check-label" for="lo">
                                        Price: Low to High
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" id="hi" value="">
                                    <label class="form-check-label" for="hi">
                                        Price: High to Low
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="w-100 filter-item">
                    <div>
                        <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                             data-bs-toggle="collapse" data-bs-target="#gender" aria-expanded="false"
                             aria-controls="gender">
                            <div class="filter-title">Gender</div>
                            <div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="collapse collapsing expand" id="gender">
                            <div>
                                <?php
                                $gender_sql = "SELECT * FROM genders";
                                $genders = mysqli_query($connect, $gender_sql);
                                foreach ($genders as $gender) {
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gender" id="g<?=$gender['id']?>" value="<?=$gender['id']?>"
                                        >
                                        <label class="form-check-label" for="g<?=$gender['id']?>">
                                            <?=$gender['gender_name']?>
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="w-100 filter-item">
                    <div>
                        <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                             data-bs-toggle="collapse" data-bs-target="#brand" aria-expanded="false"
                             aria-controls="brand">
                            <div class="filter-title">Brand</div>
                            <div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="collapse collapsing expand" id="brand">
                            <div>
                                <?php
                                $brand_sql = "SELECT * FROM brands";
                                $brands = mysqli_query($connect, $brand_sql);
                                foreach ($brands as $brand) {
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand" id="br<?=$brand['id']?>" value="<?=$brand['id']?>"
                                        >
                                        <label class="form-check-label" for="br<?=$brand['id']?>">
                                            <?=$brand['brand_name']?>
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="w-100 filter-item">
                    <div>
                        <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                             data-bs-toggle="collapse" data-bs-target="#type" aria-expanded="false"
                             aria-controls="type">
                            <div class="filter-title">Perfume type</div>
                            <div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="collapse collapsing expand" id="type">
                            <div>
                                <?php
                                $type_sql = "SELECT * FROM product_types";
                                $types = mysqli_query($connect, $type_sql);
                                foreach ($types as $type) {
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="type" id="ty<?=$type['id']?>" value="<?=$type['id']?>"
                                        >
                                        <label class="form-check-label" for="ty<?=$type['id']?>">
                                            <?=$type['type_name']?>
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="w-100 filter-item">
                    <div>
                        <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                             data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="false"
                             aria-controls="price">
                            <div class="filter-title">Price</div>
                            <div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="collapse collapsing expand" id="price">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price" id="0" value=""
                                    >
                                    <label class="form-check-label" for="0">
                                        $0 - $50
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price" id="1" value="">
                                    <label class="form-check-label" for="1">
                                        $50 - $100
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price" id="2" value="">
                                    <label class="form-check-label" for="2">
                                        $100 - $200
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price" id="3" value="">
                                    <label class="form-check-label" for="3">
                                        > $200
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="w-100 filter-item">
                    <div>
                        <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                             data-bs-toggle="collapse" data-bs-target="#capacity" aria-expanded="false"
                             aria-controls="capacity">
                            <div class="filter-title">Size</div>
                            <div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="collapse collapsing expand" id="capacity">
                            <div>
                                <?php
                                $size_sql = "SELECT * FROM sizes";
                                $sizes = mysqli_query($connect, $size_sql);
                                foreach ($sizes as $size) {
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="capacity"
                                               id="s<?= $size['id'] ?>" value="<?= $size['id'] ?>"
                                        >
                                        <label class="form-check-label" for="s<?= $size['id'] ?>">
                                            <?= $size['size'] ?>ml
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <button class="btn btn-secondary w-100">Apply</button>
            </form>
        </div>
        <div class="w-80">
            <?php
            $product_sql = "SELECT * FROM products";
            $products = mysqli_query($connect, $product_sql);
            ?>
            <div class="container text-center">
                <div class="row row-cols-3">
                    <?php
                    foreach ($products as $product) {
                        ?>
                        <div class="col product-item">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="<?= $product['image'] ?>"
                                     width="280px" alt="">
                            </div>
                            <div class="py-3">
                                <?= $product['product_name'] ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-3">
                                <div class="w-50 text-start text-success fw-bold">$<?= $product['price'] ?></div>
                                <div class="d-flex w-50 justify-content-end">
                                    <div>
                                        <i class="p-3 bi bi-star"></i>
                                    </div>
                                    <div>
                                        <i class="p-3 bi bi-bag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <hr>
            <div class="w-100 text-end">
                <div>
                    Showing <?=mysqli_num_rows($products)?> products
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
