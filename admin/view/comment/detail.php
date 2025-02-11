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
                    <h4 class="p-3">Chi tiết bình luận</h4>
                </div>
                <hr>
                <div class="row">
                    <!-- <div class="">
                        <label for="inputEmail4" class="form-label">Mã bình luận</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" value="<?= $info->com_id ?>"
                            disabled>
                    </div> -->
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Tài khoản bình luận</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            value="<?= $info->acc_name ?>" disabled>
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            value="<?= $info->pro_name ?>" disabled>
                    </div>
                    <a href="../?act=ctsp&id=<?= $info->pro_id ?>" style="font-style: italic; color: #6482AD; text-decoration:underline;">
                        Xem chi tiết sản phẩm tại đây
                    </a>
                    <div class="" style="margin-top:10px">
                        <label for="inputPassword5" class="form-label">Nội dung bình luận</label>
                        <textarea id="" cols="30" rows="3" class="form-control" placeholder="Mô tả" disabled>
                            <?= $info->com_content ?>
                        </textarea>
                    </div>
                    <div class="" style="margin-top:10px">
                        <label for="inputEmail4" class="form-label">Ngày bình luận</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            value="<?= $info->com_date ?>" disabled>
                    </div>
                </div>
            </form>
            <button class="btn" style="width: 100%;background: #dc3545;">
                <a onclick=" return confirm('Bạn có muốn xóa bình luận này không?')"
                    href="?act=delete-comment&com_id=<?= $info->com_id?>" class="text-white">
                    <i class="fa-solid fa-trash"></i> Xóa
                </a>
            </button>
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