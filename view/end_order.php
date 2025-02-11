<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/order.css">
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
        <h2 style="text-align: center;">
            <?php if(isset($popup)) {
                echo $popup;
            } else {
                echo "Đặt hàng thành công.<br>Theo dõi đơn hàng của bạn tại trang thông tin cá nhân!!!";
            } ?>
           
        </h2>
</main>
    <?php
        include "view/Component/footer.php"
    ?>
</body>

</html>