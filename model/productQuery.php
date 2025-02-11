<?php
    class ProductQuery {
        public $pdo;

        public function __construct()
        {
            $this ->pdo = connectDB();
        }

        public function __destruct()
        {
            $this ->pdo = null;
        }

        public function getTop16ProductLatest() {
            try {
                $sql = "select * from product inner join category on product.cate_id = category.cate_id  where product.pro_status = 1 order by pro_id asc ";
                $data = $this ->pdo->query($sql)->fetchAll();
                $dsProduct = [];
                foreach ($data as $row) {
                    $dsProduct[] = convertToObjectProduct($row);
                 }
                 return $dsProduct;

            } catch (Exception $e) {
                echo "Lỗi" .$e->getMessage();
                echo "<hr>";
            }
        }

        public function getProductSameCate_id($cate_id) {
            try {
                $sql = "select * from product inner join category on product.cate_id = category.cate_id  
                where product.cate_id = $cate_id and product.pro_status = 1 order by pro_id asc limit 4 ";
                $data = $this ->pdo->query($sql)->fetchAll();
                $dsProduct_same = [];
                foreach ($data as $row) {
                    $dsProduct_same[] = convertToObjectProduct($row);
                 }
                 return $dsProduct_same;

            } catch (Exception $e) {
                echo "Lỗi" .$e->getMessage();
                echo "<hr>";
            }
        }

        public function find($pro_id) {
            try {
                $sql = "select * from product inner join category on product.cate_id = category.cate_id where pro_id = $pro_id";
                $data = $this->pdo->query($sql)->fetch();
                // Chuyển đổi dữ liêụ --> object Produc
                
                    $product = convertToObjectProduct($data);
                    return $product;
        
            } catch (Exception $e) {
                echo "Lỗi: ".$e->getMessage();
                echo "<hr>";
            }
            
        }

        public function searchPro($key) {
            try {
                $sql = "select * from product inner join category on product.cate_id = category.cate_id where pro_name like '%$key%' ";
                $data = $this ->pdo->query($sql)->fetchAll();
                $dsProduct_search = [];
                foreach ($data as $row) {
                    $dsProduct_search[] = convertToObjectProduct($row);
                 }
                 return $dsProduct_search;
            } catch (Exception $e) {
                echo "Lỗi: ".$e->getMessage();
                echo "<hr>";
            }
            
        }

        
        public function getAllProSameCate_id($cate_id) {
            try {
                $sql = "select * from product inner join category on product.cate_id = category.cate_id  
                where product.cate_id = $cate_id and product.pro_status = 1 order by pro_id asc ";
                $data = $this ->pdo->query($sql)->fetchAll();
                $dsAllProduct_same = [];
                foreach ($data as $row) {
                    $dsAllProduct_same[] = convertToObjectProduct($row);
                 }
                 return $dsAllProduct_same;

            } catch (Exception $e) {
                echo "Lỗi" .$e->getMessage();
                echo "<hr>";
            }
        }
    }

    class ProductDetailQuery {
        public $pdo;
    
        public function __construct() {
            $this->pdo = connectDB();
        }
    
        public function __destruct() {
            $this -> pdo = null;
        }
    
        // ----------sql for showing all of products detail
        public function listProductDetail($pro_id) {
            try {
                $sql = "select * from product_detail join product on product_detail.pro_id = product.pro_id where product_detail.pro_id = $pro_id";
                $data = $this->pdo->query($sql)->fetchAll();
                $dsProductDetail = [];
    
                foreach ($data as $row) {
                    $dsProductDetail[] = convertToObjectProductDetail($row);
                }
    
                return $dsProductDetail;
                
            } catch (Exception $e) {
                echo "Lỗi: ".$e ->getMessage();
                echo "<hr>";
            }
        }

        public function listProductDetail_price() {
            try {
                $sql = "select * from product_detail join product on product_detail.pro_id = product.pro_id ";
                $data = $this->pdo->query($sql)->fetchAll();
                $dsProductDetail_price = [];
    
                foreach ($data as $row) {
                    $dsProductDetail_price[] = convertToObjectProductDetail($row);
                }
    
                return $dsProductDetail_price;
                
            } catch (Exception $e) {
                echo "Lỗi: ".$e ->getMessage();
                echo "<hr>";
            }
        }

            // ------sql for showing a product detail
        public function infoOneProductDetail($product_dt_id) {
            try {
                $sql = "select * from product_detail join product on product_detail.pro_id = product.pro_id where product_dt_id = $product_dt_id";
                $data = $this->pdo->query($sql)->fetch();
                $info = convertToObjectProductDetail($data);
                return $info;
                
            } catch (Exception $e) {
                echo "Lỗi: ".$e ->getMessage();
                echo "<hr>";
            }
        }

        public function infoOneProductDetail_color_size_proID($pro_id,$pro_size,$pro_color) {
            try {
                $sql = "SELECT * FROM product_detail 
                JOIN product ON product_detail.pro_id = product.pro_id 
                WHERE product_detail.pro_id = '$pro_id' 
                AND product_detail.pro_color = '$pro_color' 
                AND product_detail.pro_size = '$pro_size'";
                
                $data = $this->pdo->query($sql)->fetch();
                $info = convertToObjectProductDetail($data);
                return $info;
            } catch (Exception $e) {
                echo "Lỗi: ".$e ->getMessage();
                echo "<hr>";
            }
        }

        public function updateQuantityDetail(ProductDetail $proDetail, $product_dt_id) {
            try {
                $sql = "update product_detail set  pro_quantity = $proDetail->pro_quantity where product_dt_id = $product_dt_id";
                $data = $this -> pdo -> prepare($sql);
                return $data->execute();
            } catch (Exception $e) {
                echo "Lỗi: ".$e -> getMessage();
            }
        }
    }
?>