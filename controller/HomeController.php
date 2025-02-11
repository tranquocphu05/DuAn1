<?php

    class HomeController {
        public $categoryQuery;
        public $productQuery;
        public $productDetailQuery;
        public $accountQuery;
        public $billQuery;
        public $billDetailQuery;
        public $commentQuery;
        public $newsQuery;
        public $voucherQuery;

        public function __construct()
        {
            $this->productQuery = new ProductQuery();
            $this ->productDetailQuery = new ProductDetailQuery();
            $this->categoryQuery = new CategoryQuery();
            $this -> accountQuery = new AccountQuery();
            $this -> billQuery= new BillQuery();
            $this -> billDetailQuery= new BillDetailQuery();
            $this -> commentQuery= new CommentQuery();
            $this -> newsQuery= new NewsQuery();
            $this -> voucherQuery = new VoucherQuery();
        }

        public function __destruct()
        {
            
        }

        public function home() {
            $dsProduct = $this->productQuery->getTop16ProductLatest();
            $Arr_price = [];
            $mang_pro_id = [];
        
            foreach ($dsProduct as $row) {
                $arr_min_price = [];
                $dsProDetail = $this->productDetailQuery->listProductDetail($row->pro_id);
        
                // Kiểm tra nếu có sản phẩm chi tiết
                if ($dsProDetail) {
                    foreach ($dsProDetail as $rowDetail) {
                        $price = $rowDetail->pro_price;
                        array_push($arr_min_price, $price);
                    }
        
                    // Chỉ gọi min nếu mảng không rỗng
                    if (!empty($arr_min_price)) {
                        $price_min = min($arr_min_price);
                        array_push($Arr_price, $price_min);
                    } else {
                        // Xử lý trường hợp mảng rỗng (ví dụ: gán giá trị mặc định)
                        array_push($Arr_price, 0); // hoặc bất kỳ giá trị mặc định nào bạn muốn
                    }
                } else {
                    // Nếu không có sản phẩm chi tiết, có thể xử lý thêm
                    array_push($Arr_price, 0); // Hoặc giá trị mặc định khác
                }
            }
        
            // var_dump($Arr_price);
            // var_dump($mang_pro_id);
        
            // Tiếp tục các phần mã khác
            $dsCategory = $this->categoryQuery->all();
            $dsNews = $this->newsQuery->latestNews();
        
            include "view/home.php";
        }
        
        public function ctsp() {
            $dsCategory = $this->categoryQuery->all();
            $allSlPro = 0;
            foreach ($_SESSION["myCart"] as $key => $proCart) {
                if ($proCart['product_dt_id']) {
                    $allSlPro++;
                }
            }
            
            if (isset($_GET['id'])) {
                $pro_id = $_GET['id'];
                $pro_one = $this->productQuery->find($pro_id);
                // var_dump($pro_one);
                // echo "<pre>";
                $cate_id = $pro_one->cate_id;
                $dsProDetail = $this->productDetailQuery->listProductDetail($pro_id);
                $dsProduct_same = $this->productQuery->getProductSameCate_id($cate_id);
                // var_dump($dsProDetail);

                $price = 1000000;

                foreach ($dsProDetail as $row) {

                    if ($row->pro_price < $price) {
                        $price = $row->pro_price;
                    }
                }

                $price_max =0;

                foreach ($dsProDetail as $row) {

                    if ($row->pro_price > $price_max) {
                        $price_max = $row->pro_price;
                    }
                }


                if(isset($_GET['id']) && isset($_GET['id']) > 0) {
                    $dsCmtPro = $this->commentQuery->commentFromOnePro($_GET['id']);
                }
                if(isset($_POST["submitFormCreateComment"])) {
                    if(!isset($_SESSION['acc_id'])){
                        ?>
                            <script>
                                alert("Vui lòng đăng nhập để bình luận!!!");
                                window.location.href = "?act=ctsp&id=<?=$pro_id?>";
                            </script>
                        <?php
                    } else {
                        $comment = new Comment();  
                        $comment -> pro_id = trim($_POST["pro_id"]);
                        $comment -> com_content = trim($_POST["com_content"]);
                        $comment -> account_id = $_SESSION['acc_id'];
                        $comment -> com_date = date('Y-m-d H:i:s');
                        $result = $this -> commentQuery -> createComment($comment);
                        if ($result == "ok") {
                            header("Location:?act=ctsp&id=$pro_id");
                        } else {
                            echo "Tạo bình luận thất bại";
                        }
                    }
                }
                $countComment = $this -> commentQuery -> countCommentOnePro($_GET["id"]);
            }
            include "view/ctsp.php";
        }

    public function cart() {
        $dsCategory = $this->categoryQuery->all();
            if (isset($_POST['addToCart'])) {
                // echo "<Pre>";
                // print_r($_POST);
                $pro_size = $_POST['pro_size'];
                $pro_color = $_POST['pro_color'];
                $pro_id = $_POST['pro_id'];
                $soluong = $_POST['soluong']; 
                if (!$pro_color && !$pro_size) {
                    ?>
                        <script>
                            alert("Vui lòng chọn màu sắc và kích cỡ");
                            window.location.href = "?act=ctsp&id=<?=$pro_id?>";
                        </script>
                    <?php
                     return;
                }
                if (!$pro_size) {
                    ?>
                        <script>
                            alert("Vui lòng chọn kích cỡ");
                            window.location.href = "?act=ctsp&id=<?=$pro_id?>";
                        </script>
                    <?php
                    return;
                } 
                if (!$pro_color) {
                    ?>
                        <script>
                            alert("Vui lòng chọn màu sắc");
                            window.location.href = "?act=ctsp&id=<?=$pro_id?>";
                        </script>
                    <?php
                     return;
                } 
                $pro_detail_one = $this->productDetailQuery->infoOneProductDetail_color_size_proID($pro_id,$pro_size,$pro_color);
                if ($pro_detail_one->pro_quantity <= $soluong) {
                    ?>
                        <script>
                            alert("Quá số lượng hàng còn trong kho");
                            window.location.href = "?act=ctsp&id=<?=$pro_detail_one->pro_id?>";
                        </script>
                    <?php
                    return;
                } 
                $total = $pro_detail_one->pro_price * $soluong;
                
                $array_pro = [
                    'product_dt_id' =>$pro_detail_one->product_dt_id,
                    'pro_img'=> $pro_detail_one->pro_image,
                    'pro_color' =>$pro_detail_one->pro_color,
                    'pro_size' =>$pro_detail_one->pro_size,
                    'pro_name'=> $pro_detail_one->pro_name,
                    'pro_price'=> $pro_detail_one->pro_price,
                    'pro_quantity'=> $pro_detail_one->pro_quantity,
                    'soluong' => $soluong,
                    'total'=> $total,
                ];

                if (isset($_SESSION["myCart"])) {
                    $proInCart = "" ;
                    foreach ($_SESSION["myCart"] as $key => $proCart) {
                        if ($array_pro['product_dt_id'] == $proCart['product_dt_id']) {
                            $proCart['soluong'] += $array_pro['soluong'];
                            $soluongIncart = $proCart['soluong'];
                            $totalProIncart = $soluongIncart * $proCart['pro_price'];

                            $array_pro = [
                                'product_dt_id' =>$pro_detail_one->product_dt_id,
                                'pro_img'=> $pro_detail_one->pro_image,
                                'pro_color' =>$pro_detail_one->pro_color,
                                'pro_size' =>$pro_detail_one->pro_size,
                                'pro_name'=> $pro_detail_one->pro_name,
                                'pro_price'=> $pro_detail_one->pro_price,
                                'pro_quantity'=> $pro_detail_one->pro_quantity,
                                'soluong' => $soluongIncart,
                                'total'=> $totalProIncart,
                            ];
                            $proInCart = 1;
                            $_SESSION["myCart"][$key] = $array_pro;
                        }
                        // break;
                    }
                    if ($proInCart !== 1) {
                        array_push($_SESSION["myCart"],$array_pro);
                    } else {
                        array_push($_SESSION["myCart"],$array_pro);
                        // echo "<pre>";
                        // print_r($_SESSION["myCart"]);
                        foreach ($_SESSION["myCart"] as $key => $proCart) {
                            if ($array_pro['product_dt_id'] == $proCart['product_dt_id']) {
                                unset($_SESSION["myCart"][$key]);
                                break;
                            }
                        }
                    }
                } else{
                    array_push($_SESSION["myCart"],$array_pro);
                }
                // echo "<pre>";
                // print_r($_SESSION['myCart']);
                $allSlPro = 0;
                foreach ($_SESSION["myCart"] as $key => $proCart) {
                    if ($proCart['product_dt_id']) {
                        $allSlPro++;
                    }
                }
                // print_r($allSlPro);
            }
            $allSlPro = 0;
            $tongTien = 0;
            foreach ($_SESSION["myCart"] as $key => $proCart) {
                if ($proCart['product_dt_id']) {
                    $allSlPro++;
                    $tongTien += $proCart['total'];
                }
            }
        include "view/cart.php";
    }

    public function order() {
        if (empty($_SESSION['myCart'])) {
            header('Location: index.php').'';
            return;
        }

        $allSlPro = 0;
        $array = [];
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
            }
        }
        $dsCategory = $this->categoryQuery->all();

        if (isset($_POST['submitInforCart'])) {
            // echo "<Pre>";
            // print_r($_POST);
            $index = 0;
            $lastIndex = $_POST['lastIndex'];
            $tongTien = $_POST['tongTien'];  

            $timeNow =date('Y-m-d H:i:s');

            $checkVoucher = '';
           

            $mang= [];
            if ($tongTien >= 1000) { 
                $checkVoucher = 2;
                $dsVoucher = $this->voucherQuery->all_active();
                foreach($dsVoucher as $voucher) {
                    if ($timeNow <= $voucher->end_time && $timeNow >= $voucher->start_time ) {
                        array_push($mang,$voucher);
                    }
                }
            // echo "<Pre>";
            // print_r($mang);

            }  else if ($tongTien >= 500) {
                $checkVoucher = 1;
                $voucher5 = $this->voucherQuery->getVoucher500K_active();
                foreach($voucher5 as $voucher) {
                    if ($timeNow <= $voucher->end_time && $timeNow >= $voucher->start_time ) {
                        array_push($mang,$voucher);
                    }
                }
            }


            foreach($_POST as $info) {
               if ($lastIndex >= $index) {
                $product_dt_id = $_POST['product_dt_id'.$index];
                $pro_image = $_POST['imgInCart'.$index];
                $pro_info = $_POST['pro_inf'.$index];
                $totalOnePro = $_POST['totalOnePro'.$index];
                $soluong = $_POST['soluongIncart'.$index]; 
                $arry_Order = [
                    'product_dt_id' => $product_dt_id,
                    'pro_image' => $pro_image,
                    'pro_info' => $pro_info,
                    'totalOnePro' => $totalOnePro,
                    'soluong' => $soluong,
                    'tongTien' => $tongTien,
                ];
                array_push($array,$arry_Order);
                $index++;
               }
              
            }
            // echo "<Pre>";
            // print_r($array);
        }

        foreach ($array as $key => $checkSL) {
            // echo "<Pre>";
            // print_r($checkSL['soluong']);

            $product_dt_id_one = $this-> productDetailQuery->infoOneProductDetail($checkSL['product_dt_id']);

            // echo "<Pre>";
            // print_r($product_dt_id_one);

            if ($product_dt_id_one->pro_quantity - $checkSL['soluong'] <= 1  ) {
                ?>
                <script>
                     var product_dt_id_one = <?php echo json_encode($product_dt_id_one); ?>;
                    alert("Quá số lượng hàng còn trong kho tại sản phẩm: <?=$product_dt_id_one->pro_name?> \n Xin lỗi vì sự bất tiện này, chúng tôi xin phép được liên hệ với quý khách sớm nhất để trao đổi thêm!");
                    // alert("");
                    window.location.href = "?act=cart";
                </script>
                <?php
             
            return;
            }

            if ($checkSL['soluong'] > 10  ) {
                ?>
                <script>
                    alert("Xin lỗi vì sự bất tiện này, không thể đặt một lúc quá 10 sản phẩm.\n Nhân viên sẽ sớm liên hệ với quý khách để trao đổi thêm");
                    window.location.href = "?act=cart";
                </script>
                <?php
            return;
            }
        }

        $check ="";
        if (isset($_SESSION['acc_email'])) {
            $email = $_SESSION['acc_email'];
            // var_dump( $email);
            $acc_id = $_SESSION['acc_id'];
            $check = 1;
        } else {
            $check = 0;
        }

        include "view/order.php";
    }

    public function end_order() {
        $allSlPro = 0;
        $array = [];
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
            }
        }
        $dsCategory = $this->categoryQuery->all();
        if (isset($_POST['btn_DatHang'])) {
            // echo "<Pre>";
            // print_r($_POST);
            $index = 0;
            $lastIndex = $_POST['lastIndex'];
            $arrayBillDT = [];
            foreach($_POST as $info) {
                if ($lastIndex >= $index) {
                 $product_dt_id = $_POST['product_dt_id'.$index];
                 $totalOnePro = $_POST['totalOnePro'.$index];
                 $soluong = $_POST['soluong'.$index]; 
                 $arry_bill_dt = [
                     'product_dt_id' => $product_dt_id,
                     'totalOnePro' => $totalOnePro,
                     'soluong' => $soluong,
                 ];
                 array_push($arrayBillDT,$arry_bill_dt);
                 $index++;
                }
               
             }

            // echo "<Pre>";
            // print_r($arrayBillDT);

            if (!isset($_SESSION['acc_name'])) {
                ?>
                    <script>
                        alert("Vui lòng đăng nhập tài khoản để đặt hàng");
                        window.location.href = "?act=login";
                    </script>
                <?php
            } else {
                $voucher_quantityNew= '';
                $voucher_id = $_POST['voucher_id'];
                $voucher_one = $this->voucherQuery->getOneVoucher($voucher_id);

                if ($voucher_id == 3) {
                    $voucher_quantityNew = 0;
                } else {
                    $voucher_quantityNew = $voucher_one->voucher_quantity - 1 ;
                }

                
                $bill = new Bill();
                $bill->fullname = trim($_POST['fullname']);
                $bill->phone = trim($_POST['phone']);
                $bill->address = trim($_POST['address']);
                $bill->date_order = date('Y-m-d H:i:s');
                $bill->bill_total = trim($_POST['bill_total']);
                $bill->acc_id = trim($_POST['acc_id']);
                $bill-> bill_status= 0;
                $bill->payment_status = $_POST['payment_method'];
                $bill->voucher_id = $_POST['voucher_id'];
                $result = $this->billQuery->add_bill($bill);
                if (is_numeric($result)) {
                    // var_dump($result);
                    // echo "ok";
                    foreach($arrayBillDT as $bill) {
                        $product_dt_id_one = $this-> productDetailQuery->infoOneProductDetail($bill['product_dt_id']);
                        // echo $bill['soluong'];
                        // echo $bill['totalOnePro'];
                        // var_dump($product_dt_id_one );
                        $billDetail = new BillDetail();
                            $billDetail->pro_name = $product_dt_id_one->pro_name;
                            $billDetail->price = $product_dt_id_one->pro_price;
                            $billDetail->quantity =$bill['soluong'];
                            $billDetail->total = $bill['totalOnePro'];
                            $billDetail->bill_id = $result;
                            $billDetail->pro_dt_id = $product_dt_id_one->product_dt_id;
                        $result1 = $this->billDetailQuery->add_billDetail($billDetail);
                        if ($result1 == "ok") {
                            // header("Location: ?act=login");
                            // echo "ok";

                            // Kiểm tra số hàng đặt có nhỏ hơn số lượng trong kho hay không
  
                            $lastQuantity =  $product_dt_id_one->pro_quantity - $bill['soluong'];

                            $proDetail = new ProductDetail();
                            $proDetail -> pro_quantity = $lastQuantity;
                            $result2 = $this->productDetailQuery->updateQuantityDetail($proDetail,$product_dt_id_one->product_dt_id );
                            $updateVoucher_Quantity = $this->voucherQuery->updateQuantityVoucher( $voucher_id, $voucher_quantityNew);
                            $_SESSION["myCart"] = [];
                        } else {
                            echo "Đăng kí thất bại";
                        }
                    }
                } else {
                    $popup = "Đặt hàng không thành công. Vui lòng kiểm tra lại đơn đặt hàng!";
                    // echo "Đặt hàng thất bại";
                } 
            }
            include "view/end_order.php";
        }
    }  

    public function deleteOneProInCart() {
        $dsCategory = $this->categoryQuery->all();

        if (isset($_GET['product_dt_id'])) {
            $product_dt_id = $_GET['product_dt_id'];
            // var_dump($product_dt_id);
            foreach ($_SESSION["myCart"] as $key => $proCart) {
                  if ($proCart['product_dt_id'] ==  $product_dt_id) {
                    unset($_SESSION['myCart'][$key]);
                  }
            }
        }
        $allSlPro = 0;
        $tongTien = 0;
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
                $tongTien += $proCart['total'];
            }
        }
    include "view/cart.php";
    }


    public function deleteAllCart() {
        if(isset($_SESSION["myCart"]) && ($_SESSION["myCart"]) > 0) {
            unset($_SESSION["myCart"]);
            header("Location: ?act=cart");
        } else {
            echo "xóa thất bại";
        }
    }

    public function viewProfile() {
        $allSlPro = 0;
            foreach ($_SESSION["myCart"] as $key => $proCart) {
                if ($proCart['product_dt_id']) {
                    $allSlPro++;
                }
            }
        if(isset($_SESSION['acc_id'])) {
            // var_dump($_SESSION['acc_id']);
            $info = $this->accountQuery->infoOneAccount($_SESSION['acc_id']);
            $dsOrder = $this->billQuery->showBillOfAcc($_SESSION['acc_id']);
            // echo "<Pre>";
            // print_r($dsOrder);
        }




        $dsCategory = $this->categoryQuery->all();
        include "view/profile.php";
    }

    public function updateProfile() {
        $allSlPro = 0;
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
            }
        }
        $dsCategory = $this->categoryQuery->all();

        if (isset($_POST['updateProfile'])) {
            // echo "<Pre>";
            // print_r($_POST);
        }
        if (isset($_POST['updateFormProfile'])) {
            // echo "<Pre>";
            // print_r($_POST);
            $email = $_POST["acc_email"];
            // print_r($acc_email);
            $account = new Account();
            $account -> acc_name = trim($_POST["acc_name"]);
            $account -> acc_password = trim($_POST["acc_password"]);
            // $account -> acc_email = trim($_POST["acc_email"]);
            $account -> acc_phone = trim($_POST["acc_phone"]);
            $account -> acc_image = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "img/account/".time()."_".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $account -> acc_image = time()."_".$_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
                $result = $this -> accountQuery -> updateProfile($account, $email); 
                $_SESSION['acc_name'] = $_POST["acc_name"];
            } else {
                $result = $this -> accountQuery ->updateProfile_NoImg($account, $email); 
            }
            header("Location: ?act=view_profile");
        }

        include "view/updateProfile.php";
    }

    public function searchPro() {
        $allSlPro = 0;
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
            }
        }
        $dsCategory = $this->categoryQuery->all();
        if (isset($_POST['searchKeyPro'])) {
            // echo "<Pre>";
            // print_r($_POST);
            $key = $_POST['searchPro'];
            $dsPro_search = $this->productQuery->searchPro($key);
            //  echo "<Pre>";
            // print_r($dsPro_search);
            include "view/searchPro.php";
        } else {
            include "view/home.php";
        }
    }

    public function showAllProOfCate() {
        $allSlPro = 0;
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
            }
        }
        $dsCategory = $this->categoryQuery->all();
        if (isset($_GET['cate_id'])) {
            $dsAllProduct_same = $this->productQuery->getAllProSameCate_id($_GET['cate_id']);
            // echo "<Pre>";
            // print_r($dsAllProduct_same);
        $cate_one = $this->categoryQuery->show_one_cate($_GET['cate_id']);

            include "view/showProInCate.php";
        }
       
    }


}
?>