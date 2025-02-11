<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../giaodien/style.css">
</head>

<body>
    <?php
    include "view/component/header.php"
    ?>
    <!-- END HEADER -->
    <!-- CONTENT -->
    <main class="d-flex container">
        <!-- Sidebar trái -->
        <?php
        include "view/component/sidebar.php"
        ?>

        <!-- Main content -->
        <div class="shadow bg-ligh mt-4 ms-4 col-md-8">
            <form action="" class="mt-4 ms-4 me-4" method="POSt" enctype="multipart/form-data">
                <div>
                    <h4 class="p-3">Cập nhật sản phẩm "<?= $info->pro_name ?>" Loại "<?= $info->pro_color ?> - <?= $info->pro_size ?>"</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="">
                        <label for="inputEmail4" class="form-label">Bảng màu</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập bảng màu"
                            name="pro_color" value="<?= $info->pro_color ?>" required>
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Kich cỡ</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập kích cỡ"
                            name="pro_size" value="<?= $info->pro_size ?>" required>
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Đơn giá</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            placeholder="Nhập đơn giá.000 VNĐ" name="pro_price" value="<?= $info->pro_price ?>" required>
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Số lượng</label>
                        <input type="number" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập số lượng"
                            name="pro_quantity" value="<?= $info->pro_quantity ?>" required>
                    </div>
                    <div class="mt-3">
                        <span class="form-label">Trạng thái chi tiết sản phẩm</span>
                        <div class="row ps-3 pt-2">
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="1" name="product_dt_status"
                                    <?= $info->product_dt_status == "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Có thể bán
                                </label>
                            </div>
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="0" name="product_dt_status"
                                    <?= $info->product_dt_status != "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Không bán
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="submitFormUpdateProDetail">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php
    include "view/component/footer.php"
    ?>
    <!-- END FOOTER -->
</body>

</html>