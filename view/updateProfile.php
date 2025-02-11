<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/sign_in.css">
    <link rel="stylesheet" href="giaodien/userDetail.css">
    <link rel="stylesheet" href="giaodien/updateProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>
    <?php
    include "view/Component/header.php"
    ?>
    <!-- End header -->
    <main>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Trang chủ</a>
                    <i class="fa-solid fa-angle-right"></i>
                </li>
                <li>
                    <h5>Profile</h5>
                </li>
            </ul>
        </nav>
        <div class="profile"> Cập nhật thông tin tài khoản</div>
        <div class="Profile_content">
            <form action="" method="POST" enctype="multipart/form-data" class="form-edit-profile">
                <div class="main-form">
                    <div class="col">
                        <?php if ($_POST['acc_image'] == "") { ?>
                            <img src="img/account/user_default.png" alt="">
                        <?php } else { ?>
                            <img src="img/account/<?= $_POST['acc_image'] ?>" alt="">
                        <?php }; ?>
                        <input type="file" name='image_upload' value="">
                    </div>

                    <div class="col">
                        <label for="">Tên đăng kí</label>
                        <input type="text" name='acc_name' value='<?= $_POST['acc_name'] ?>' required>
                        <label for="">Email</label>
                        <input type="email" name='acc_email' value='<?= $_POST['acc_email'] ?>' readonly>
                    </div>

                    <div class="col">
                        <label for="">Mật khẩu</label>
                        <input type="password" name='acc_password' value='<?= $_POST['acc_password'] ?>' required>
                        <label for="">Số điện thoại</label>
                        <input type="text" name='acc_phone' value='<?= $_POST['acc_phone'] ?>' required>
                    </div>
                </div>

                <div class="update_profile">
                    <a href="" class="btn-edit">
                        <button name='updateFormProfile'>Cập nhật</button>
                    </a>
                </div>

            </form>
        </div>
    </main>
    <hr>
</body>
<?php include "view/Component/footer.php" ?>

</html>