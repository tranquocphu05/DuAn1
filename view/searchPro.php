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

<body>
    <?php
        include "view/Component/header.php"
    ?>
    <!-- End header -->
    <main>
        <!-- End category -->
        <div class="hot_products w95">
            <div class="title">sản phẩm tìm kiếm</div>
            <div class="typeshow">
                <ul>
                    <li><a href="">Tất cả</a></li>
                    <li><a href="">Nổi bật</a></li>
                    <li><a href="">Bán chạy</a></li>
                    <li><a href="">Giảm giá</a></li>
                </ul>
            </div>
            <div class="list_pro">
                <?php  foreach ($dsPro_search as $pro)  :?>
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
                            <p>Liên hệ <span></span></p>
                        </div>
                    </div>
                </div>
                <?php  endforeach; ?>
               
          
                <!-- End pro_item -->
            </div>
            <a href=""><h4>xem tất cả sản phẩm</h4></a>
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