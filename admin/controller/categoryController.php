<?php

class CategoryController {

    public $categoryQuery;

    public function __construct() {
        $this -> categoryQuery = new CategoryQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $dsCate = $this->categoryQuery->all();
        include "view/category/list.php";
    }

    public function create() {
        if (isset($_POST['submitFormCreateCate'])) {
            //    echo "<pre>";
            //    print_r($_POST);

            // chuyển đổi các giá trị nhâp -> thuộc tính của đối tượng
            $category = new category();
            $category->cate_name=trim($_POST['cate_name']);
            $category->cate_status=trim($_POST['cate_status']);
            // Call hàm creat() trong CategoryQuery
            $result = $this->categoryQuery->create($category);

            if ($result == "ok") {
                header("Location: ?act=list-category");
             } else {
                echo "Tạo mới danh mục sản phẩm thất bại";
             }
            };

        include "view/category/create.php";
    }

    public function update() {
        if (isset($_GET['id'])) {
           $cate_id = $_GET['id'];
           $cate_one = $this->categoryQuery->show_one_cate($cate_id);
        //    print_r( $cate_one);
        }

        if (isset($_POST['submitFormUpdateCate'])) {
            //    echo "<pre>";
            //    print_r($_POST);
             // chuyển đổi các giá trị nhâp -> thuộc tính của đối tượng
             $category = new Category();
             $category->cate_id= ($_POST['cate_id']);
             $category->cate_name= trim($_POST['cate_name']);
             $category->cate_status= trim($_POST['cate_status']);
               // Call hàm creat() trong CategoryQuery
            $result = $this->categoryQuery->updateCate($category);

            if ($result == "ok") {
                header("Location: ?act=list-category");
             } else {
                echo "update danh mục sản phẩm thất bại";
             }
        }
        include "view/category/update.php";
    }

    public function delete() {
        if (isset($_GET['id'])) {
           $cate_id = $_GET['id'];
           $cate_one = $this->categoryQuery->show_one_cate($cate_id);
        //    print_r( $cate_one);
        }

        if ($cate_one['cate_status'] == 1) {
          
             // chuyển đổi các giá trị nhâp -> thuộc tính của đối tượng
             $category = new Category();
             $category->cate_id= $cate_id;
       
             $category->cate_status = 0;
               // Call hàm creat() trong CategoryQuery
            $result = $this->categoryQuery->updateCate_status($category);

            if ($result == "ok") {
                header("Location: ?act=list-category");
             } else {
                echo "update danh mục sản phẩm thất bại";
             }
        }else {
            ?>
                <script>
                    alert("Deleted")
                </script>
            <?php

        }
        $dsCate = $this->categoryQuery->all();
        include "view/category/list.php";
    }

    public function restore() {
        if (isset($_GET['id'])) {
           $cate_id = $_GET['id'];
           $cate_one = $this->categoryQuery->show_one_cate($cate_id);
        //    print_r( $cate_one);
        }

        if ($cate_one['cate_status'] != 1) {
          
             // chuyển đổi các giá trị nhâp -> thuộc tính của đối tượng
             $category = new Category();
             $category->cate_id= $cate_id;
       
             $category->cate_status = 1;
               // Call hàm creat() trong CategoryQuery
            $result = $this->categoryQuery->updateCate_status($category);

            if ($result == "ok") {
                header("Location: ?act=list-category");
             } else {
                echo "update danh mục sản phẩm thất bại";
             }
        } else {
            ?>
                <script>
                    alert("Not deleted")
                </script>
            <?php

        }
        $dsCate = $this->categoryQuery->all();
        include "view/category/list.php";
    }
}

?>