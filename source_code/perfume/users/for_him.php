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
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
$uri = $_SERVER['REQUEST_URI'];
$filterPosition = strpos($uri, "?");
$productFilter = substr($uri, $filterPosition + 1);
$filterSort = "";
$filterPrice = "";
$filterSize = "";
$filterBrand = "";

//pagination
$recordOnePage = 6;
$sqlCountRecord = "SELECT COUNT(*) as count_record FROM products 
                    WHERE product_name LIKE '%$search%'";
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
?>

<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout fs-6">
    <div class="d-flex justify-content-between">
        <div class="w-100 text-uppercase text-center fs-4 fw-bold">Male Perfumes</div>
    </div>
    <hr>
    <div class="d-flex">
        <div class="w-20 pe-3">
            <div>
                <div>Filter</div>
            </div>
            <hr>
            <form action="" method="get">
                <input type="hidden" name="search" value="<?= $search ?>" class="d-none" readonly>
                <div class="w-100 filter-item">
                    <div>
                        <div class="d-flex justify-content-between align-items-center h-pointer filter-main"
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
                                    <input class="form-check-input" type="radio" name="sort" id="re" value="0"
                                           checked>
                                    <label class="form-check-label" for="re">
                                        Recommended
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" id="ne" value="1">
                                    <label class="form-check-label" for="ne">
                                        Newest
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" id="lo" value="2">
                                    <label class="form-check-label" for="lo">
                                        Price: Low to High
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" id="hi" value="3">
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
                                        <input class="form-check-input" type="checkbox" name="gender"
                                               id="g<?= $gender['id'] ?>" value="<?= $gender['id'] ?>"
                                        >
                                        <label class="form-check-label" for="g<?= $gender['id'] ?>">
                                            <?= $gender['gender_name'] ?>
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
                                        <input class="form-check-input" type="checkbox" name="brand"
                                               id="br<?= $brand['id'] ?>" value="<?= $brand['id'] ?>"
                                        >
                                        <label class="form-check-label" for="br<?= $brand['id'] ?>">
                                            <?= $brand['brand_name'] ?>
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
                                        <input class="form-check-input" type="checkbox" name="type"
                                               id="ty<?= $type['id'] ?>" value="<?= $type['id'] ?>"
                                        >
                                        <label class="form-check-label" for="ty<?= $type['id'] ?>">
                                            <?= $type['type_name'] ?>
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
                <button class="btn btn-dark w-100">Apply</button>
            </form>
        </div>
        <div class="w-80">
            <?php
            $sort = "";
            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                $filterSort = $_GET['sort'];
            }
            switch ($filterSort) {
                case 0:
                    $filterSort = "ORDER BY id";
                    break;
                case 1:
                    $filterSort = "ORDER BY id DESC";
                    break;
                case 2:
                    $filterSort = "ORDER BY price";
                    break;
                case 3:
                    $filterSort = "ORDER BY price DESC";
                    break;
            }
            $product_sql = "SELECT * FROM products
                            WHERE product_name LIKE '%$search%'
                            {$filterSort}
                            LIMIT $start, $recordOnePage";
            $products = mysqli_query($connect, $product_sql);
            ?>
            <div class="d-flex justify-content-end align-items-center">
                <div>
                    Showing <?= $records ?> products
                </div>
            </div>
            <hr>
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
                            <div class="my-5">
                                <?= $product['product_name'] ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-3">
                                <div class="w-50 text-start text-success fw-bold">$<?= $product['price'] ?></div>
                                <div class="d-flex w-50 justify-content-end">
                                    <a href="#" class="product-item-btn">
                                        <i class="p-3 bi bi-star-fill text-warning"></i>
                                    </a>
                                    <a href="#" class="product-item-btn">
                                        <i class="p-3 bi bi-bag-fill text-primary"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <hr>
            <?php
            if ($records > 6) {
                ?>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <nav aria-label="Products pages">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link"
                                   href="<?= ($page == 1) ? '#blank' : '?page=' . ($page - 1) . '&search=' . $search . '&sort=' . $sort ?>"
                                   aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $countPage; $i++) {
                                ?>
                                <li class="page-item <?= $i == $page ? 'active' : '' ?>" aria-current="page">
                                    <a class="page-link" href="?page=<?= $i ?>&search=<?= $search ?>&sort=<?= $sort ?>"><?= $i ?></a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link"
                                   href="<?= ($page == ($i - 1)) ? '#blank' : '?page=' . ($page + 1) . '&search=' . $search . '&sort=' . $sort ?>"
                                   aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
require_once '../layouts/footer.php';
?>
<script src="../resources/js/product.js"></script>
</body>
</html>
