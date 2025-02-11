<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
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
            <h4 class="p-3">Danh sách tin tức</h4>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <form action="" class="ms-4">
                    <div class="input-group input-group-sm">
                        <input class="form-control rounded-0 mb-2" type="search" id="search" name="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                        <a href="?act=create-news" class="text-light">Thêm tin tức</a>
                    </button>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        <a href="" class="text-light">Xóa</a>
                    </button>
                </div>
            </div>


            <div class="pt-4 ms-4 me-4">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <!-- <th scope="col">Mã tin</th> -->
                            <th>STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Ảnh minh họa</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsNews as $key => $news) {
                        ?>

                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <!-- <td scope="row"><?= $news->news_id?></td> -->
                                <td><?= $i ++; ?></td>
                                <td>
                                    <div style="white-space: wrap; overflow: hidden; text-overflow: ellipsis; width: 150px;">
                                    <?= $news->news_title?>
                                    </div>
                                </td>
                                <td>
                                    <img src="../img/<?= $news->news_img ?>" alt="" style="width:170px;">
                                </td>
                                <td>
                                    <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 150px;">
                                    <?= $news->news_content?>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success ">
                                        <a href="?act=update-news&id=<?= $news->news_id?>" class="text-white">
                                            <i class="fa-solid fa-pen-to-square"></i> Sửa
                                        </a>
                                    </button>
                                    <button class="btn btn-danger">
                                        <a onclick=" return confirm('Bạn có muốn xóa tin tức này không?')" href="?act=delete-news&news_id=<?= $news->news_id?>" class="text-white">
                                            <i class="fa-solid fa-trash"></i> Xóa
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