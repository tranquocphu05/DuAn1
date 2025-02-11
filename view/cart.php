<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/Clientstyle.css">
    <link rel="stylesheet" href="giaodien/home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>

    <style>
    header {
        width: 100%;
    }

    a {
        text-decoration: none;
    }

    main {
        margin-top: 100px;
    }

    .div_lg h5 {
        font-size: 16px;
    }

    #admin {
        position: absolute;
        top: -16px;
        left: 74px;
        width: 50px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        color: #ffffff;
        background-color: #141F46;
        font-size: 16px;
    }

    #acc_name {
        position: absolute;
        top: -26px;
        left: -31px;
        width: 150px;
        color: #141F46;
        font-size: 16px;
    }

    .div_lg1 h5 {
        font-size: 16px;
    }
    </style>
</head>

<body>
    <?php
    include "view/component/header.php";
    ?>
    <!-- END HEADER -->
    <!-- CONTENT -->

    <div class="banner w95">
        <div class="banner_slideshow">
            <img src="img/banner.jpg" alt="">
        </div>
        <div class="banner_content">
            <h3><span></span>Xu hướng 2024</h3>
            <h1>thiết kế nội thất</h1>
            <p>Xu hướng thiết kế nội thất Bắc Âu được giới trẻ ưu ái sử dụng
                trong những năm gần nhờ vào trào lưu sống xanh, bền vững và
                yêu môi trường với chi phí phù hợp
            </p>
            <h3><a href="">mua ngay</a></h3>
        </div>
    </div>
    <!-- Main content -->
    <main class="container">
        <div class="" style="text-align:center;">
            <h4>MY CART </h4>
        </div>
        <div class="d-flex justify-content-between mb-3" style="float:right;">
            <div>
                <a onclick="return confirm('Xác nhận xóa toàn bộ sản phẩm trong giỏ hàng?')" 
                    href="index.php?act=deleteAllCart">
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa giỏ hàng </button>
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Đơn Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Số Tiền</th>
                    <th scope="col" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                    <form action="?act=order" method="post" id="cartForm">
                <?php

                if (isset($_SESSION['myCart'])) {
                    $index = 0; // Biến chỉ số sản phẩm

                    foreach ($_SESSION['myCart'] as $pro) : ?>
                    <tr>
                        <th scope="row" style="width: 50%;">
                            <input type="checkbox" class="me-2">
                            <img src="img/product/<?= $pro['pro_img'] ?>" width="10%" alt="">
                            <input type="text" name="imgInCart<?= $index ?>" value="img/product/<?= $pro['pro_img'] ?>"
                                hidden>
                            <input type="text" name="product_dt_id<?= $index ?>" value="<?= $pro['product_dt_id'] ?>"
                                hidden>
                            <span>
                                <?= $pro['pro_name'] ?> : <?= $pro['pro_color'] ?> <?= $pro['pro_size'] ?>
                                <input type="text"
                                    value="<?= $pro['pro_name'] ?> : <?= $pro['pro_color'] ?> <?= $pro['pro_size'] ?>"
                                    name="pro_inf<?= $index ?>" hidden>
                            </span>
                        </th>
                        <td>
                            <div class="d-flex text-center">
                                <span class="text-black fw-bold pe-2"><?= $pro['pro_price'] ?></span>
                            </div>
                        </td>
                        <td>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination d-flex">
                                    <!-- <li class="page-item">
                                        <a class="page-link text-success" aria-label="Next">
                                            <span> - </span>
                                        </a>
                                    </li> -->
                                    <li class="page-item">
                                        <a class="page-link text-success" href="#">
                                            <?= $pro['soluong'] ?>
                                            <input type="number" value="<?= $pro['soluong'] ?>"
                                                name="soluongIncart<?= $index ?>" hidden>
                                        </a>
                                    </li>
                                    <!-- <li class="page-item">
                                        <a class="page-link text-success" aria-label="Previous">
                                            <i class="fa-solid fa-plus fa-xs"></i>
                                        </a>
                                    </li> -->
                                </ul>
                            </nav>
                        </td>
                        <td style="font-weight: 600;">
                            <?= $pro['total'] ?>.000
                            <input type="number" value="<?= $pro['total'] ?>.000" name="totalOnePro<?= $index ?>"
                                hidden>
                        </td>
                        <td>
                        <a href="#" class="delete-link" data-url="index.php?act=deleteProInCart&product_dt_id=<?= $pro['product_dt_id'] ?>">
                            <button class="btn btn-danger" style="margin-left: 10px;" name="deleteProIncart" onclick="changeAction(event)">Xóa</button>
                        </a>
                    </tr>
                    <?php
                    $index++; // Tăng chỉ số sản phẩm
                    endforeach;
                    $lastIndex = $index-1;
                   
                }
                ?>
                    <input type="number" value="<?=$lastIndex?>" name="lastIndex" hidden>
                    <!-- Các trường dữ liệu tổng tiền -->

                    <td></td>
                    <td></td>
                    <td style="font-weight: 800; font-size: 20px;">
                        Tổng tiền : <?= $tongTien ?>.000
                        <input type="text" name="tongTien" value="<?= $tongTien ?>.000" hidden>
                    </td>
                    <td></td>
                    <td class="text-center">
                        <a href="">
                            <button class="btn bg-success" style="color: #fff;" name="submitInforCart">Đặt hàng</button>
                        </a>
                    </td>
                </form>
            </tbody>
        </table>

    </main>

    <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php
    include "view/component/footer.php";
    ?>
    <!-- END FOOTER -->
    <script>
    // Lắng nghe sự kiện click trên các nút "Xóa"
    var deleteLinks = document.querySelectorAll('.delete-link');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn chuyển hướng trang mặc định
            var url = this.dataset.url;
            window.location.href = url; // Chuyển hướng trang đến đường dẫn trong thuộc tính data-url
        });
    });
</script>
</body>

</html>