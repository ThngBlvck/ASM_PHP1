
    <section class="content">
      <div class="container-fluid">
        <!-- viết code giao diện ở đây -->
        <!-- /.row -->
        <div class="row">
          <div id="showError" class="col-12">
            <?php
            if (isset($_SESSION['error'])) {
              $message_err = $_SESSION['error'];
              unset($_SESSION['error']);
            }
            if (isset($_SESSION['message'])) {
              $message = $_SESSION['message'];
              unset($_SESSION['message']);
            }
            if (isset($message_err))
              echo '
                                    <div class="alert alert-danger" role="alert">
                                        ' . $message_err . '
                                    </div>';
            if (isset($message))
              echo '
                                    <div class="alert alert-success" role="alert">
                                        ' . $message . '
                                    </div>';
            ?>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bảng danh mục</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                      <a href="/admin/?pages=category&action=add" class="btn btn-primary">
                        Thêm Mới
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 470px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $db = new category();
                    $add = $db->getList();
                    $i = 1;
                    foreach ($add as $list) {
                      extract($list);
                      echo '
                                                    <tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $name . '</td>
                                                    <td>
                                                    <a href="/admin/?pages=category&action=edit&id=' . $id . '" class="btn btn-primary">Sửa</a>
                                                    <a onclick="return confirm(`Bạn có chắc muốn xóa không?`);" href="/admin/?pages=category&action=delete&id=' . $id . '" type="button" class="btn btn-danger">Xóa</a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    </tr>
                                                ';
                      $i++;
                    }

                    ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
    </section>
  </div>


  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>