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

    public function getAccountById($account_id) {
        $queryBuilder = $this->db->createQueryBuilder();




    }

    public function getAccountByUserId($user_id) {
        if (is_numeric($user_id) and $user_id != null) {
            $sql = "SELECT * FROM accounts WHERE user_id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('user_id', $user_id);
            $result = $stmt->executequery();
            return $result;
        } else {
            return false;
        }
    }

    public function checktBallance($account_id, $amount) {
        $queryBuilder = $this->db->createQueryBuilder();

        $queryBuilder->select('balance')
                     ->from('accounts')
                     ->where('account_id = :account_id')
                     ->setParameter('account_id', $account_id);

        $result = $queryBuilder->execute();

        $row = $result->fetch();

        if ($row['balance'] >= $amount) {
            return true;
        } else {
            return false;
        }
    }

    public function checkAccess($account_id, $user_id) {
        if (is_numeric($account_id) and $account_id != null) {
            $sql = "SELECT * FROM accounts WHERE account_id = :account_id AND user_id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('account_id', $account_id);
            $stmt->bindValue('user_id', $user_id);
            $result = $stmt->executequery();
            return $result;
        } else {
            return false;
        }
    }


}