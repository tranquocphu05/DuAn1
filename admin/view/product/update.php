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
        <div class="shadow bg-light mt-4 ms-4 col-md-3">
            <form action="" class="pb-3 mt-4 ms-4 me-4" method="POSt" enctype="multipart/form-data">
                <div>
                    <h4 class="">Tổng quan</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="">
                        <label for="inputEmail4" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" class="form-control rounded-0" id="inputEmail4" placeholder=""
                            name="image_upload">
                        <img src="../img/product/<?= $info->pro_image ?>" alt="" style="width:200px; margin: 20px 0;"
                            name="existing_image">
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            placeholder="Nhập tên sản phẩm" name="pro_name" value="<?= $info->pro_name ?>" required>
                    </div>
                    <div class="">
                        <label for="inputPassword5" class="form-label">Mô tả</label>
                        <textarea id="" cols="30" rows="3" class="form-control" placeholder="Mô tả"
                            name="pro_description" required>
                            <?= $info->pro_description ?>
                        </textarea>
                    </div>

                    <div class="mt-3">
                        <span class="form-label">Danh mục sản phẩm:</span>
                        <select class="form-control" name="cate_id">
                            <?php foreach ($dsCate as $category) : ?>
                            <?php
                                    if ($category->cate_status==1) {
                                        ?>
                            <option value="<?= $category->cate_id ?>"
                                <?= $category->cate_id == $info->cate_id ? "selected" : ''  ?>>
                                <?= $category->cate_name ?></option>
                            <?php
                                    }
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <span class="form-label">Trạng thái sản phẩm</span>
                        <div class="row ps-3 pt-2">
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="1" name="pro_status"
                                    <?= $info->pro_status == "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bán sản phẩm
                                </label>
                            </div>
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="0" name="pro_status"
                                    <?= $info->pro_status != "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Ẩn sản phẩm
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="submitFormUpdatePro">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
        <!--  -->
        <div class="shadow bg-light pb-5 mt-4 ms-4 mb-4 col-md-7">
            <h4 class="p-3">Chi tiết sản phẩm "<?= $info->pro_name ?>"</h4>
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
                        <a href="index.php?act=create-product-detail&pro_id=<?php echo $_GET["pro_id"]; ?>"
                            class="text-light">Thêm loại</a>
                    </button>
                </div>
            </div>
            <div class="pt-4 ms-4 me-4">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">STT</th>
                            <!-- <th scope="col">IDPD</th> -->
                            <th scope="col">Bảng màu</th>
                            <th scope="col">Kích cỡ</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsProductDetail as $key => $pro_dt) {
                        ?>

                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">
                                <?= $i++?>
                            </td>
                            <!-- <td scope="row">
                                <?= $pro_dt->product_dt_id?>
                            </td> -->
                            <td>
                                <?= $pro_dt->pro_color?>
                            </td>
                            <td>
                                <?= $pro_dt->pro_size ?>
                            </td>
                            <td>
                                <?= $pro_dt->pro_price?>
                            </td>
                            <td>
                                <?= $pro_dt->pro_quantity?>
                            </td>
                            <td>
                                <?php
                                    if ($pro_dt->product_dt_status == 1) {
                                ?>
                                <span class="badge bg-success ">Đang bán</span>
                                <?php
                                    } else {
                                        ?>
                                <span class="badge bg-danger">Không bán</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-success ">
                                    <a href="index.php?act=update-product-detail&product_dt_id=<?= $pro_dt->product_dt_id?>&pro_id=<?php echo $_GET["pro_id"]; ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
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