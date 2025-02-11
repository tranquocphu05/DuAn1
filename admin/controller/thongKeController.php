<?php

class thongKEController {

    public $thongKeQuery;
    public $thongKeMounthlyQuery;


    public function __construct() {
        $this -> thongKeQuery = new ThongKeQuery();
        $this -> thongKeMounthlyQuery = new thongKeMounthlyQuery();
    }

    public function __destruct() {

    }

    public function show() {
        $dsthongKe = $this->thongKeQuery->getQuantityOfProInCate();
        // echo "<pre>";
        // print_r( $dsthongKe);

        $dsSold_M7 = $this->thongKeMounthlyQuery->getTopProduct_M7_Y24();

        include "view/View_thongke.php";
    }


}

?>