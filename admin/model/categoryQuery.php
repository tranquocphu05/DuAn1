<?php

class CategoryQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from category";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsCate = [];

            foreach ($data as $row) {
                $dsCate[] = convertToObjectCategory($row);
            }

            return $dsCate;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function create(Category $category) {
        try {
            $sql = "INSERT INTO `category`(`cate_id`, `cate_name`, `cate_status`) VALUES (NULL,'$category->cate_name','$category->cate_status')";
            $data = $this -> pdo -> exec($sql);
           
            if ($data==1) {
               return "ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }


    public function show_one_cate($cate_id) {
        try {
            $sql = "select * from category where cate_id = $cate_id";
            $data = $this->pdo->query($sql)->fetch();
           
            $danhSach = convertToObjectCategory($data);
            return $data;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function updateCate(Category $category) {
        try {
            $sql = "UPDATE `category` SET `cate_name`='$category->cate_name',`cate_status`='$category->cate_status' WHERE `cate_id`='$category->cate_id' ";
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
        
    public function updateCate_status(Category $category) {
        try {
            $sql = "UPDATE `category` SET `cate_status`='$category->cate_status' WHERE `cate_id`='$category->cate_id' ";
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