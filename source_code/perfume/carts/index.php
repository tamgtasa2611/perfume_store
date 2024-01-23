<?php
//Cho phép làm việc với session
session_start();
//Kiểm tra đã tồn tại số đth trên session hay chưa, nếu chưa tồn tại thì cho quay về account
if (!isset($_SESSION['email'])) {
    //Quay về trang account
    header("Location: ../admins/login_logout/login.php");
}
?>
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
    <title>Cart</title>

</head>
<body>
<?php
include_once '../layouts/navbar.php';
?>

<h1 align="center" style="margin: 70px 0 50px 0; color: black"> My Shopping Cart</h1>
<form method="post" action="update_cart.php">
    <table class="demo_bill" border="0" cellpadding="1" cellspacing="0" width="80%" align="center">
        <tr style="text-align: center; height: 40px; border-bottom: 1px solid black">
            <th style="text-align: center; width: 130px"> Image</th>
            <th style="text-align: left;"> Description </th>
            <th width="160px"> Each Price </th>
            <th width="70px"> Quantity </th>
            <th style="text-align: center; width: 100px"> Count </th>
            <th style="text-align: center; width: 100px"> Remove </th>
        </tr>

        <?php
            //Mở kết nối
            include_once '../connect/open.php';
            $count_money = 0;
            //Trong trường hợp chưa có carts ở trên session
            $carts = array();
            //Lấy carts từ session về trong trường hợp đã có carts
            if(isset($_SESSION['carts'])){
                $carts = $_SESSION['carts'];
            }
            foreach ($carts as $id => $quantity){
            //Sql lấy thông tin sp theo id
                $sql = "SELECT * FROM products WHERE id = '$id'";
            //Chạy query
                $products = mysqli_query($connect, $sql);
                foreach ($products as $product){
        ?>
        <tr>
        <td align="center" style="vertical-align: center; height: 140px;">
            <a href="../users/product_detail.php?id=<?= $product['id']; ?>">
                <img src="<?= $product['image']; ?>" width="90px" height="auto">
            </a>
        </td>
        <td>
            <span>
                <?= $product['product_name']; ?>
            </span>
        </td>
        <td align="center">
            $<?= $product['price']; ?>
        </td>
        <td align="center">
            <input type="hidden" name="id" value="<?= $product['id']; ?>">
            <input style="width: 50px" type="number" min="1" max="<?= $product['quantity']?>" value="<?= $quantity ?>" name="quantity[<?= $id; ?>]">
        </td>
        <td align="center">
            $<?php
                //Tính thành tiền của từng sp có trong trong carts
                $money = $product['price'] * $quantity;
                //Tính tổng tiền của các sp có trong trong carts
                $count_money += $money;
                echo $money;
            ?>
        </td>

        <!--REMOVE-->
        <td align="center">
            <button class="btn bg-danger">
                <a style="text-decoration: none; color: white" href="remove.php?id=<?= $product['id'] ?>">
                    Remove
                </a>
            </button>

        </td>
    </tr>

        <?php
                }
            }
        if($count_money != 0){
        ?>
        <tr>
            <td class="total_cost" colspan="6" align="end">
                Total:
                <?php
                    //Hiển thị tổng tiền của các sp có trong carts
                    echo "$" . $count_money;
                ?>
            </td>
        </tr>
        <tr>
            <td class="total_cost" colspan="6" align="center">
                <button class="btn bg-warning" type="submit">
                    <a style="text-decoration: none; color: white" href="update_cart.php">Update cart</a>
                </button>
            </td>
        </tr>
        <?php
            }else{
        ?>
           <tr>
               <td style="text-align: center" colspan="7">
                   <h3> Your cart is empty. </h3>
               </td>
           </tr>
        <?php
            }
        ?>
    </table>
</form>
<div class="modal__content">
    <!--Link để quay về trang danh sách sản phẩm-->
    <button class="btn bg-primary">
        <a style="text-decoration: none; color: white" href="../users/for_him.php">Product List</a>
    </button>

    <?php
    if($count_money != 0){
    ?>
    <button class="btn bg-danger">
        <a style="text-decoration: none; color: white" href="delete_cart.php"> Delete cart </a>
    </button>


    <!-- Payment -->
    <button class="btn bg-success">
        <a style="text-decoration: none; color: white" href="receive.php"> Order </a>
    </button>
    <?php
        }
    ?>
</div>


<!-------------------- FOOTER -------------------->
<?php
    include_once '../layouts/footer.php';
?>
<!-------------------- END FOOTER -------------------->

</body>
</html>