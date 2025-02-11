<?php
// Hàm kết nối CSDL
    function connectDB() {
        $host = DB_HOST;
        $port  = DB_PORT;
        $dbname = DB_NAME;

        try {
            $conn = new PDO ("mysql:host=$host;port=$port;dbname=$dbname",DB_USER,DB_PASS);
            return $conn;
        } catch (\Throwable $th) {
            echo "Lỗi";
        }
    }


    function convertToObjectCategory($row) {
        $category = new Category();
        $category -> cate_id = $row['cate_id'];
        $category -> cate_name = $row['cate_name'];
        $category -> cate_status = $row['cate_status'];
        return $category;
    }

    function convertToObjectProduct($row) {
        $product = new Product();
        $product -> pro_id = $row['pro_id'];
        $product -> pro_name = $row['pro_name'];
        $product -> pro_image = $row['pro_image'];
        $product -> pro_description = $row['pro_description'];
        $product -> pro_status = $row['pro_status'];
        $product -> cate_id = $row['cate_id'];
        $product -> cate_name = $row['cate_name'];
        $product -> cate_status = $row['cate_status'];
        return $product;
    }

    function convertToObjectProductDetail($row) {
        $proDetail = new ProductDetail();
        $proDetail -> product_dt_id = $row['product_dt_id'];
        $proDetail -> pro_color = $row['pro_color'];
        $proDetail -> pro_size = $row['pro_size'];
        $proDetail -> pro_price = $row['pro_price'];
        $proDetail -> pro_quantity = $row['pro_quantity'];
        $proDetail -> pro_id = $row['pro_id'];
        $proDetail -> pro_name = $row['pro_name'];
        $proDetail -> pro_image = $row['pro_image'];
        $proDetail -> product_dt_status = $row['product_dt_status'];
        return $proDetail;
    }

    function convertToObjectNews($row) {
        $news = new News();
        $news -> news_id = $row['news_id'];
        $news -> news_title = $row['news_title'];
        $news -> news_img = $row['news_img'];
        $news -> news_content = $row['news_content'];
        return $news;
    }

    function convertToObjectAccount($row) {
        $account = new Account();
        $account -> acc_id = $row['acc_id'];
        $account -> acc_name = $row['acc_name'];
        $account -> acc_password = $row['acc_password'];
        $account -> acc_email = $row['acc_email'];
        $account -> acc_phone = $row['acc_phone'];
        $account -> acc_image = $row['acc_image'];
        $account -> acc_status = $row['acc_status'];
        $account -> acc_role = $row['acc_role'];
        return $account;
    }

    function convertToObjectComment($row) {
        $comment = new Comment();
        $comment -> com_id = $row['com_id'];
        $comment -> com_content = $row['com_content'];
        $comment -> com_date = $row['com_date'];
        $comment -> account_id = $row['account_id'];
        $comment -> pro_id = $row['pro_id'];
        $comment -> acc_name = $row['acc_name'];
        $comment -> pro_name = $row['pro_name'];
        $comment -> acc_image = $row['acc_image'];
        return $comment;
    }

    function convertToObjectBill($row) {
        $bill = new Bill();
        $bill->bill_id = $row['bill_id'] ?? null;
        $bill->fullname = $row['fullname'] ?? null;
        $bill->phone = $row['phone'] ?? null;
        $bill->address = $row['address'] ?? null;
        $bill->date_order = $row['date_order'] ?? null;
        $bill->bill_total = $row['bill_total'] ?? null;
        $bill->acc_id = $row['acc_id'] ?? null;
        $bill->bill_status = $row['bill_status'] ?? null;
        $bill->payment_status = $row['payment_status'] ?? null;
        $bill->acc_name = $row['acc_name'] ?? null;
        $bill->voucher_id = $row['voucher_id'] ?? null;
        return $bill;
    }
    

    function convertToObjectBillDetail($row) {
        $billDetail = new BillDetail();
        $billDetail -> bill_dt_id = $row['bill_dt_id'];
        $billDetail -> pro_name = $row['pro_name'];
        $billDetail -> price = $row['price'];
        $billDetail -> quantity = $row['quantity'];
        $billDetail -> total = $row['total'];
        $billDetail -> bill_id = $row['bill_id'];
        $billDetail -> pro_dt_id = $row['pro_dt_id'];
        $billDetail -> pro_color = $row['pro_color'];
        $billDetail -> pro_size = $row['pro_size'];
        return $billDetail;
    }

    function convertToObjectOrder($row) {
        $order = new Order();
        $order -> pro_name = $row['pro_name'];
        $order -> pro_color = $row['pro_color'];
        $order -> pro_size = $row['pro_size'];
        $order -> pro_image = $row['pro_image'];
        $order -> quantity = $row['quantity'];
        $order -> total = $row['total'];
        $order -> bill_status = $row['bill_status'];
        $order -> date_order = $row['date_order'];
        return $order;
    }

    function convertToObjectVoucher($row) {
        if ($row) { // Kiểm tra xem $row có hợp lệ hay không
            $voucher = new Voucher();
            $voucher->voucher_id = $row['voucher_id'];
            $voucher->voucher_name = $row['voucher_name'];
            $voucher->value = $row['value'];
            $voucher->start_time = $row['start_time'];
            $voucher->end_time = $row['end_time'];
            $voucher->voucher_status = $row['voucher_status'];
            $voucher->voucher_quantity = $row['voucher_quantity'];
            return $voucher;
        } else {
            return null; // Trả về null nếu $row không hợp lệ
        }
    }
    

    function convertToObjectThongKe($row) {
        $thongKe = new ThongKe();
        $thongKe -> cate_id = $row['cate_id'];
        $thongKe -> cate_name = $row['cate_name'];
        $thongKe -> total_quantity = $row['total_quantity'];
        return $thongKe;
    }

    function convertToObjectThongKeMounthly($row) {
        $thongKeMounthly = new ThongKeMounthly();
        $thongKeMounthly -> pro_name = $row['pro_name'];
        $thongKeMounthly -> total_pro_bill = $row['total_pro_bill'];
        return $thongKeMounthly;
    }

?>