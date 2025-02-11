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
                    <h4 class="p-3">Cập nhật tin tức "MT - <?php echo $_GET["id"] ?>"</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="">
                        <label for="inputEmail4" class="form-label">Ảnh tin tức</label>
                        <input type="file" class="form-control rounded-0" id="inputEmail4" placeholder="" name="image_upload">
                        <img src="../img/<?= $news_one->news_img ?>" alt="" style="width:200px; margin: 20px 0;" name="existing_image">
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập tên sản phẩm" name="news_title" value="<?= $news_one->news_title ?>">
                    </div>
                    <div class="">
                        <label for="inputPassword5" class="form-label">Nội dung</label>
                        <textarea id="" cols="30" rows="3" class="form-control" placeholder="Nội dung" name="news_content">
                            <?= $news_one->news_content ?>
                        </textarea>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="submitFormUpdateNews">Cập nhật</button>
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