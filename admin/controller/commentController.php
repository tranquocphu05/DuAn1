<?php

class CommentController {

    public $commentQuery;

    public function __construct() {
        $this -> commentQuery = new CommentQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $dsCmt = $this->commentQuery->all();
        include "view/comment/list.php";
    }

    public function delete() {
        if(isset($_GET["com_id"])) {
            $this -> commentQuery -> delete($_GET["com_id"]);
            echo "Xóa bình luận thành công";
            header("Location: ?act=list-comment");
        } else {
            echo "xóa thất bại";
        }
    }

    public function readOneComment() {
        if(isset($_GET["com_id"]) && ($_GET["com_id"]) > 0) {
            $info = $this->commentQuery->readOneComment($_GET["com_id"]);
        }
        include "view/comment/detail.php";
    }
}

?>