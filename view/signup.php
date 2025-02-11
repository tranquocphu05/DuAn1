<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="shortcut icon" href="../img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/sign_in.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>
    <?php
        include "view/Component/header.php";
    ?>
    <!-- End header -->
    <main>
        <div class="bg_signin">
            <nav>
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </li>
                    <li>
                        <h5>Đăng kí tài khoản</h5>
                    </li>
                </ul>
            </nav>
            
            <div id="signin-form" class="signin-form" >
                <div class="largebox">
                    <h2>Đăng Ký</h2>
                    <form action="" method="post" class="main-form" enctype="multipart/form-data">
                        <input type="text" id="username" name="acc_name" placeholder="Tài khoản *">
                        <input type="password" id="password" name="acc_password" placeholder="Mật khẩu *">
                        <input type="password" id="password" name="password" placeholder="Xác nhận mật khẩu *">
                        <?php
                            if ($tb_pass !== "") { ?>
                                <p id="tb"> 
                                   <?=$tb_pass?>
                                </p>
                                <?php
                            } else {
                                
                            }
                        ?>
                        <input type="email" id="email" name="acc_email" placeholder="Email *">
                        <?php
                            if ($tb !== "") { ?>
                                <p id="tb"> 
                                   <?=$tb?>
                                </p>
                                <?php
                            } else {
                                
                            }
                        ?>
                        <input type="text" id="phonenumber" name="acc_phone" placeholder="Số điện thoại *">        
                        <input type="file" id="" name="image_upload" >        
                        <button type="submit" class="signin" name="submitFormSignup">Đăng Ký</button>
                        <span class="signin">
                            <h6>Bạn đã có tài khoản?</h6>
                            <a href="?act=login">Đăng nhập</a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "view/Component/footer.php";
    ?>

    <script src="scripts.js"></script>
    <script>
        $(document).ready(function () {
            // Tìm <li> có sub
            $('.sub_menu').parent('li').addClass('has_child');
        })
    </script>



</body>

</html>