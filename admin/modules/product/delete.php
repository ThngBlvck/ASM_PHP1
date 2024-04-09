<?php
        $id=$_GET['id'];
        try{
            $db = new product();
            $del = $db->getDeLeTe($id);
            $_SESSION['message'] = "Xóa thành công";
        } catch (Exception $e) {
            $_SESSION['error'] = "Không thể xóa";
        }
        
        header('location: /admin/?pages=product&action=list');

?>