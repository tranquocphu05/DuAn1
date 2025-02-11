<?php
    class LoginQuery {
        public $pdo;
        public function __construct()
        {
           $this ->pdo=connectDB(); 
        }

        public function __destruct()
        {
            $this->pdo = 'null';
        }

        public function checkLogin($email, $password) {
            try {
                $sql = "select * from account where acc_email = '$email' and  acc_password = '$password' ";
                $data = $this-> pdo ->query($sql)->fetch();
                // $data có dữ liệu

                if ($data === false ) {
                   return 0;
                } else {
                  // Chuyển đổi thành object account
                  $account = new Account();
                  $account ->acc_id = $data['acc_id'];
                  $account ->acc_name = $data['acc_name'];
                  $account ->acc_password = $data['acc_password'];
                  $account ->acc_email = $data['acc_email'];
                  $account ->acc_phone = $data['acc_phone'];
                  $account ->acc_status = $data['acc_status'];
                  $account ->acc_role = $data['acc_role'];
          
                  return $account;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function signup(Account $account) {
            try {
                $sql = "INSERT INTO `account`(`acc_id`, `acc_name`, `acc_password`, `acc_email`, `acc_phone`, `acc_image`, `acc_status`, `acc_role`) 
                VALUES (NULL,'$account->acc_name','$account->acc_password','$account->acc_email','$account->acc_phone','$account->acc_image','$account->acc_status','$account->acc_role')";
                $data = $this->pdo->exec($sql);
                if ($data == 1) {
                    return "ok";
                } else {
                    return $data;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
?>