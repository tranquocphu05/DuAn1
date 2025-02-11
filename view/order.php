<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <style>
        main {
            margin: 50px 0;
        }
    </style>
</head>

<body>
    <?php
        include "view/Component/header.php"
    ?>
    <!-- End header -->
<main>
        <div class="order_boxLeft">
            <div class="box_row1">
                <h3>Thông tin đặt hàng</h3>
                <div class="row1_content">
                    <?php
                        foreach ($array as $pro_Order)  :  ?>
                        <!-- var_dump $pro_Order;
                        die; -->
                        <div class="proInOrder">
                            <div class="row1_content_img">
                                <img src="<?=$pro_Order['pro_image']?>" alt="">
                            </div>
                            <div class="row1_content_inf">
                                <h5><?=$pro_Order['pro_info']?></h5>
                                <h5>Số lượng: <?=$pro_Order['soluong']?> </h5>
                                <h5>Giá: <?=$pro_Order['totalOnePro']?></h5>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                
                <h5  style="font-size: 18px; margin: 10px 0;" id="totalBill">Tổng tiền: <?=$pro_Order['tongTien']?></h5>

                <?php
                    if ($checkVoucher == 2) { ?>
                       <div class="voucher">
                       <h5>Voucher</h5>
                            <?php
                                foreach ($mang as $voucher) { 
                                 if ($voucher -> voucher_id !== 3 ) {  ?>
                                    <div class="value">
                                    <input type="radio" id="voucher" value="<?= $voucher->value?>" name="voucher" onchange="updateTotalBill(<?= $voucher->value?>)">
                                    <label for=""><?=$voucher->voucher_name?></label>
                                    </div>
                              <?php   }  
                             }
                            ?>
                       </div>
                <?php } else if($checkVoucher == 1) {?>
                    <div class="voucher">
                    <h5>Voucher</h5>
                         <?php
                                foreach ($mang as $voucher) { 
                                 if ($voucher -> voucher_id !== 3 ) {  ?>
                                    <div class="value">
                                        <input type="radio" id="voucher" value="<?= $voucher->value?>" name="voucher" onchange="updateTotalBill(<?= $voucher->value?>)">
                                        <label for=""><?=$voucher->voucher_name?></label>
                                    </div>
                              <?php   }  
                             }
                            ?>
                    </div>
                <?php }?>

                <p style="font-style: italic;font-size: 14px;">* Giá chưa bao gồm phí vận chuyển</p>
                <p style="font-style: italic;font-size: 14px;">* Chi phí vận chuyển sẽ được nhân viên báo khi xác nhận đơn hàng</p>
            </div>

            <div class="box_row2">
                <h3>Địa chỉ nhận hàng</h3>
                <form action="?act=end_order" method="post">
                    <input type="text"  name="acc_id" value="<?= $acc_id ?>" hidden>

                    <?php
                    $index = 0;
                        foreach ($array as $pro_Order)  : ?>
                            <input type="text"  name="product_dt_id<?=$index?>" value="<?= $pro_Order['product_dt_id'] ?>" hidden>
                            <input type="text"  name="soluong<?=$index?>" value="<?=$pro_Order['soluong']?>" hidden>
                            <input type="text"  name="totalOnePro<?=$index?>" value="<?=$pro_Order['totalOnePro']?>" hidden>
                            
                    <?php  $index ++; endforeach; 
                    $lastIndex = $index-1;
                    ?>
                        <input type="number" value="<?=$lastIndex?>" name="lastIndex" hidden>
                    

                    <input type="number" id="totalBillInput" name="bill_total" value="<?=$pro_Order['tongTien']?>" hidden>
                    <input type="number"  id="voucher_id" name="voucher_id" value="3" hidden>

                    <input type="text"  name="fullname" placeholder="Họ và tên *" required>
                    <input type="text"  name="phone" placeholder="Số điện thoai *" required>

                    
                    <?php
                        if ($check == 0 ) { ?>
                            <input type="email" value="" name="email" readonly placeholder="Vui lòng đăng nhập để hiện email tài khoản">
                     <?php   } else { ?>
                        <input type="email" value="<?=$email?>" name="email" readonly>
                    <?php }
                    ?> 

                    <input type="text"  name="address" placeholder="Địa chỉ *" required>
                    <!-- <input type="datetime-local"  name="date_order"> -->
                    <input type="radio" id="paypal" name="payment_method" value="1" required checked
                    style="    width: 22px; height: 22px; margin-left: 5%;">
                    <label for="paypal" style="line-height: 60px; margin-left: 16px;">Thanh toán khi nhận hàng (COD)</label><br>

                    <input type="radio" id="credit_card" name="payment_method" value="0" required
                    style="    width: 22px; height: 22px; margin-left: 5%;">
                    <label for="credit_card" style="line-height: 60px; margin-left: 16px;">Thanh toán ngay qua ngân hàng</label><br>

                    <button id='btn' name='btn_DatHang'>
                        Đặt hàng
                    </button>
                </form>
            </div>
        </div>

        <div class="order_boxRight">

        </div>
        
</main>
    <?php
        include "view/Component/footer.php"
    ?>
</body>
<script>
        function updateTotalBill(voucherAmount) {
        console.log(voucherAmount);
            var billAmount = <?=$pro_Order['tongTien']?>; // Giả sử tổng bill ban đầu là 1000
            var totalBill = billAmount - parseInt(voucherAmount/100*billAmount);
            document.getElementById("totalBill").innerText = 'Tổng tiền : ' + totalBill +'.000';
            document.getElementById("totalBillInput").value = totalBill+'.000';
            // document.getElementById("voucher_id").value = totalBill+'.000';

            if(voucherAmount == 5) {
                 document.getElementById("voucher_id").value = 1;
            } else if (voucherAmount == 8) {
                document.getElementById("voucher_id").value = 2;
            }
        }
    </script>

</html>