<?php
include "./models/database.php";
// $query_home = "SELECT id as product_id, name, price, thumbnail FROM products";
// $result_home = $connection->query($query_home);

// if ($result_home->num_rows === 0) {
//     header("Location: index.php");
// } else {
//     // echo "Kết nối dữ liệu thành công.";
// }

include("./particals/header.php");
include './admin/modules/category/category.php';
include './admin/modules/product/product.php';
include "./admin/components/pdo.php";
?>

<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <ul class="list-unstyled templatemo-accordion border rounded p-3">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Danh mục
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a><?php
                        $db = new category();
                        $result = $db->getList();
                        foreach ($result as $item) {
                        ?>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="index.php?page=category&iddm=<?= $item['id'] ?>"><?= $item['name'] ?></a>
                            </li>
                        <?php } ?>
                        </ul>
                </li>
            </ul>
        </div>


        <div class="col-lg-9">
            <div class="row">
            <?php $db = new product();
                    $result = $db->getList();
                    foreach ($result as $item)
                    // Hiển thị sp
                    { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="./upload/<?php echo $item['thumbnail'] ?? '' ?>" style="width: 310px; height: 220px;">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                            <div class="card-body">
                                <a class="h3 text-decoration-none" href="single-products.php?id=<?php echo $item['product_id'] ?? '' ?>" ><?php echo $item['name'] ?? '' ?></a>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    
                                </ul>
                                <p class="text-center mb-0">Giá: <?php echo number_format($item['price']) ?? '' ?> đ</p>
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2 container" href="single-products.php?id=<?php echo $num_rows['product_id'] ?? '' ?>"><i class="bi bi-bag"></i>Chi tiết sản phẩm</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>

        </div>
    </div>
</div>