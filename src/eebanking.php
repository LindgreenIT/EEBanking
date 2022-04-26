<?php
namespace eeBanking;
use doctrine\DBAL\DriverManager;

class eeBanking {

    private $db;

    public function __construct() {
        $this->db = DriverManager::getConnection(array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'eebanking',
            'user' => 'root',
            'password' => '',
        ));
    }

    public function addAccout($account) {
        $this->db->insert('accounts', $account);
    }

    public function getAccountById($account_id) {
       if (is_numeric($account_id)) {  
             if ($account_id == null) {
                $sql = "SELECT * FROM accounts ORDER BY account_id DESC";
                $result = $stmt->executequery();
            } else {
                $sql = "SELECT * FROM accounts WHERE account_id = :account_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue('account_id', $account_id);
                $result = $stmt->executequery();
            }
            return $result;
        } else {
            return false;
        }
    }

    public function getAccountByUserId($user_id) {
        if (is_numeric($user_id) && $user_id != null && \strlen($user_id) == 10) {
            $sql = "SELECT * FROM accounts WHERE user_id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('user_id', $user_id);
            $result = $stmt->executequery();
            return $result;
        } else {
            return false;
        }
    }
}