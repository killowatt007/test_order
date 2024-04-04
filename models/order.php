<?php
namespace models;
defined('EXE') or die('Access');

use \lib\mvc\Model;

class Order extends Model {
    private $status_ru = [
        'pending' => 'В ожидании',
        'payd' => 'Оплачено'
    ];

    public function getAll() {
        $pdo = $this->getPDO();

        $data = $pdo
        ->prepare('
            SELECT 
            orders.*,
            buyers.name AS buyer
            FROM orders
            LEFT JOIN buyers ON (buyers.id = orders.buyer_id)
            ORDER BY id DESC
        ')
        ->fetchAllAssoc();

        $data = $this->prepareData($data);

        return $data;
    }

    public function getById($id) {
        $pdo = $this->getPDO();

        $data = $pdo
        ->prepare('
            SELECT 
            orders.*,
            buyers.name AS buyer
            FROM orders
            LEFT JOIN buyers ON (buyers.id = orders.buyer_id)
            WHERE orders.id=?
        ')
        ->bindValues([$id])
        ->fetchAllAssoc();

        $data = $this->prepareData($data);

        return $data[0];
    }

    public function getByBuyerId($id) {
        $pdo = $this->getPDO();

        $data = $pdo
        ->prepare('
            SELECT 
            orders.*,
            buyers.name AS buyer
            FROM orders
            LEFT JOIN buyers ON (buyers.id = orders.buyer_id)
            WHERE orders.buyer_id=?
        ')
        ->bindValues([$id])
        ->fetchAllAssoc();

        $data = $this->prepareData($data);

        return $data;
    }

    public function store($data) {
        $pdo = $this->getPDO();

        $pdo
            ->prepare('
                INSERT INTO orders 
                    (total_price, description, buyer_id, status) 
                VALUES
                    (?,?,?,?)
            ')
            ->bindValues([$data['total_price'], $data['description'], $data['buyer_id'], 'pending'])
            ->execute();
        
        return $pdo->insertid();
    }

    public function getSumTotalPrice($orders) {
        $summ = [
            'pending' => 0,
            'payd' => 0,
            'all' => 0
        ];

        foreach ($orders as $row) {
            $total_price = $row['total_price'];

            if ($row['status'] == 'pending') {
                $summ['pending'] += $total_price;
            }

            elseif ($row['status'] == 'payd') {
                $summ['payd'] += $total_price;
            }

            $summ['all'] += $total_price;
        }

        return $summ;
    }

    private function prepareData($data) {
        foreach ($data as $i => $row) {
            $data[$i]['status_ru'] = $this->status_ru[$row['status']];
            $data[$i]['description_short'] = mb_strimwidth($row['description'], 0, 70, '...');
        }

        return $data;
    }
}