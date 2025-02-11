<?php

class VoucherController {

    public $voucherQuery;

    public function __construct() {
        $this -> voucherQuery = new VoucherQuery();
    }

    public function __destruct() {

    }

    // ---------------LIST OF ALL VOUCHERS----------
    public function list() {
        $dsVoucher = $this->voucherQuery->all();
        include "view/voucher/list.php";
    }

    // --------------INSERT NEW VOUCHERS------------ 
    public function create() {
        if(isset($_POST["submitFormCreateVoucher"])) {
            $voucher = new Voucher();
            $voucher -> voucher_name = trim($_POST["voucher_name"]);
            $voucher -> value = trim($_POST["value"]);
            $voucher -> start_time = "";
            $voucher -> end_time = "";
            $voucher -> voucher_quantity = trim($_POST["voucher_quantity"]);
            $voucher -> voucher_status = trim($_POST["voucher_status"]);
            $timeNow = date('Y-m-d H:i:s');

            $inputStartTime = $_POST['start_time'];
            if ($inputStartTime >= $timeNow) {
                $voucher -> start_time = $inputStartTime;
            } else {
                $voucher -> start_time = $timeNow;
            }

            $inputEndTime = $_POST['end_time'];
            if ($inputEndTime >= $voucher -> start_time) {
                $voucher -> end_time = $inputEndTime;
            } else {
                $voucher -> end_time = $timeNow;
            }

            $result = $this -> voucherQuery -> create($voucher);
            if ($result == "ok") {
                header("Location: ?act=list-voucher");
            } else {
                echo "Tạo mới voucher thất bại. Mời nhập lại";
            }
        }
        include "view/voucher/create.php";
    }

    public function update() {
        if (isset($_GET['voucher_id'])) {
           $voucher_id = $_GET['voucher_id'];
           $voucher_one = $this->voucherQuery->show_one_voucher($voucher_id);
        }

        if (isset($_POST['submitFormUpdateVoucher'])) {
            $voucher = new Voucher();
            $voucher -> voucher_id = $_GET['voucher_id'];
            $voucher -> voucher_name = trim($_POST["voucher_name"]);
            $voucher -> value = trim($_POST["value"]);
            $voucher -> start_time = $_POST['start_time'];
            $voucher -> end_time = "";
            $voucher -> voucher_quantity = trim($_POST["voucher_quantity"]);
            $voucher -> voucher_status = trim($_POST["voucher_status"]);
            // End Time Validate
            $inputEndTime = $_POST['end_time'];
            if ($inputEndTime >= $voucher -> start_time) {
                $voucher -> end_time = $inputEndTime;
            } else {
                $voucher -> end_time = $voucher -> start_time;
            }

            $result = $this -> voucherQuery -> update($voucher);

            if ($result == "ok") {
                header("Location: ?act=list-voucher");
            } else {
                echo "update voucher thất bại";
            }
        }
        include "view/voucher/update.php";
    }
}

?>