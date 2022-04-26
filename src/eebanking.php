<?php
namespace eeBanking;
use illuminate/database;

class eebanking {

    $db;

    public function __construct() {

        $this->db = new Database();

    }


}