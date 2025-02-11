<?php

class BillController {
    public $billQuery;
    public $billDetailQuery;

    public function __construct() {
        $this -> billQuery = new BillQuery();
        $this -> billDetailQuery = new BillDetailQuery();
    }

    public function __destruct() {

    }

    // -------------Bill-------------

    public function list() {
        $dsBill = $this->billQuery->all();
        include "view/bill/list.php";
    }

    // -------------Bill Detail----------------
    public function listBillDetail() {
        if(isset($_GET["bill_id"]) && ($_GET["bill_id"]) > 0 ) {
            $dsBillDetail = $this->billDetailQuery->all($_GET["bill_id"]);
            $info = $this->billQuery->readOneBill($_GET["bill_id"]);
        }
        if (isset($_POST['submitFormUpdateBillStatus'])) {
            $bill = new Bill();
            $bill->bill_id = ($_POST['bill_id']);
            $bill->bill_status = trim($_POST['bill_status']);
            $result = $this->billQuery->updateBillStatus($bill);
            if ($result == "ok") {
                header("Location: ?act=list-bill");
             } else {
                echo "cập nhật trạng thái đơn hàng thất bại";
             }
        }
        include "view/bill/detail.php";
    }
}

?>