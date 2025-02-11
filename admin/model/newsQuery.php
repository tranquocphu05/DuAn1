
<?php

class NewsQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from news";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsNews = [];

            foreach ($data as $row) {
                $dsNews[] = convertToObjectNews($row);
            }

            return $dsNews;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function latestNews() {
        try {
            $sql = "select * from news order by rand() limit 3";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsNews = [];

            foreach ($data as $row) {
                $dsNews[] = convertToObjectNews($row);
            }

            return $dsNews;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function create(News $news) {
        try {
            $sql = "INSERT INTO `news`(`news_id`, `news_title`, `news_img`,`news_content` ) VALUES (NULL,'$news->news_title','$news->news_img','$news->news_content')";
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


    public function show_one_news($news_id) {
        try {
            $sql = "select * from news where news_id = $news_id";
            $data = $this->pdo->query($sql)->fetch();
            $danhSachNews = convertToObjectNews($data);
            return $danhSachNews;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function updateNewsWithoutImg(News $news, $news_id) {
        try {
            $sql = "update news set news_title = '$news->news_title', news_content = '$news->news_content' where news_id = $news_id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    public function updateNewsWithImg(News $news, $news_id) {
        try {
            $sql = "update news set news_title = '$news->news_title', news_img = '$news->news_img', news_content = '$news->news_content' where news_id = $news_id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    public function deleteNews($news_id) {
        try {
            $sql = "delete from news where news_id = $news_id ";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();

        } catch (\Throwable $th) {
            
        }
    }
        
}
?>