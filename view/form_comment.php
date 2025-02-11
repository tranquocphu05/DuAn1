<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commment</title>
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/chiTietSP.css">
    <link rel="stylesheet" href="giaodien/comment.css">
</head>
<body>

    <div class="form_comment">
        <form action="" method="post">
            <textarea name="com_content" id="" placeholder="Mời bạn để lại bình luận" required></textarea>
            <input type="hidden" name="pro_id" value="<?php echo $_GET["id"] ?>">
            <input type="submit" name="submitFormCreateComment" value="GỬI BÌNH LUẬN">
        </form>
    </div>
    <div class="list_comment">
        <div class="count">
            <h5><?php echo $countComment ?> Bình luận</h5>
        </div>
        <hr>
        <?php foreach($dsCmtPro as $key => $one_comment) : ?>
        <div class="comment_detail">
            <div class="info">
                <div class="avt">
                    <?php if ($one_comment->acc_image === "") : ?>
                    <img src="img/account/user_default.png" alt="">
                    <?php endif; ?>
                    <?php if ($one_comment->acc_image != "") : ?>
                    <img src="img/account/<?= $one_comment->acc_image ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="account_name">
                    <h5><?= $one_comment->acc_name ?></h5>
                </div>
            </div>
            <div class="content">
                <?= $one_comment->com_content ?>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</body>
</html>