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
            <h4 class="p-3">Chi tiết đơn hàng MDH - <?php echo $_GET["bill_id"]; ?></h4>
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
            </div>

            <div class="shadow bg-light mt-4 ms-4 col-md-8">
                <form action="" class="pb-5 mt-4 ms-4 me-4" method="POSt" enctype="multipart/form-data">
                    <div class="row">
                        <div class="" style="margin-top:10px">
                            <label for="inputEmail4" class="form-label">Tài khoản đặt hàng</label>
                            <input type="text" class="form-control rounded-0" id="inputEmail4"
                                value="<?= $info->acc_name ?>" disabled>
                        </div>
                        <div class="" style="margin-top:10px">
                            <label for="inputEmail4" class="form-label">Người nhận hàng</label>
                            <input type="text" class="form-control rounded-0" id="inputEmail4"
                                value="<?= $info->fullname ?>" disabled>
                        </div>
                        <div class="" style="margin-top:10px">
                            <label for="inputEmail4" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control rounded-0" id="inputEmail4"
                                value="<?= $info->phone?>" disabled>
                        </div>
                        <div class="" style="margin-top:10px">
                            <label for="inputEmail4" class="form-label">Địa chỉ nhận hàng</label>
                            <input type="text" class="form-control rounded-0" id="inputEmail4"
                                value="<?= $info->address ?>" disabled>
                        </div>
                        <div class="" style="margin-top:10px">
                            <label for="inputEmail4" class="form-label">Ngày tạo đơn</label>
                            <input type="text" class="form-control rounded-0" id="inputEmail4"
                                value="<?= $info->date_order ?>" disabled>
                        </div>
                    </div>
                    <input type="hidden" class="form-control rounded-0" id="inputEmail4" name="bill_id"
                        value="<?=$info->bill_id?>">
                    <div class="mt-3">
                        <span class="form-label">Trạng thái đơn hàng</span>
                        <div class="row ps-3 pt-2">
                            <div class="form-check col-2">
                                <input class="form-check-input" type="radio" value="0" name="bill_status"
                                    <?= $info->bill_status =="0" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Chờ xác nhận
                                </label>
                            </div>
                            <div class="form-check col-2">
                                <input class="form-check-input" type="radio" value="1" name="bill_status"
                                    <?= $info->bill_status =="1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Đã xác nhận
                                </label>
                            </div>
                            <div class="form-check col-2">
                                <input class="form-check-input" type="radio" value="2" name="bill_status"
                                    <?= $info->bill_status =="2" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Đang giao hàng
                                </label>
                            </div>
                            <div class="form-check col-2">
                                <input class="form-check-input" type="radio" value="3" name="bill_status"
                                    <?= $info->bill_status =="3" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Đã nhận hàng
                                </label>
                            </div>
                            <div class="form-check col-2">
                                <input class="form-check-input" type="radio" value="4" name="bill_status"
                                    <?= $info->bill_status =="4" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Hủy đơn
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name='submitFormUpdateBillStatus'>Cập
                            nhật</button>
                    </div>
                </form>
            </div>
            <div>
                <h4 class="mt-5 ps-4">Sản phẩm trong đơn hàng</h4>
            </div>
            <div class="ms-4 me-4">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">STT</th>
                            <!-- <th scope="col">IDBD</th> -->
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Màu sắc</th>
                            <th scope="col">Kích thước</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <!-- <th scope="col">IDPD</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsBillDetail as $key => $bill_dt) {
                        ?>

                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">
                                <?= $i++?>
                            </td>
                            <!-- <td scope="row">
                                <?= $bill_dt->bill_dt_id?>
                            </td> -->
                            <td scope="row">
                                <?= $bill_dt->pro_name?>
                            </td>
                            <td scope="row">
                                <?= $bill_dt->pro_color?>
                            </td>
                            <td scope="row">
                                <?= $bill_dt->pro_size?>
                            </td>
                            <td scope="row">
                                <?= $bill_dt->price ?>
                            </td>
                            <td scope="row">
                                <?= $bill_dt->quantity?>
                            </td>
                            <td scope="row">
                                <?= $bill_dt->total?>
                            </td>
                            <!-- <td scope="row">
                                <?= $bill_dt->pro_dt_id?>
                            </td> -->
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