<?php
namespace lib\mvc;
defined('EXE') or die('Access');

class Model {
    public function getPdo() {
        include_once ROOT . '/lib/pdo.php';
        $pdo = new \lib\PDO();

        return $pdo;
    }
}