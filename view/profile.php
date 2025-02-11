<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/sign_in.css">
    <link rel="stylesheet" href="giaodien/userDetail.css">
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
        <div class="profile">tài khoản cá nhân</div>
        <div class="main_content">
            <form action="?act=update_profile" method="POST" enctype="multipart/form-data" class="form-profile">
                <div class="avatar">
                    <?php
                    if ($info->acc_image == "") { ?>
                    <img src="img/account/user_default.png" alt="">
                    <?php  } else { ?>
                    <img src="img/account/<?= $info->acc_image ?>" alt="">
                    <?php  } ?>
                    <input type="text" name='acc_image' value="<?= $info->acc_image ?>" hidden>
                </div>
                <div class="detail_info">
                    <div class="hoten">Tên đăng kí: <?= $info->acc_name ?>
                        <input type="text" name='acc_name' value='<?= $info->acc_name ?>' hidden>
                    </div>
                    <div class="email">Email: <?= $info->acc_email ?>
                        <input type="email" name='acc_email' value='<?= $info->acc_email ?>' hidden>
                    </div>
                    <div class="password">Mật khẩu: *********
                        <input type="password" name='acc_password' value='<?= $info->acc_password ?>' hidden>
                    </div>
                    <div class="password">Số điện thoại: <?= $info->acc_phone ?>
                        <input type="text" name='acc_phone' value='<?= $info->acc_phone ?>' hidden>
                    </div>
                    
                </div>
                <a href="" class="btn-edit">
                    <button name='updateProfile'>chỉnh sửa</button>
                </a>
            </form>

            <div class="inf_Order">
                <h2 style="text-align:center;padding-bottom:10px">Lịch sử đơn hàng của bạn</h2>
                <div class="all_pro_order">

                    <?php foreach ($dsOrder as $order) : ?>
                    <div class="one_pro_order">
                        <div class="Oder_img">
                            <img src="img/product/<?= $order->pro_image ?>" alt="">
                        </div>
                        <div class="Oder_inf">
                            <h5><?= $order->pro_name ?> : <?= $order->pro_color ?>, <?= $order->pro_size ?></h5>
                            <h5>Số lượng: <?= $order->quantity ?></h5>
                            <h5>Tổng tiền: <span style="color: #DC3544;"><?= $order->total ?></span></h5>
                            <h5> <span style="color: #6482AD; font-style:italic"><?= $order->date_order ?></span></h5>

                        </div>
                        <div class="h5">
                            <?php if ($order->bill_status == 0) { ?>
                            <h5 class="color0">Chờ xác nhận</h5>
                            <?php } else if ($order->bill_status == 1) { ?> 
                            <h5 class="color1"> Đơn hàng đã được xác nhận </h5>
                            <?php } else if ($order->bill_status == 2) { ?> 
                            <h5 class="color2">Đang giao hàng</h5> 
                            <?php } else if ($order->bill_status == 3) { ?> 
                            <h5 class="color3">Giao hàng thành công</h5> 
                            <?php } else if ($order->bill_status == 4) { ?> 
                            <h5 class="color4">Đã hủy đơn</h5> <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </main>
    <hr>
</body>
<?php include "view/Component/footer.php" ?>

</html>