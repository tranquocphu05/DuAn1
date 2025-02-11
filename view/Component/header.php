<header>
    <div class="logo">
        <a href="index.php"><img src="img/logo_darkblue_notfull.svg" alt=""></a>

    </div>
    <div class="search">
        <form action="?act=searchPro" method="post">
            <button name='searchKeyPro'><i class="fa-solid fa-magnifying-glass"></i></button>
            <input type="text"  name="searchPro"  placeholder="Từ khóa tìm kiếm">
        </form>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">trang chủ</a></li>
            <li><a href="">giới thiệu</a></li>
            <li class="box_sub_menu">
                <a href="">sản phẩm</a>
                <ul class="sub_menu">
                    <!-- <?php
                            var_dump($dsCategory);
                            ?> -->


                    <?php foreach ($dsCategory as $cate) : ?>

                        <?php
                        if ($cate->cate_status == 1) {
                        ?>
                            <a href="?act=showAllProOfCate&cate_id=<?= $cate->cate_id ?>">
                                <li><?= $cate->cate_name ?></li>
                            </a>
                        <?php
                        }
                        ?>

                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="">thư viện</a></li>
            <li><a href="">tin tức</a></li>
            <li><a href="">liên hệ</a></li>
        </ul>
    </div>
    <div class="tool">
        <ul>
            <li class="icon">
                <a href="">
                    <i class="fa-regular fa-user" class="icon"></i>
                    <div class="lg">
                        <?php
                        if (isset($_SESSION['acc_name'])) { ?>
                            <div class="div_lg">
                                <a href="?act=view_profile">
                                    <h5>Profile</h5>
                                </a>
                            </div>
                            <div class="div_lg">
                                <a href="?act=logout">
                                    <h5>Đăng xuất</h5>
                                </a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="div_lg">
                                <a href="?act=login">
                                    <h5>Đăng nhập</h5>
                                </a>
                            </div>
                            <div class="div_lg">
                                <a href="?act=signup">
                                    <h5>Đăng kí</h5>
                                </a>
                            </div>
                        <?php
                        }
                        ?>



                    </div>
                </a>
                <?php
                if (isset($_SESSION['acc_name'])) { ?>
                    <!-- <a href=""> -->
                        <h5 id="acc_name">Xin chào <?= $_SESSION['acc_name'] ?></h5>
                    <!-- </a> -->
                    <a href="./admin/">
                        <?php
                        if ($_SESSION['acc_role'] == 1) { ?>
                            <h5 id="admin"> ADMIN </h5>
                        <?php }
                        ?>
                    </a>
                <?php
                }
                ?>
            </li>
            <li>
                <a href="" class="number">
                    <i class="fa-regular fa-heart"></i>
                    <span class="item_number">0</span>
                </a>
            </li>
            <li>
                <a href="?act=cart" class="number">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <?php
                    if (($_SESSION['myCart'] != "")) { ?>
                        <span class="item_number"><?= $allSlPro ?></span>
                    <?php  } else {
                    ?>
                        <span class="item_number">0</span>
                    <?php
                    }
                    ?>
                </a>
            </li>
        </ul>
    </div>
</header>