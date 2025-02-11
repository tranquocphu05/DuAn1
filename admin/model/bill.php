<?php

class Bill {
    public $bill_id;
    public $fullname;
    public $phone;
    public $address;
    public $date_order;
    public $bill_total;
    public $acc_id;
    public $bill_status;
    public $payment_status;
    public $acc_name;
    public $voucher_id;
}

class BillDetail {
    public $bill_dt_id;
    public $pro_name;
    public $price;
    public $quantity;
    public $total;
    public $bill_id;
    public $pro_dt_id;
    public $pro_color;
    public $pro_size;
}

?>