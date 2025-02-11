<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
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
    <main class="d-flex container" >
        <!-- Sidebar trái -->
        <?php
            include "view/component/Sidebar.php";
        ?>
        <!-- Main content -->
        <div class="shadow bg-light pb-5 mt-4 ms-4 col-md-8">
             <form action="" class="pb-5 mt-4 ms-4 me-4" method="post">
                    <div>
                        <h4 class="p-3">Thêm danh mục sản phẩm</h4>
                    </div>
                    <hr>
                    <div class="row">
                       
                        <div class="">
                            <label for="inputEmail4" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập tên sản phẩm" name="cate_name" required>
                        </div>
                       
                        <div class="mt-3">
                            <span class="form-label">Trạng thái danh mục</span>
                            <div class="row ps-3 pt-2">
                                <div class="form-check col-2">
                                    <input class="form-check-input" type="radio" checked value="1" name="cate_status">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Hoạt động
                                    </label>
                                </div>
                                <div class="form-check col-5">
                                    <input class="form-check-input" type="radio" value="2" name="cate_status">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Tắt hoạt động
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success" name='submitFormCreateCate'>Tạo mới</button>
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
</body>
</html>