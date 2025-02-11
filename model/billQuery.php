 <?php
    class BillQuery
    {
        public $pdo;
        public function __construct()
        {
            $this->pdo = connectDB();
        }

        public function __destruct()
        {
            $this->pdo = 'null';
        }


        // private $bill_id;
        // // Các phương thức khác và constructor...

        // public function getBillId() {
        //     return $this->bill_id;
        // }



        public function add_bill(Bill $bill)
        {
            try {
                $sql = "INSERT INTO `bill`(`bill_id`, `fullname`, `phone`, `address`, `date_order`, `bill_total`, `acc_id`, `bill_status`, `payment_status`, `voucher_id`) 
                VALUES (NULL, '$bill->fullname', '$bill->phone', '$bill->address', '$bill->date_order', '$bill->bill_total', '$bill->acc_id', '$bill->bill_status', '$bill->payment_status', '$bill->voucher_id')";
                
                $data = $this->pdo->exec($sql);
                
                if ($data == 1) {
                    $billId = $this->pdo->lastInsertId();
                    return $billId; // Trả về billId nếu thành công
                } else {
                    // Lỗi trong câu lệnh SQL
                    echo "SQL Error: " . $this->pdo->errorInfo()[2]; // In ra lỗi SQL
                    return false;
                }
            } catch (\Throwable $th) {
                // Thông báo lỗi chi tiết nếu có
                echo "Error: " . $th->getMessage(); // In ra thông báo lỗi
                return false;
            }
        }
        

        public function showBillOfAcc($acc_id)
        {
            try {
                $sql = "SELECT bill.bill_status, bill_detail.pro_name, product_detail.pro_size, product_detail.pro_color, bill_detail.quantity, bill_detail.total, product.pro_image,bill.date_order
                        FROM bill
                        INNER JOIN bill_detail ON bill.bill_id = bill_detail.bill_id 
                        INNER JOIN product_detail ON bill_detail.pro_dt_id = product_detail.product_dt_id
                        INNER JOIN product ON product_detail.pro_id = product.pro_id 
                        WHERE bill.acc_id = $acc_id 
                        ORDER BY bill.date_order DESC";
                $data = $this->pdo->query($sql)->fetchAll();
                $dsOrder = [];
                if ( $data === false) {
                    return "Lỗi";
                } else {
                    foreach ($data as $row) {
                        $dsOrder[] = convertToObjectOrder($row);
                    }
                   
                    return $dsOrder;
                }
                
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
                echo "<hr>";
            }
        }
    }

    class BillDetailQuery
    {
        public $pdo;
        public function __construct()
        {
            $this->pdo = connectDB();
        }

        public function __destruct()
        {
            $this->pdo = 'null';
        }


        public function add_billDetail(BillDetail $billDetail)
        {
            try {
                $sql = "INSERT INTO `bill_detail`(`bill_dt_id`, `pro_name`, `price`, `quantity`, `total`, `bill_id`, `pro_dt_id`)
                VALUES (NULL, '$billDetail->pro_name', '$billDetail->price', '$billDetail->quantity', '$billDetail->total', '$billDetail->bill_id', '$billDetail->pro_dt_id')";
                
                $data = $this->pdo->exec($sql);
                
                if ($data == 1) {
                    return "ok"; // Thành công
                } else {
                    // Lỗi trong câu lệnh SQL
                    echo "SQL Error: " . $this->pdo->errorInfo()[2]; // In ra lỗi SQL
                    return false;
                }
            } catch (\Throwable $th) {
                // Thông báo lỗi chi tiết nếu có
                echo "Error: " . $th->getMessage(); // In ra thông báo lỗi
                return false;
            }
        }
        
    }
    ?>