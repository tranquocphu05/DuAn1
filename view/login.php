<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <style>
        main {
            margin: 50px 0;
        }
    </style>
</head>

<body>
    <?php
        include "view/Component/header.php"
    ?>
    <!-- End header -->
<main>
<div id="login-form" class="login-form">
        <div class="form-container">
            <span class="close-btn">×</span>
            <h2>Đăng Nhập</h2>
            <div class="via_GF">
                <button>
                    <i class="fa-brands fa-google"></i>
                    <span>Đăng nhập Google</span>
                </button>
                <button>
                    <i class="fa-brands fa-facebook"></i>
                    <span>Đăng nhập Facebook</span>
                </button>
            </div>
            <hr>
            <h6>Hoặc tài khoản</h6>
            <form action="" method="post" class="main-form">
                <input type="text" id="username" name="email" placeholder="Email">
                <?php
                            if ($tb !== "") { ?>
                                <p id="tb"> 
                                   <?=$tb?>
                                </p>
                                <?php
                            } else {
                                
                            }
                        ?>
                <input type="password" id="password" name="password" placeholder="Mật khẩu">
                <p class="miss_pw"><a href="">Quên mật khẩu ?</a></p>
                <button type="submit" class="login" name="loginSubmit">Đăng Nhập</button>
                <p class="signin"><a href="?act=signup">Đăng kí ngay</a></p>
            </form>
        </div>
    </div>
</main>
    <?php
        include "view/Component/footer.php"
    ?>
</body>

</html>