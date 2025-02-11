<?php

class AccountController {

    public $accountQuery;


    public function __construct() {
        $this -> accountQuery = new AccountQuery();
    }

    public function __destruct() {

    }

    // ---------------LIST OF ALL ACCOUNTS----------
    public function list() {
        $dsAccount = $this->accountQuery->all();
        include "view/account/list.php";
    }

    // --------------INSERT NEW ACCOUNT------------ 
    public function create() {       
        if(isset($_POST["submitFormCreateAccount"])) {
            $account = new Account();
            $account -> acc_name = trim($_POST["acc_name"]);
            $account -> acc_password = trim($_POST["acc_password"]);
            $account -> acc_email = trim($_POST["acc_email"]);
            $account -> acc_phone = trim($_POST["acc_phone"]);
            $account -> acc_image = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/account/".time().$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $account -> acc_image = time().$_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
            }
            $result = $this -> accountQuery -> create($account);
            if ($result == "ok") {
                header("Location: ?act=list-account");
            } else {
                echo "Tạo mới tài khoản thất bại. Mời nhập lại";
            }
        }
        include "view/account/create.php";
    }

    // ---------------READING 1 ACCOUNT--------------
    // main function for updating account
    public function readOneAccount() {
        if(isset($_GET["acc_id"]) && ($_GET["acc_id"]) > 0) {
            $info = $this->accountQuery->infoOneAccount($_GET["acc_id"]);
            (new AccountController()) -> updateStatusAndRoleAccount();
            
        }
        include "view/account/update.php";
    }

    // ---------------EDIT ACCOUNT-------------
    public function updateAccount($acc_id) {
        if(isset($_POST["submitFormUpdateAccount"])) {
            $account = new Account();
            $account -> acc_name = trim($_POST["acc_name"]);
            $account -> acc_password = trim($_POST["acc_password"]);
            $account -> acc_email = trim($_POST["acc_email"]);
            $account -> acc_phone = trim($_POST["acc_phone"]);
            $account -> acc_status = trim($_POST["acc_status"]);
            $account -> acc_role = trim($_POST["acc_role"]);
            $account -> acc_image = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/account/".time()."_".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $account -> acc_image = time()."_".$_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
                $result = $this -> accountQuery -> updateFull($account, $acc_id); 
            } else {
                $result = $this -> accountQuery -> updateNoImg($account, $acc_id);
            }
            header("Location: ?act=list-account");      
        }
    }

    // --------------UPDATE STATUS AND ROLE ACCOUNTS-------------
    public function updateStatusAndRoleAccount() {
        if (isset($_GET["acc_id"]) && ($_GET["acc_id"]) > 0) {
            if(isset($_POST["submitFormUpdateAccount"])) {
                $account = new Account();
                $account -> acc_id = $_GET["acc_id"];
                $account -> acc_status = trim($_POST["acc_status"]);
                $account -> acc_role = trim($_POST["acc_role"]);
                $result_one = $this -> accountQuery -> updateStatusAccount($account);
                $result_second = $this -> accountQuery -> updateRoleAccount($account);
                header("Location: ?act=list-account");   
            }
        }
        
    }    
    
    // --------------UPDATE STATUS ACCOUNTS-------------
    public function updateStatusAccount() {
        if (isset($_GET['acc_id']) && isset($_GET['acc_id']) > 0) {
            $acc_one = $this->accountQuery->infoOneAccount($_GET['acc_id']);
        }
        $account = new Account();
        $account->acc_id= $_GET['acc_id'];
        if ($acc_one->acc_status == 1) {
            $account->acc_status = 0;
            $result = $this->accountQuery->updateStatusAccount($account); 
        } else {
            $account->acc_status = 1;
            $result = $this->accountQuery->updateStatusAccount($account); 
        }
        if ($result == "ok") {
            header("Location: ?act=list-account");
        } else {
            echo "Thay đổi trạng thái tài khoản thất bại";
        }
        include "view/account/list.php";
    }

    // --------------UPDATE ROLE ACCOUNTS-------------
    public function updateRoleAccount() {
        if (isset($_GET['acc_id']) && isset($_GET['acc_id']) > 0) {
            $acc_one = $this->accountQuery->infoOneAccount($_GET['acc_id']);
        }
        $account = new Account();
        $account->acc_id= $_GET['acc_id'];
        if ($acc_one->acc_role == 1) {
            $account->acc_role = 0;
            $result = $this->accountQuery->updateRoleAccount($account); 
        } else {
            $account->acc_role = 1;
            $result = $this->accountQuery->updateRoleAccount($account); 
        }
        if ($result == "ok") {
            header("Location: ?act=list-account");
        } else {
            echo "Thay đổi vai trò tài khoản thất bại";
        }
        include "view/account/list.php";
    }
}

?>