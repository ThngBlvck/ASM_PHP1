<?php
include './models/database.php'; 
// kiem tra
if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = 1;

    $sql = "INSERT INTO users(`name`, `email`, `password`, `phone`, `address`, `status`) 
            VALUES ('$name', '$email', '$password', '$phone', '$address', '$status')";
    $result = $connection->query($sql);

    if ($result) {
        echo "Đăng ký thành công.";
        // header('Location: login.php');
    } else {
        echo "Lỗi: " . $connection->error;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
    <link rel="stylesheet" href="style.css">
<body>
    <main>
<form action="register.php" method="POST" id="contactForm" novalidate="novalidate">
<div class="wrapper">
        <div class="logo">
            <img src="Logo.png" alt="">
        </div>
        <div class="text-center mt-4 name">
        Register from
        </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" class="form-control" required name="name" placeholder="Nhập Tên Tài Khoản">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" class="form-control" required name="email" placeholder="Nhập Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" class="form-control" required name="password" placeholder="Nhập Password">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" class="form-control" required name="phone" placeholder="Nhập Số Điện Thoại">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" class="form-control" required name="address" placeholder="Nhập Địa Chỉ">
            </div>
            <button class="btn mt-3" type="submit" value="submit" name="register">Save</button>
        <div class="text-center fs-6">
         <a href="login.php">Login</a>
        </div>
    </div>
</form>


    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>