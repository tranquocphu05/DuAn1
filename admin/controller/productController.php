<?php

// function for product

class ProductController {

    public $productQuery;
    public $categoryQuery;
    public $productDetailQuery;

    public function __construct() {
        $this -> productQuery = new ProductQuery();
        $this -> categoryQuery = new CategoryQuery();
        $this -> productDetailQuery = new ProductDetailQuery();
    }

    public function __destruct() {

    }

    // ---------------LIST OF ALL PRODUCTS----------
    public function list() {
        $dsProduct = $this->productQuery->all();
        include "view/product/list.php";
    }

    // --------------INSERT NEW PRODUCTS------------ 
    public function create() {       
        if(isset($_POST["submitFormCreatePro"])) {
            $product = new Product();
            $product -> pro_name = trim($_POST["pro_name"]);
            $product -> pro_description = trim($_POST["pro_description"]);
            $product -> cate_id = trim($_POST["cate_id"]);
            $product -> pro_image = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/product/".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $product -> pro_image = $_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
            }
            $result = $this -> productQuery -> createBase($product);
            if ($result == "ok") {
                header("Location: ?act=list-product");
            } else {
                echo "Tạo mới sản phẩm thất bại. Mời nhập lại";
            }
        }
        // lấy danh sách danh mục để hiển thị view create product
        $dsCate = $this -> categoryQuery -> all();
        include "view/product/create.php";
    }

    // ---------------READING 1 PRODUCT PARENTS--------------
    public function readOneProduct() {
        if(isset($_GET["pro_id"]) && ($_GET["pro_id"]) > 0) {
            $info = $this->productQuery->infoOneProduct($_GET["pro_id"]);
            (new ProductController()) -> updateProduct($_GET["pro_id"]);
            
        }
        $dsCate = $this -> categoryQuery -> all();
        if(isset($_GET["pro_id"])) {
            $dsProductDetail = $this->productDetailQuery->listProductDetail($_GET["pro_id"]);
        }
        include "view/product/update.php";
    }

    // ---------------EDIT PRODUCTS-------------
    public function updateProduct($pro_id) {
        if(isset($_POST["submitFormUpdatePro"])) {
            $product = new Product();
            $product -> pro_name = trim($_POST["pro_name"]);
            $product -> pro_description = trim($_POST["pro_description"]);
            $product -> cate_id = trim($_POST["cate_id"]);
            $product -> pro_status = trim($_POST["pro_status"]);
            $product -> pro_image = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/product/".time()."_".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $product -> pro_image = time()."_".$_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
                $result = $this -> productQuery -> updateFull($product, $pro_id); 
            } else {
                $result = $this -> productQuery -> updateNoImg($product, $pro_id);
            }
            header("Location: ?act=read-one-product&pro_id=$pro_id");      
        }
    }

    // --------------DELETE PRODUCTS----------------
    // WARNING!!!!!!!!! NOT USE
    public function deleteProduct() {
        if(isset($_GET["pro_id"])) {
            $this -> productQuery -> deleteProduct($_GET["pro_id"]);
            echo "Xóa sản phẩm thành công";
            header("Location: ?act=list-product");
        } else {
            echo "xóa thất bại";
        }
    }
    // WARNING!!!!!!!!! NOT USE

    // --------------UPDATE STATUS PRODUCTS-------------
    public function updateStatusProduct() {
        if (isset($_GET['pro_id']) && isset($_GET['pro_id']) > 0) {
            $pro_one = $this->productQuery->infoOneProduct($_GET['pro_id']);
        }
        $product = new Product();
        $product->pro_id= $_GET['pro_id'];
        if ($pro_one->pro_status == 1) {
            $product->pro_status = 0;
            $result = $this->productQuery->updateStatusProduct($product); 
        } else {
            $product->pro_status = 1;
            $result = $this->productQuery->updateStatusProduct($product); 
        }
        if ($result == "ok") {
            header("Location: ?act=read-one-product&pro_id=".$_GET['pro_id']);
        } else {
            echo "Thay đổi trạng thái sản phẩm thất bại";
        }
        $dsCate = $this->categoryQuery->all();
        include "view/product/list.php";
    }


    // ------------------------------------------------PRODUCT DETAILS----------------------------------------------------
    // ---------------LIST OF PRODUCT'S TYPES------------
    public function listProductDetail() {
        if(isset($_GET["pro_id"])) {
            $dsProductDetail = $this->productDetailQuery->listProductDetail($_GET["pro_id"]);
        }
        include "view/product/listDetail.php";
    }

    // --------------INSERT NEW PRODUCT'S TYPES------------ 
    public function createProductDetail() {       
        if(isset($_POST["submitFormCreateProDetail"]) && isset($_GET["pro_id"]) && isset($_GET["pro_id"]) > 0) {
            $proDetail = new ProductDetail();
            $proDetail -> pro_color = trim($_POST["pro_color"]);
            $proDetail -> pro_size = trim($_POST["pro_size"]);
            $proDetail -> pro_price = trim($_POST["pro_price"]);
            $proDetail -> pro_quantity = trim($_POST["pro_quantity"]);
            $proDetail -> pro_id = $_GET["pro_id"];

            $result = $this -> productDetailQuery -> createProductDetail($proDetail, $_GET["pro_id"]);
            if ($result == "ok") {
                header("Location: ?act=read-one-product&pro_id=$proDetail->pro_id");
            } else {
                echo "Tạo mới chi tiết sản phẩm thất bại. Mời nhập lại";
            }
        }
        include "view/product/createDetail.php";
    }

    // -------------DELETE A PRODUCT DETAIL--------------
    // WARNING!!!!!!!!! NOT USE
    public function deleteProductDetail() {
        if(isset($_GET["product_dt_id"]) && isset($_GET["pro_id"]) && isset($_GET["pro_id"]) > 0) {
            $this -> productDetailQuery -> delete($_GET["product_dt_id"]);
            echo "Xóa 1 chi tiết sản phẩm thành công";
            header("Location: ?act=read-one-product&pro_id=".$_GET["pro_id"]);
        } else {
            echo "xóa thất bại";
        }
    }
    // WARNING!!!!!!!!! NOT USE

    // ---------------READING 1 PRODUCT DETAIL--------------
    public function readOneProductDetail() {
        if(isset($_GET["product_dt_id"]) && ($_GET["product_dt_id"]) > 0 && isset($_GET["pro_id"]) && isset($_GET["pro_id"]) > 0) {
            $info = $this->productDetailQuery->infoOneProductDetail($_GET["product_dt_id"]);
            (new ProductController()) -> updateProductDetail($_GET["product_dt_id"]);
            
        }
        include "view/product/updateDetail.php";
    }

    // ---------------EDIT A PRODUCT'S DETAIL-------------
    public function updateProductDetail($product_dt_id) {
        if(isset($_POST["submitFormUpdateProDetail"]) && isset($_GET["pro_id"]) && isset($_GET["pro_id"]) > 0) {
            $proDetail = new ProductDetail();
            $proDetail -> pro_color = trim($_POST["pro_color"]);
            $proDetail -> pro_size = trim($_POST["pro_size"]);
            $proDetail -> pro_price = trim($_POST["pro_price"]);
            $proDetail -> pro_quantity = trim($_POST["pro_quantity"]);
            $proDetail -> product_dt_status = trim($_POST["product_dt_status"]);

            $result = $this -> productDetailQuery -> updateDetail($proDetail, $product_dt_id);
            
            header("Location: ?act=read-one-product&pro_id=".$_GET["pro_id"]);      
        }
    }

    // --------------UPDATE STATUS PRODUCT'S DETAIL-------------
    public function updateStatusProductDetail() {
        if (isset($_GET['product_dt_id']) && isset($_GET['product_dt_id']) > 0 && isset($_GET["pro_id"]) && isset($_GET["pro_id"]) > 0) {
            $product_dt_one = $this->productDetailQuery->infoOneProductDetail($_GET['product_dt_id']);
        }
        $proDetail = new ProductDetail();
        $proDetail->product_dt_id= $_GET['product_dt_id'];
        if ($product_dt_one->product_dt_status == 1) {
            $proDetail->product_dt_status = 0;
            $result = $this->productDetailQuery->updateStatusProductDetail($proDetail); 
        } else {
            $proDetail->product_dt_status = 1;
            $result = $this->productDetailQuery->updateStatusProductDetail($proDetail); 
        }
        if ($result == "ok") {
            header("Location: ?act=read-one-product&pro_id=".$_GET["pro_id"]);
        } else {
            echo "Thay đổi trạng thái chi tiết sản phẩm thất bại";
        }
    }
}


?>