<?php

class NewsController {

    public $newsQuery;

    public function __construct() {
        $this -> newsQuery = new NewsQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $dsNews = $this->newsQuery->all();
        include "view/news/list.php";
    }

    public function create() {       
        if(isset($_POST["submitFormCreateNews"])) {
            $news = new News();
            $news -> news_title = trim($_POST["news_title"]);
            $news -> news_content = trim($_POST["news_content"]);
            $news -> news_img = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $news -> news_img = $_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
            }
            $result = $this -> newsQuery -> create($news);
            if ($result == "ok") {
                header("Location: ?act=list-news");
            } else {
                echo "Tạo mới sản phẩm thất bại. Mời nhập lại";
            }
        }
        // lấy danh sách danh mục để hiển thị view create news
        include "view/news/create.php";
    }

    public function update() {       
        if (isset($_GET['id'])) {
            $news_one = $this->newsQuery->show_one_news($_GET['id']);
         }
        if(isset($_POST["submitFormUpdateNews"])) {
            $news = new News();
            $news -> news_title = trim($_POST["news_title"]);
            $news -> news_content = trim($_POST["news_content"]);
            $news -> news_img = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/".time()."_".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $news -> news_img = time()."_".$_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
                $result = $this -> newsQuery -> updateNewsWithImg($news,$_GET['id']); 
            } else {
                $result = $this -> newsQuery -> updateNewsWithoutImg($news,$_GET['id']); 
            }
            header("Location: ?act=list-news");
        }
        include "view/news/update.php";
    }

    public function deleteNews() {
        if(isset($_GET["news_id"])) {
            $this -> newsQuery -> deleteNews($_GET["news_id"]);
            echo "Xóa tin tức thành công";
            header("Location: ?act=list-news");
        } else {
            echo "xóa thất bại";
        }
    }

}

?>