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
            <h4 class="p-3">Danh sách sản phẩm</h4>
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
                        <a href="index.php?act=create-product" class="text-light">Thêm sản phẩm</a>
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
                            <!-- <th scope="col">IDP</th> -->
                            <th scope="col">Danh mục</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsProduct as $key => $pro) {
                        ?>

                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td scope="row">
                                    <?= $i++?>
                                </td>
                                <!-- <td scope="row">
                                    <?= $pro->pro_id?>
                                </td> -->
                                
                                <?php
                                    if ($pro->cate_status != 1 ) { ?>
                                        <td>
                                        <div style="white-space: wrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                            Danh mục không tồn tại
                                        </div>
                                    </td>
                                    <?php
                                    } else {
                                        ?>
                                             <td>
                                                <div style="white-space: wrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                                    <?= $pro->cate_name?>
                                                </div>
                                </td>
                                        <?php
                                    }
                                ?>
                            
                               
                                <td>
                                    <div style="white-space: wrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?= $pro->pro_name?>
                                </div>
                            </td>
                            <td>
                                <img src="../img/product/<?= $pro->pro_image ?>" alt="" style="width:100px;">
                            </td>
                            <td>
                                <div
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 150px;">
                                    <?= $pro->pro_description?>
                                </div>
                            </td>
                            <td>
                                <?php
                                    if ($pro->pro_status == 1) {
                                ?>
                                <span class="badge bg-success ">Đang bán</span>
                                <?php
                                    } else {
                                        ?>
                                <span class="badge bg-danger">Đã ẩn</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <!-- <button class="btn" style="background: #141F46;">
                                    <a href="index.php?act=view-product-detail&pro_id=<?= $pro->pro_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-circle-info"></i> Xem chi tiết
                                    </a>
                                </button> -->
                                <button class="btn" style="background: #141F46;">
                                    <a href="index.php?act=read-one-product&pro_id=<?= $pro->pro_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-pen-to-square"></i> Cập nhật
                                    </a>
                                </button>
                                <!-- <button class="btn btn-danger">
                                    <a onclick="return confirm('Bạn sẽ mất hết thông tin chi tiết về sản phẩm này!!!! Xác nhận xóa sản phẩm #<?= $pro->pro_id?>?')"
                                        href="index.php?act=delete-product&pro_id=<?= $pro->pro_id ?>"
                                        class="text-white">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                </button> -->
                                <!-- <button class="btn btn-danger" style="margin-top:5px;">
                                    <a onclick="return confirm('Xác nhận đổi trạng thái sản phẩm #<?= $pro->pro_id?>?')"
                                        href="index.php?act=update-status-product&pro_id=<?= $pro->pro_id ?>"
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