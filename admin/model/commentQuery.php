<?php

class CommentQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from comment join product on comment.pro_id = product.pro_id join account on comment.account_id = account.acc_id order by product.pro_name asc";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsCmt = [];

            foreach ($data as $row) {
                $dsCmt[] = convertToObjectComment($row);
            }

            return $dsCmt;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function delete($com_id) {
        try {
            $sql = "delete from comment where com_id = $com_id ";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();

        } catch (\Throwable $th) {
            
        }
    }

    public function readOneComment($com_id) {
        try {
            $sql = "select * from comment join product on comment.pro_id = product.pro_id join account on comment.account_id = account.acc_id where comment.com_id = $com_id";
            $data = $this->pdo->query($sql)->fetch();
            $info = convertToObjectComment($data);
            return $info;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    public function commentFromOnePro($pro_id) {
        try {
            $sql = "select * from comment join product on comment.pro_id = product.pro_id join account on comment.account_id = account.acc_id where comment.pro_id = $pro_id order by com_id desc limit 5 ";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsCmtPro = [];

            foreach ($data as $row) {
                $dsCmtPro[] = convertToObjectComment($row);
            }

            return $dsCmtPro;
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
            echo "<hr>";
        }
    }

    public function createComment($comment) {
        try {
            $sql = "insert into comment(com_content,com_date,account_id,pro_id) values ('$comment->com_content','$comment->com_date','$comment->account_id','$comment->pro_id')";
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

    public function countCommentOnePro($pro_id) {
        try {
            $sql = "select count(*) from comment where pro_id = $pro_id ";
            $data = $this -> pdo -> query($sql);
            return $data->fetchColumn();

        } catch (\Throwable $th) {
            
        }
    }
}
?>