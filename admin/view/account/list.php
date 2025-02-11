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
        <div class="shadow bg-light pb-5 mt-4 ms-4 mb-4 col-md-10">
            <h4 class="p-3">Danh sách tài khoản</h4>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <form action="" class="ms-4">
                    <div class="input-group input-group-sm">
                        <input class="form-control rounded-0 mb-2" type="search" id="search" name="search"
                            placeholder="Nhập từ khóa tìm kiếm" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm">
                        <div class="input-group-sm">
                            <button type="button" class="btn btn-secondary rounded-0">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="me-4">
                    <button class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>
                        <a href="index.php?act=create-account" class="text-light">Thêm tài khoản</a>
                    </button>
                    <!-- <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        <a href="" class="text-light">Xóa</a>
                    </button> -->
                </div>
            </div>


            <div class="pt-4 ms-4 me-4">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">STT</th>
                            <!-- <th scope="col">IDA</th> -->
                            <th scope="col">Ảnh đại diện</th>
                            <th scope="col">Tên tài khoản</th>
                            <!-- <th scope="col">Mật khẩu</th> -->
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsAccount as $key => $acc) {
                        ?>

                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">
                                <?= $i++?>
                            </td>
                            <!-- <td scope="row">
                                <?= $acc->acc_id?>
                            </td> -->
                            <td>
                                <img src="../img/account/<?= $acc->acc_image ?>" alt="" style="width:80px;">
                            </td>
                            <td>
                                <div
                                    style="white-space: wrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $acc->acc_name?>
                                </div>
                            </td>
                            <!-- <td>
                                <div
                                    style="white-space: wrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $acc->acc_password?>
                                </div>
                            </td> -->
                            <td>
                                <div
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 150px;">
                                    <?= $acc->acc_email?>
                                </div>
                            </td>
                            <td>
                                <div
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $acc->acc_phone?>
                                </div>
                            </td>
                            <td>
                                <?php
                                    if ($acc->acc_status == 1) {
                                ?>
                                <span class="badge bg-success ">Đang hoạt động</span>
                                <?php
                                    } else {
                                        ?>
                                <span class="badge bg-danger">Không hoạt động</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if ($acc->acc_role == 1) {
                                ?>
                                <span class="badge" style="background: #FFB200;">Admin</span>
                                <?php
                                    } else {
                                        ?>
                                <span class="badge" style="background: black">Khách hàng</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-success">
                                    <a href="index.php?act=read-one-account&acc_id=<?= $acc->acc_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                                    </a>
                                </button>
                                <!-- <button class="btn" style="margin-top:5px; background: #141F46;">
                                    <a onclick="return confirm('Xác nhận đổi vai trò tài khoản #<?= $acc->acc_id?>?')"
                                        href="index.php?act=update-role-account&acc_id=<?= $acc->acc_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-arrows-rotate"></i> Đổi vai trò
                                    </a>
                                </button>
                                <button class="btn btn-danger" style="margin-top:5px;">
                                    <a onclick="return confirm('Xác nhận đổi trạng thái tài khoản #<?= $acc->acc_id?>?')"
                                        href="index.php?act=update-status-account&acc_id=<?= $acc->acc_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-arrows-rotate"></i> Đổi trạng thái
                                    </a>
                                </button> -->
                            </td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
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