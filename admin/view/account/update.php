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
        <div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
            <form action="" class="pb-5 mt-4 ms-4 me-4" method="POSt" enctype="multipart/form-data">
                <div>
                    <h4 class="p-3">Cập nhật tài khoản</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="">
                        <label for="inputEmail4" class="form-label">Ảnh đại diện</label><br>
                        <img src="../img/account/<?= $info->acc_image ?>" alt="" style="width:200px; margin: 5px 0 20px;"
                            name="existing_image">
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            placeholder="Nhập đầy đủ họ và tên" name="acc_name" value="<?= $info->acc_name ?>" disabled>
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập email"
                            name="acc_email" value="<?= $info->acc_email ?>" disabled>
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            placeholder="Nhập số điện thoại" name="acc_phone" value="<?= $info->acc_phone ?>"  disabled>
                    </div>
                    <div class="mt-3">
                        <span class="form-label">Trạng thái tài khoản</span>
                        <div class="row ps-3 pt-2">
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="1" name="acc_status"
                                    <?= $info->acc_status == "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hoạt động
                                </label>
                            </div>
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="0" name="acc_status"
                                    <?= $info->acc_status != "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Không hoạt động
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="form-label">Vai trò quản lí tài khoản</span>
                        <div class="row ps-3 pt-2">
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="1" name="acc_role"
                                    <?= $info->acc_role == "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Admin - Quản trị viên
                                </label>
                            </div>
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="0" name="acc_role"
                                    <?= $info->acc_role != "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Client - Khách hàng
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="submitFormUpdateAccount">Cập nhật</button>
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