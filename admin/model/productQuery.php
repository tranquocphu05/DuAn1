<?php
// SQL Query for Product
// -------Parents------
class ProductQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    // -----sql for showing all of products
    public function all() {
        try {
            $sql = "select * from product inner join category on product.cate_id = category.cate_id order by pro_id asc";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsProduct = [];

            foreach ($data as $row) {
                $dsProduct[] = convertToObjectProduct($row);
                
            }

            return $dsProduct;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    // -----sql for creating a new product parents
    public function createBase(Product $product) {
        try {
            $sql = "insert into product(pro_name,pro_image,pro_description,cate_id) values ('$product->pro_name','$product->pro_image','$product->pro_description','$product->cate_id')";
        // các giá trị của thuộc tính đặt trong dấu '' viêt liền không khoảng trắng: '$product->pro_name'
            $data = $this -> pdo -> exec($sql);
        // data = 1 nếu thành công
            if ($data == 1) {
                return "ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }

    // ------sql for showing a product parents
    public function infoOneProduct($pro_id) {
        try {
            $sql = "select * from product join category on product.cate_id = category.cate_id where product.pro_id = $pro_id";
            $data = $this->pdo->query($sql)->fetch();
            $info = convertToObjectProduct($data);
            return $info;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    // ------sql for editing a product parents full
    public function updateFull(Product $product, $pro_id) {
        try {
            $sql = "update product set pro_name = '$product->pro_name', pro_image = '$product->pro_image', pro_description = '$product->pro_description', cate_id = $product->cate_id, pro_status = '$product->pro_status' where pro_id = $pro_id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }

    // ------sql for editing a product parents without image
    public function updateNoImg(Product $product, $pro_id) {
        try {
            $sql = "update product set pro_name = '$product->pro_name', pro_description = '$product->pro_description', cate_id = $product->cate_id, pro_status = '$product->pro_status' where pro_id = $pro_id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }

    // -------sql for deleting a product parents (ON CASCADE) with all of product details
    // WARNING!!!!!!!!! NOT USE
    public function deleteProduct($pro_id) {
        try {
            $sql = "delete from product where pro_id = $pro_id ";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();

        } catch (\Throwable $th) {
            
        }
    }
    // WARNING!!!!!!!!! NOT USE

    // -------sql for updating status of a product parents
    public function updateStatusProduct(Product $product) {
        try {
            $sql = "UPDATE `product` SET `pro_status`='$product->pro_status' WHERE `pro_id`='$product->pro_id' ";
            $data = $this->pdo->exec($sql);
            if ($data == 1 || $data == 0) {
                return "ok";
            } else {
                return $data;
            }

        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }
}

// -----------Child-------------
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

    // -----sql for creating a new product detail
    public function createProductDetail(ProductDetail $proDetail, $pro_id) {
        try {
            $sql = "insert into product_detail(pro_color,pro_size,pro_price,pro_quantity,pro_id) values ('$proDetail->pro_color','$proDetail->pro_size','$proDetail->pro_price','$proDetail->pro_quantity','$pro_id')";
            $data = $this -> pdo -> exec($sql);
            if ($data == 1) {
                return "ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
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

    // ------sql for editing a product detail
    public function updateDetail(ProductDetail $proDetail, $product_dt_id) {
        try {
            $sql = "update product_detail set pro_color = '$proDetail->pro_color', pro_size = '$proDetail->pro_size', pro_price = '$proDetail->pro_price', pro_quantity = $proDetail->pro_quantity, product_dt_status = $proDetail->product_dt_status where product_dt_id = $product_dt_id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }

    // -----sql for deleting a product detail
    // WARNING!!!!!!!!! NOT USE
    public function delete($product_dt_id) {
        try {
            $sql = "delete from product_detail where product_dt_id = $product_dt_id ";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    // WARNING!!!!!!!!! NOT USE

    // -------sql for updating status of a product detail
    public function updateStatusProductDetail(ProductDetail $proDetail) {
        try {
            $sql = "UPDATE `product_detail` SET `product_dt_status`='$proDetail->product_dt_status' WHERE `product_dt_id`='$proDetail->product_dt_id' ";
            $data = $this->pdo->exec($sql);
            if ($data == 1 || $data == 0) {
                return "ok";
            } else {
                return $data;
            }

        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }


}
?>