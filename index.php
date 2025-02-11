<?php
session_start();

// Nhúng các file cần dùng vào

//Common

include "common/env.php";
include "common/function.php";

// Nhứng troàn bộ các file controller
include "controller/HomeController.php";
include "controller/LoginController.php";
include "admin/controller/categoryController.php";

// Nhứng troàn bộ các file model


include 'admin/model/product.php';
include "model/productQuery.php";
include "model/loginQuery.php";
include "model/billQuery.php";
include "model/order.php";
// include "model/account.php";


include "admin/model/category.php"; 
include "admin/model/categoryQuery.php"; 
include "admin/model/account.php"; 
include "admin/model/accountQuery.php"; 
include "admin/model/bill.php"; 
include "admin/model/comment.php";
include "admin/model/commentQuery.php";
include "admin/model/news.php";
include "admin/model/newsQuery.php";
include "admin/model/voucher.php";
include "admin/model/voucherQuery.php";


// Thông tin act
$act = $_GET['act'] ?? '' ;
$id = $_GET['id']  ?? '';
date_default_timezone_set('Asia/Jakarta');

if(!isset($_SESSION["myCart"])) {
  $_SESSION["myCart"] = [];
}

match ($act) {
    '' => (new HomeController())->home(),
    'login' => (new LoginController) ->login(),
    'logout' => (new LoginController()) ->logout(),
    'signup' => (new LoginController()) ->signup(),
    // 'dangky' => (new LoginController()) ->dangky(),
    'cart' =>  (new HomeController())->cart(),
    'ctsp'=> (new HomeController()) -> ctsp(),
    'order' => (new HomeController()) -> order(),
    'end_order' => (new HomeController()) -> end_order(),
    // 'ctsp_dt' => (new HomeController()) -> ctsp_dt(),

    'deleteProInCart' => (new HomeController()) -> deleteOneProInCart(),

    'deleteAllCart' => (new HomeController()) -> deleteAllCart(),

    'view_profile' => (new HomeController()) -> viewProfile(),

    'update_profile' => (new HomeController()) -> updateProfile(),
    
    'searchPro' => (new HomeController()) -> searchPro(),

    'showAllProOfCate'=> (new HomeController()) -> showAllProOfCate(),
    
}


?>