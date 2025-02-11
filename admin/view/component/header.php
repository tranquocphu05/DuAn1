<header class="bg-light pb-2 pt-2">
    <div class="container">
        <!-- Header top -->
        <div class="d-flex justify-content-between align-items-center pb-2">
            <!-- Left -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="pe-3">
                    <i class="fa-solid fa-phone"></i> +8412345678
                </div>
                <div>
                    <i class="fa-solid fa-envelope"></i> mml_shop@gmail.com
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <i class="fa-solid fa-user me-2"></i>
                Xin chào <?php echo $_SESSION["acc_name"] ?>
            </div>
        </div>
        <!-- End header top -->
        <!-- Header bottom -->
        <div class="d-flex justify-content-between align-items-center bg-white rounded-pill mb-2">
            <div class="d-flex align-items-center justify-content-center p-2 ms-2">
                <img src="../img/logo.png" class="pe-2" alt="">
                <h3>MML SHOP</h3>
            </div>
            <!-- MENU -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-nav">
                        <a class="nav-link active-menu" aria-current="page" href="../index.php">Trang chủ</a>
                        <a class="nav-link active-menu" id="link1" href="index.php?act=show_thongke">Thống kê</a>
                        <a class="nav-link active-menu" id="link2" href="index.php?act=list-category">Danh Mục</a>
                        <a class="nav-link active-menu" id="link3" href="index.php?act=list-product">Sản Phẩm</a>
                        <a class="nav-link active-menu" id="link4" href="index.php?act=list-bill">Đơn Hàng</a>
                        <a class="nav-link active-menu" id="link5" href="index.php?act=list-account">Tài Khoản</a>
                        <a class="nav-link active-menu" id="link6" href="index.php?act=list-news">Tin Tức</a>
                        <a class="nav-link active-menu" id="link7" href="index.php?act=list-comment">Bình Luận</a>
                        <a class="nav-link active-menu" id="link8" href="index.php?act=list-voucher">Voucher</a>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', (event) => {
                            const navLinks = document.querySelectorAll('.active-menu');

                            // Đặt class 'active' từ Local Storage
                            const activeLinkId = localStorage.getItem('activeLinkId');
                            if (activeLinkId) {
                                const activeLink = document.getElementById(activeLinkId);
                                if (activeLink) {
                                    activeLink.classList.add('active');
                                }
                            }

                            navLinks.forEach(link => {
                                link.addEventListener('click', (event) => {
                                    event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
                                    navLinks.forEach(link => link.classList.remove('active')); // Xóa class 'active' khỏi tất cả các link
                                    link.classList.add('active'); // Thêm class 'active' vào link được click

                                    // Lưu ID của link đã click vào Local Storage
                                    localStorage.setItem('activeLinkId', link.id);

                                    // Điều hướng tới link đã click
                                    window.location.href = link.href;
                                });
                            });
                        });
                    </script>
                </div>
            </nav>
            <!-- END MENU -->
            <div class="d-flex justify-content-between align-items-center pe-2">
                <form class="d-flex" role="search">
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                </form>
                <i class="fa-regular fa-heart me-2"></i>
                <i class="fa-solid fa-cart-shopping me-2"></i>
            </div>
        </div>
        <!-- End header bottom -->
    </div>
</header>