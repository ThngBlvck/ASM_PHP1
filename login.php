<?php
session_start(); // Bắt đầu phiên làm việc

include './models/database.php';

// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang chính
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Kiểm tra nếu có dữ liệu gửi đi từ form
if (!empty($_POST)) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Truy vấn kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu không
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $connection->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) {
            // Lưu thông tin người dùng vào phiên làm việc
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            // Chuyển hướng đến trang chính sau khi đăng nhập thành công
            header("Location: index.php");
            exit;
        } else {
            $error = "Mật khẩu không chính xác.";
        }
    } else {
        $error = "Email không tồn tại.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <main>
        <form action="" method="POST">
            <div class="wrapper">
                <div class="logo">
                    <img src="Logo.png" alt="">
                </div>
                <div class="text-center mt-4 name">
                    Login from
                </div>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" class="form-control" required id="email" name="email" placeholder="Nhập Email">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" class="form-control" required id="password" name="password" placeholder="Nhập Password">
                </div>
                <button type="submit" class="btn mt-3" value="submit" name="login">Login</button>
                <div class="text-center fs-6">
                    <a href="register.php">Sign Up</a>
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