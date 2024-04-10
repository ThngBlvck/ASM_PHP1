<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh Sách Người Dùng </h3>
            <div class="card-tools">
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 470px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db = new user();
                    $add = $db->getList();
                    $i = 1;
                    foreach ($add as $list) {
                        extract($list);
                        echo '<tr>
                                                <td>' . $i . '</td>
                                                <td>' . $name . '</td>
                                                <td>' . $email . '</td>
                                                <td>' . $phone . '</td>
                                                <td>' . $address . '</td>
                                                <td>
                                                    <a href="/admin/?pages=user&action=list" class="btn btn-primary">Xem chi tiết</a>
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