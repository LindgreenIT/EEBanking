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

}