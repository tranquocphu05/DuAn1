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
                    <h4 class="p-3">Tạo tài khoản</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="">
                        <label for="inputEmail4" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control rounded-0" id="inputEmail4" placeholder="" name="image_upload">
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập đầy đủ họ và tên" name="acc_name">
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập mật khẩu" name="acc_password" required>
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập email" name="acc_email" required>
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập số điện thoại" name="acc_phone">
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="submitFormCreateAccount">Tạo mới</button>
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