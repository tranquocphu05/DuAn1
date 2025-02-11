<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../giaodien/style.css">
</head>

<body>
    <?php
    include "view/component/header.php";
    ?>
    <!-- END HEADER -->
    <!-- CONTENT -->
    <main class="d-flex container">
        <!-- Sidebar trái -->
        <?php
        include "view/component/Sidebar.php";
        ?>
        <!-- Main content -->
        <div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
            <form action="" class="pb-5 mt-4 ms-4 me-4" method="post">
                <div>
                    <h4 class="p-3">Tạo mới Voucher</h4>
                </div>
                <hr>
                <div class="row">

                    <div class="">
                        <label for="inputEmail4" class="form-label">Tên Voucher</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập tên voucher" name="voucher_name" required>
                    </div>

                    <div class="">
                        <label for="inputEmail4" class="form-label">Giá trị Voucher</label>
                        <input type="number" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập giá trị voucher" name="value" required>
                    </div>

                    <div class="">
                        <label for="inputEmail4" class="form-label">Ngày khả dụng</label>
                        <input type="datetime-local" class="form-control rounded-0 start-time" id="inputEmail4" placeholder="Nhập ngày voucher bắt đầu hoạt động" name="start_time" required>
                    </div>

                    <div class="">
                        <label for="inputEmail4" class="form-label">Ngày hết hạn</label>
                        <input type="datetime-local" class="form-control rounded-0 end-time" id="inputEmail4" placeholder="Nhập ngày voucher hết hạn" name="end_time" required>
                        <span class="popupError" style="color:red; font-style:italic;"></span>
                    </div>

                    <div class="">
                        <label for="inputEmail4" class="form-label">Số lượng Voucher</label>
                        <input type="number" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập số lượng voucher" name="voucher_quantity" min="1" required>
                    </div>

                    <div class="mt-3">
                        <span class="form-label">Trạng thái hoạt động voucher</span>
                        <div class="row ps-3 pt-2">
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" checked value="1" name="voucher_status">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bật hoạt động
                                </label>
                            </div>
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="0" name="voucher_status">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tắt hoạt động
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name='submitFormCreateVoucher'>Tạo mới</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- FOOTER -->
    <?php
    include "view/component/footer.php";
    ?>
    <!-- END FOOTER -->
    <script>
        const errorDate = document.querySelector(".popupError");
        const endTime = document.querySelector(".end-time");
        const startTime = document.querySelector(".start-time");
        // console.log(errorDate);
        // console.log(endTime);
        startTime.addEventListener("change", () => {
            // console.log(startTime.value);
            if (endTime.value < startTime.value) {
                errorDate.innerHTML = "Vui lòng chọn ngày kết thúc lớn hơn ngày bắt đầu!!!";
            } else {
                errorDate.innerHTML = "";
            }

        });
        endTime.addEventListener("change", () => {
            // console.log(endTime.value);
            if (endTime.value < startTime.value) {
                errorDate.innerHTML = "Vui lòng chọn ngày kết thúc lớn hơn ngày bắt đầu!!!";
            } else {
                errorDate.innerHTML = "";
            }
        });
    </script>
</body>

</html>