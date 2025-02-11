<?php

class AccountQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    // -----sql for showing all of accounts
    public function all() {
        try {
            $sql = "select * from account";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsAccount = [];

            foreach ($data as $row) {
                $dsAccount[] = convertToObjectAccount($row);
                
            }

            return $dsAccount;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    // -----sql for creating a new account
    public function create(Account $account) {
        try {
            $sql = "insert into account(acc_name,acc_password,acc_email,acc_phone,acc_image) values ('$account->acc_name','$account->acc_password','$account->acc_email','$account->acc_phone','$account->acc_image')";
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

    // ------sql for showing a account
    public function infoOneAccount($acc_id) {
        try {
            $sql = "select * from account where acc_id = $acc_id";
            $data = $this->pdo->query($sql)->fetch();
            $info = convertToObjectAccount($data);
            return $info;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    // ------sql for editing a account full
    public function updateFull(Account $account, $acc_id) {
        try {
            $sql = "update account set acc_name = '$account->acc_name', acc_image = '$account->acc_image', acc_email = '$account->acc_email', acc_password = '$account->acc_password', acc_phone = '$account->acc_phone', acc_status = '$account->acc_status', acc_role = '$account->acc_role' where acc_id = $acc_id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }

    // ------sql for editing a account without image
    public function updateNoImg(Account $account, $acc_id) {
        try {
            $sql = "update account set acc_name = '$account->acc_name', acc_email = '$account->acc_email', acc_password = '$account->acc_password', acc_phone = '$account->acc_phone', acc_status = '$account->acc_status', acc_role = '$account->acc_role' where acc_id = $acc_id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }

    // -------sql for updating status of an account
    public function updateStatusAccount(Account $account) {
        try {
            $sql = "UPDATE `account` SET `acc_status`='$account->acc_status' WHERE `acc_id`='$account->acc_id' ";
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

    // -------sql for updating role of an account
    public function updateRoleAccount(Account $account) {
        try {
            $sql = "UPDATE `account` SET `acc_role`='$account->acc_role' WHERE `acc_id`='$account->acc_id' ";
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

     // ------sql for editing a account propfile
     public function updateProfile(Account $account, $email) {
        try {
            $sql = "UPDATE `account` SET `acc_name`='$account->acc_name',`acc_password`='$account->acc_password',
            `acc_phone`='$account->acc_phone',`acc_image`='$account->acc_image' WHERE `acc_email` = '$email' ";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }

    public function updateProfile_NoImg(Account $account, $email) {
        try {
            $sql = "UPDATE `account` SET `acc_name`='$account->acc_name',`acc_password`='$account->acc_password',
            `acc_phone`='$account->acc_phone' WHERE `acc_email` = '$email' ";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }
}

?>