<?php
class product
{
    var $id = null;
    var $name = null;
    var $content = null;
    var $price = null;
    var $status = null;
    var $thumbnail = null;
    var $categories_id = null;

    //Hiển thị bảng
    public function getList()
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products";
        $result = $pdo->pdo_query($sql);
        return $result;
    }


    //Hiển thị mãư
    public function getById( $id){
        $pdo = new connect();
        $sql = 'SELECT * FROM products WHERE id  = '.$id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

    //Edit
    public function getupdate($id, $categories_id, $name, $price, $thumbnail,  $content,  $status)
    {
        $pdo = new connect();
        $sql = "UPDATE products SET id = '$id', name = '$name', categories_id = '$categories_id' , price = '$price',  thumbnail = '$thumbnail', content = '$content', status = $status WHERE id = " . $id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($categories_id, $name, $price, $thumbnail,  $content , $status)
    {
        $pdo = new connect();
        $sql = "INSERT INTO products (`categories_id`, `name`, `price`, `thumbnail`, `content`, `status`) VALUES ('$categories_id', '$name', '$price' ,'$thumbnail','$content', $status)";
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM products WHERE id  =' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

}
