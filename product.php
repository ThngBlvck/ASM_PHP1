<?php
include("./particals/header.php");
include './admin/modules/category/category.php';
include './admin/modules/product/product.php';
include "./admin/components/pdo.php";

?>
<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>
                <?php
                $db = new category();
                $result = $db->getList();
                foreach ($result as $item) {
                ?>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="index.php?page=category&iddm=<?= $item['id'] ?>">
                        <?= $item['name'] ?>
                </button>
                <?php } ?>
            </div>
            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>
            </div>
        </div>
        <div class="row isotope-grid">
            <?php
            $db = new product();
            $result = $db->getList();
            foreach ($result as $item)
            // Hiển thị sp
            { ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->

                    <div class="block2">

                        <div class="block2-pic hov-img0">
                            <img src="./upload/<?php echo $item['thumbnail'] ?? '' ?>" width="550px" height="300px" alt="IMG-PRODUCT">
                            <a href="single-products.php?id=<?php echo $item['id'] ?? '' ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Chi tiết sản phẩm
                            </a>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="single-products.php?id=<?php echo $item['id'] ?? '' ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?php echo $item['name'] ?? '' ?>
                                </a>
                                <span class="stext-105 cl3" style="color: red;">
                                    <?php echo number_format($item['price']) ?? '' ?> đ
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include("./particals/footer.php"); ?>