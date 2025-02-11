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
            <h4 class="p-3">Danh sách voucher</h4>
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
                        <a href="index.php?act=create-voucher" class="text-light">Tạo Voucher</a>
                    </button>
                </div>
            </div>


            <div class="pt-4 ms-4 me-4">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Voucher</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Ngày khả dụng</th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Trạng thái hoạt động</th>
                            <th scope="col">Trạng thái khả dụng</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsVoucher as $key => $voucher) {
                        ?>

                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">
                                <?= $i++?>
                            </td>
                            <td>
                                <div
                                    style="white-space: wrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $voucher->voucher_name?>
                                </div>
                            </td>
                            <td>
                                <?= $voucher->value?>% Tổng đơn hàng
                            </td>
                            <td>
                                <?= $voucher->start_time?>
                            </td>
                            <td>
                                <?= $voucher->end_time?>
                            </td>
                            <td>
                                <?= $voucher->voucher_quantity?>
                            </td>
                            <td>
                                <?php
                                    if ($voucher->voucher_status == 1) {
                                ?>
                                <span class="badge" style="background: #03346E;">Đang hoạt động</span>
                                <?php
                                    } else {
                                        ?>
                                <span class="badge" style="background: #6EACDA;">Không hoạt động</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if ($voucher->value == 0) { 
                                ?>
                                <span class="badge" style="background: #FFAF00;">Không thời hạn</span>
                                <?php 
                                    } elseif ($voucher->end_time < date('Y-m-d H:i:s')) {
                                ?>    
                                <span class="badge bg-danger">Đã hết hạn</span>
                                <?php
                                    } elseif ($voucher->start_time <= date('Y-m-d H:i:s') && $voucher->end_time >= date('Y-m-d H:i:s')) {
                                ?>
                                <span class="badge bg-success">Khả dụng</span>
                                <?php 
                                    } elseif ($voucher->start_time > date('Y-m-d H:i:s')) {
                                ?>
                                <span class="badge" style="background: black;">Chưa khả dụng</span>
                                <?php
                                    } else {
                                ?>
                                <span class="badge bg-danger">Không xác định</span>
                                <?php    
                                    }
                                ?>
                            </td>
                            
                            <td>
                                <button class="btn" style="background: #141F46;">
                                    <a href="index.php?act=show-one-voucher&voucher_id=<?= $voucher->voucher_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Cập nhật
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php
                        }
                        // var_dump(date('Y-m-d H:i:s'));
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