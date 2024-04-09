<?php

$id = $_GET['id'] ?? '';
// lấy dữ liệu để hiển thị input
if (!empty($id)) {
    $product = new product();
    $result = $product->getById($id);
    extract($result);
  
}

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $categories_id = $_POST['categories_id'] ?? "";
      $name   = $_POST['name'] ?? "";
      $price = $_POST['price'] ?? "";
      $thumbnail = save_file('image', $UPLOAD_URL);
      $content = $_POST['content'] ?? "";
      $status = '1';

    // kt loi ten
    if (empty($name)) {
      $error_name = 'Vui lòng nhập thông tin';
    }
    // lt loi gia
    if (empty($price)) {
      $error_price = "Vui lòng không bỏ trống giá";
    } else {
      $pattern = '/[a-z]/';
      if (preg_match($pattern, $price)) {
        $error_price = 'Giá phải là số';
      }
    }
    // kt loi k chon danh muc
    if (empty($categories_id)) {
      $error_category = "Vui lòng chọn danh mục";
    }
    // kt loi k nhap content
    if (empty($content)) {
      $error_content = "Không được bỏ trống";
    }
    // kt loi k chon hinh
    if (empty($thumbnail)) {
      $error_thumbnail = "Vui lòng chọn ảnh";
    }




    // var_dump($name, $price, $image, $category_id, $content);
    if (!isset($error_name) && !isset($error_price)  && !isset($error_category) && !isset($error_content) && !isset($error_thumbnail) && !isset($error_status)) {
      $db = new product();
      $result = $db->getupdate($id, $categories_id, $name, $price, $thumbnail,  $content,  $status);

      $_SESSION['message'] = "Thêm sản phẩm thành công";
      header('location:  /admin/?pages=product&action=list');
    }
  }
  ?>

    <section class="content">
      <div class="container-fluid">
        <!-- viết code giao diện ở đây -->
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa Sản Phẩm</h3>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="categories_id">Danh Mục</label>
                      <select class="form-control" name="categories_id">
                        <option value="">Chọn danh mục</option>
                        <?php
                        $db = new category();
                        $list = $db->getList();
                        foreach ($list as $item) {
                          if ($item['id'] == $categories_id) {
                              echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                          } else {
                              echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                          }
                      }
                        ?>
                      </select>
                      <?php
                      if (isset($error_category)) {
                        echo '<small class="text-danger">' . $error_category . '</small>';
                      }
                      ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="name">Tên Sản Phẩm</label>
                      <input type="text" class="form-control" name="name" value="<?= $name  ?>">
                      <?php
                      if (isset($error_name)) {
                        echo '<small class="text-danger">' . $error_name . '</small>';
                      }
                      ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="price">Giá</label>
                      <input type="text" class="form-control" name="price" value="<?= $price ?>">
                      <?php
                      if (isset($error_price)) {
                        echo '<small class="text-danger">' . $error_price . '</small>';
                      }
                      ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputFile">Hình Ảnh</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" value="<?=$thumbnail?>" name="image">
                          <label class="custom-file-label" for="exampleInputFile">Choose
                            file</label>

                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                      <?php
                      if (isset($error_thumbnail)) {
                        echo '<small class="text-danger">' . $error_thumbnail . '</small>';
                      }
                      ?>
                    </div>
                    <input type="hidden" name="views" value="0">
                    <div class="form-group col-12">
                      <label for="" class="form-label">Mô tả</label>
                      <textarea name="content" id="summernote" class="form-control" rows="10"><?= $content ?></textarea>
                      <?php
                      if (isset($error_content)) {
                        echo '<small class="text-danger">' . $error_content . '</small>';
                      }
                      ?>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <!-- <input type="submit" class="btn btn-primary" value="Thêm" name="addpro"> -->
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-primary">Huỷ</button>
                    <a href="/admin/?pages=product&action=list" class="btn btn-primary">Danh Sách</a>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>