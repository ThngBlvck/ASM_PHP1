<?php
class user
{
    var $id = null;
    var $name = null;
    var $email = null;
    var $password = null;
    var $status = null;
    var $phone = null;
    var $address = null;

    //Hiển thị bảng
    public function getList()
    {
        $pdo = new connect();
        $sql = "SELECT * FROM users";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

}
