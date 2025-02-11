
<?php

class VoucherQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from voucher";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsVoucher = [];

            foreach ($data as $row) {
                $dsVoucher[] = convertToObjectVoucher($row);
            }

            return $dsVoucher;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }  

    public function getVoucher500K_active() {
        try {
            $sql = "select * from voucher where value = 5 and voucher_status = 1 ";
            $data = $this->pdo->query($sql)->fetchAll();
            $voucher5 = [];
            foreach ($data as $row) {
                $voucher5[] = convertToObjectVoucher($row);
            }
            return $voucher5;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }  

    public function all_active() {
        try {
            $sql = "select * from voucher where voucher_status = 1 and voucher_quantity > 0";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsVoucher = [];

            foreach ($data as $row) {
                $dsVoucher[] = convertToObjectVoucher($row);
            }

            return $dsVoucher;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function getOneVoucher($id) {
        try {
            $sql = "select * from voucher where voucher_id = $id ";
            $data = $this->pdo->query($sql)->fetch();
           
                $voucher_one= convertToObjectVoucher($data);

            return $voucher_one;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    public function updateQuantityVoucher($id,$voucher_quantity) {
        try {
            $sql = "update voucher set voucher_quantity = $voucher_quantity where voucher_id = $id";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

    public function create(Voucher $voucher) {
        try {
            $sql = "INSERT INTO `voucher`(`voucher_id`, `voucher_name`, `value`, `start_time`, `end_time`, `voucher_status`, `voucher_quantity`) VALUES (NULL,'$voucher->voucher_name','$voucher->value','$voucher->start_time','$voucher->end_time','$voucher->voucher_status','$voucher->voucher_quantity')";
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

    public function show_one_voucher($voucher_id) {
        try {
            $sql = "select * from voucher where voucher_id = $voucher_id";
            $data = $this->pdo->query($sql)->fetch();
           
            $oneVoucher = convertToObjectVoucher($data);
            return $oneVoucher;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function update(Voucher $voucher) {
        try {
            $sql = "UPDATE `voucher` SET `voucher_name`='$voucher->voucher_name',`value`='$voucher->value',`start_time`='$voucher->start_time',`end_time`='$voucher->end_time',`voucher_status`='$voucher->voucher_status',`voucher_quantity`='$voucher->voucher_quantity' WHERE `voucher_id`='$voucher->voucher_id' ";
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