<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh Sách Sản Phẩm</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                        <a href="/admin/?pages=product&action=add" class="btn btn-primary">
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
                        <th>Tên Sản Phẩm</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Mô Tả</th>
                        <th>Hình Ảnh</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db = new product();
                    $add = $db->getList();
                    $i = 1;
                    foreach ($add as $list) {
                        extract($list);
                        // var_dump($list);
                        echo '<tr>


                                                <td>' . $i . '</td>
                                                <td>' . $name . '</td>
                                                <td>' . number_format($price) . ' đ</td>
                                                <td>' . $content . '</td>
                                                <td>
                                                    <img src=" ' . $img_path . $thumbnail . ' " style="width:100px">
                                                 </td>
                                                <td>
                                                    <a href="/admin/?pages=product&action=edit&id=' . $id . '" class="btn btn-primary">Sửa</a>
                                                    <a onclick="return confirm(`Bạn có chắc muốn xóa không?`);" href="/admin/?pages=product&action=delete&id=' . $id . '" type="button" class="btn btn-danger">Xóa</a>
                                                </td>
                                            </tr>';
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