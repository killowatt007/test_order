<?php
namespace models;
defined('EXE') or die('Access');

use \lib\mvc\Model;

class Buyer extends Model {
    public function getAll() {
        $pdo = $this->getPDO();

        $data = $pdo
            ->prepare('SELECT * FROM buyers ORDER BY id DESC')
            ->fetchAllAssoc();

        return $data;
    }

    public function getById($id) {
        $pdo = $this->getPDO();

        $data = $pdo
            ->prepare('SELECT * FROM buyers WHERE id=?')
            ->bindValues([$id])
            ->fetchAllAssoc();

        return $data[0];
    }
}