<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<style>
    .banner_content h1 {
    color: white;      /* Sets text color to white */
    font-size: 2.5em; /* Adjusts font size (modify as needed) */
}

.banner_content h3 {
    color: white;      /* Sets text color to white for h3 tags */
    font-size: 1.5em;  /* Adjusts font size (modify as needed) */
}

.banner_content p {
    color: white;      /* Sets text color to white for paragraphs */
    font-size: 1em;   /* Adjusts font size (modify as needed) */
}

.banner_content a {
    color: white;      /* Sets link color to white */
    font-size: 1.2em;   /* Adjusts link font size (modify as needed) */
    text-decoration: none; /* Removes underline from links */
}

.banner_content a:hover {
    text-decoration: underline; /* Adds underline on hover */
}

</style>
<body>
    <?php
        include "view/Component/header.php"
    ?>
    <!-- End header -->
    <main>
        <div class="banner w95">
            <div class="banner_slideshow">
                <img src="img/banner.jpg" alt="">
            </div>
            <div class="banner_content">
                <h3 class=""><span></span>Xu hướng 2024</h3>
                <h1>thiết kế nội thất</h1>
                <p>Xu hướng thiết kế nội thất Bắc Âu được giới trẻ ưu ái sử dụng
                    trong những năm gần nhờ vào trào lưu sống xanh, bền vững và
                    yêu môi trường với chi phí phù hợp
                </p>
                <h3><a href="">mua ngay</a></h3>
            </div>
        </div>
        <div class="category w95">
            <div class="bigcate">
                <a href="">
                    <div class="img_cate">
                        <img src="img/cate1.jpg" alt="">
                    </div>
                    <div class="cate_info">
                        <h3>Giày Tây</h3>
                    </div>
                </a>
            </div>
            <div class="smallcate">
                <div class="cate_item">
                    <a href="">
                        <div class="img_cate">
                            <img src="img/cate2.jpg" alt="">
                        </div>
                        <div class="cate_info">
                            <h3>Áo Vest Nam</h3>
                        </div>
                    </a>
                </div>
                <div class="cate_item">
                    <a href="">
                        <div class="img_cate">
                            <img src="img/cate3.jpg" alt="">
                        </div>
                        <div class="cate_info">
                            <h3>Quần Âu Tây</h3>
                        </div>
                    </a>
                </div>
                <div class="cate_item">
                    <a href="">
                        <div class="img_cate">
                            <img src="img/cate4.jpg" alt="">
                        </div>
                        <div class="cate_info">
                            <h3>Cavast</h3>
                        </div>
                    </a>
                </div>
                <div class="cate_item">
                    <a href="">
                        <div class="img_cate">
                            <img src="img/cate5.jpg" alt="">
                        </div>
                        <div class="cate_info">
                            <h3>Bộ Vest Nam Sẵn</h3>
                        </div>
                    </a>
                </div>
                <!-- End cate_item -->
            </div>
        </div>
        <!-- End category -->
        <div class="hot_products w95">
            <div class="title">sản phẩm bán chạy</div>
            <div class="typeshow">
                <ul>
                    <li><a href="">Tất cả</a></li>
                    <li><a href="">Nổi bật</a></li>
                    <li><a href="">Bán chạy</a></li>
                    <li><a href="">Giảm giá</a></li>
                </ul>
            </div>
            <div class="list_pro">
                <?php  foreach ($dsProduct as $key=>$pro)  :?>
                    <div class="pro_item">
                    <div class="quick_act">
                        <form action="">
                            <button><i class="fa-regular fa-heart"></i></button>
                            <button><i class="fa-solid fa-cart-shopping"></i></button>
                            <button><i class="fa-regular fa-eye"></i></button>
                        </form>
                    </div>
                    <div class="img_pro">
                        <a href="?act=ctsp&id=<?= $pro->pro_id?>">
                            <img src="img/product/<?= $pro->pro_image?>" alt="">
                        </a>
                    </div>
                    <div class="content_pro">
                        <div class="name_pro">
                            <a href="?act=ctsp&id=<?= $pro->pro_id?>"><?= $pro->pro_name?></a>
                        </div>
                        <div class="price_pro">
                            <p>
                                <?php 
                                    foreach ($Arr_price as $index => $pr_min) {
                                        if ($key == $index) {
                                            echo ($pr_min); ?> VND<?php
                                        }
                                    }
                                ?>
                            <span></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php  endforeach; ?>
               
          
                <!-- End pro_item -->
            </div>
            <a href=""><h4>xem tất cả sản phẩm</h4></a>
        </div>
        <div class="bigdeal">
            <a href="">
                <div class="title_deal">
                    <h1>living room furniture</h1>
                    <p>Discount 50%</p>
                </div>
                <div class="img_deal">
                    <img src="img/deal_banner.jpg" alt="">
                </div>
            </a>
        </div>
        <div class="last_news">
            <div class="title_news">
                tin mới nhất
            </div>
            <div class="list_news">
                <?php foreach ($dsNews as $key => $news ) :?>
                <div class="news_item">
                    <div class="img_news">
                        <a href=""><img src="img/<?= $news->news_img ?>" alt=""></a>
                    </div>
                    <div class="news_content">
                        <div class="main_title">
                            <a href="">
                                <?= $news->news_title ?>
                            </a>
                        </div>
                        <div class="date">
                            <i class="fa-solid fa-calendar-days"></i>
                            01 tháng 06, 2024
                        </div>
                        <div class="intro">
                            <?= $news->news_content ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="brand">
            <img src="img/brand1.png" alt="">
            <img src="img/brand2.png" alt="">
            <img src="img/brand3.png" alt="">
            <img src="img/brand4.png" alt="">
            <img src="img/brand6.png" alt="">
            <img src="img/brand7.png" alt="">
            <img src="img/brand1.png" alt="">
        </div>
        <div class="insta w95">
            <div class="linked_insta">
                <a href="">
                    <button>
                        <i class="fa-brands fa-instagram"></i>
                        Instagram
                    </button>
                </a>
            </div>
            <div class="img_insta">
                <img src="img/ins1.jpg" alt="">
                <img src="img/ins2.jpg" alt="">
                <img src="img/ins3.jpg" alt="">
                <img src="img/ins4.jpg" alt="">
                <img src="img/ins5.jpg" alt="">
                <img src="img/ins6.jpg" alt="">
                <img src="img/ins7.jpg" alt="">
                <img src="img/ins8.jpg" alt="">
            </div>
        </div>
        <div class="hot_privacy">
            <div class="privacy_item">
                <i class="fa-solid fa-truck-fast"></i>
                <div class="name_privacy">
                    <h6>giao hàng nhanh và miễn phí</h6>
                    <p>Giao hàng miễn phí đơn hàng trên 1000k</p>
                </div>
            </div>
            <div class="privacy_item">
                <i class="fa-solid fa-headphones"></i>
                <div class="name_privacy">
                    <h6>hỗ trợ khách hàng 24/7</h6>
                    <p>Hỗ trợ khách hàng thân thiện 24/7</p>
                </div>
            </div>
            <div class="privacy_item">
                <i class="fa-solid fa-circle-check"></i>
                <div class="name_privacy">
                    <h6>hoàn tiền nhanh chóng</h6>
                    <p>Trả lại tiền trong vòng 30 ngày</p>
                </div>
            </div>
        </div>
        <hr>
    </main>
   
    <?php
        include "view/Component/footer.php"
    ?>
</body>

</html>