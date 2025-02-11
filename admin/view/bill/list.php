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
            <h4 class="p-3">Danh sách đơn hàng</h4>
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
                <!-- <div class="me-4">
                    <button class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>
                        <a href="index.php?act=create-account" class="text-light">Thêm</a>
                    </button>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        <a href="" class="text-light">Xóa</a>
                    </button>
                </div> -->
            </div>


            <div class="pt-4 ms-4 me-4">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">STT</th>
                            <th scope="col">Mã đơn hàng</th>
                            <!-- <th scope="col">ID Tài khoản</th> -->
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ nhận hàng</th>
                            <th scope="col">Ngày tạo đơn</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Trạng thái đơn hàng</th>
                            <th scope="col">Trạng thái thanh toán</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsBill as $key => $bill) {
                        ?>

                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">
                                <?= $i++?>
                            </td>
                            <td scope="row">
                                <?= $bill->bill_id?>
                            </td>
                            <!-- <td scope="row">
                                <?= $bill->acc_id?>
                            </td> -->
                            <td scope="row">
                                <?= $bill->fullname?>
                            </td>
                            <td scope="row">
                                <?= $bill->phone?>
                            </td>
                            <td scope="row">
                                <div
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $bill->address?>
                                </div>
                            </td>
                            <td scope="row">
                                <?= $bill->date_order?>
                            </td>
                            <td scope="row">
                                <?= $bill->bill_total?>
                            </td>
                            <td scope="row">
                                <?php
                                    if ($bill->bill_status == 2) {
                                ?>
                                <span class="badge" style="background: #FFAF00;">Đang giao hàng</span>
                                <?php
                                    } else if ($bill->bill_status == 3) {
                                ?>
                                <span class="badge bg-success">Đã nhận hàng</span>
                                <?php
                                    } else if ($bill->bill_status == 1) {
                                ?>
                                <span class="badge" style="background: #03346E;">Đã xác nhận</span>
                                <?php
                                    } else if ($bill->bill_status == 0) {
                                ?>
                                <span class="badge" style="background: #6EACDA;">Chờ xác nhận</span>
                                <?php
                                    } else if ($bill->bill_status == 4) {
                                ?>
                                <span class="badge bg-danger">Đã hủy đơn</span>
                                <?php
                                    } else {
                                ?>
                                <span class="badge" style="background: black;">Lỗi</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td scope="row">
                                <?php
                                    if ($bill->payment_status == 1) {
                                ?>
                                <span class="badge bg-danger">Chưa thanh toán</span>
                                <?php
                                    } else if ($bill->payment_status == 0) {
                                ?>
                                <span class="badge bg-success">Đã thanh toán</span>
                                <?php
                                    } else {
                                ?>
                                <span class="badge" style="background: black;">Lỗi</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td scope="row">
                                <button class="btn" style="background: #141F46;">
                                    <a href="index.php?act=view-bill-detail&bill_id=<?= $bill->bill_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-circle-info"></i> Cập nhật
                                    </a>
                                </button>
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