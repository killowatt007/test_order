<?php
namespace controllers;
defined('EXE') or die('Access');

use \lib\mvc\Controller;

class Buyer extends Controller {
    public function index() {
        $buyerid = $_GET['id'];
        $buyerModel = $this->getModel('buyer');
        $orderModel = $this->getModel('order');

        $buyer = $buyerModel->getById($buyerid);
        $orders = $orderModel->getByBuyerId($buyerid);
        $summOrders = $orderModel->getSumTotalPrice($orders);

        $this->render('buyer', [
            'buyer' => $buyer,
            'orders' => $orders,
            'summOrders' => $summOrders
        ]);
    }
}