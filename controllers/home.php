<?php
namespace controllers;
defined('EXE') or die('Access');

use \lib\mvc\Controller;

class Home extends Controller {
    public function index() {
        $orderModel = $this->getModel('order');
        $buyerModel = $this->getModel('buyer');

        $orders = $orderModel->getAll();
        $buyers = $buyerModel->getAll();

        $this->render('home', [
            'orders' => $orders,
            'buyers' => $buyers
        ]);
    }

    public function store() {
        $orderModel = $this->getModel('order');

        $orderid = $orderModel->store($_POST);
        $order = $orderModel->getById($orderid);

        echo json_encode(['order' => $order]);
    }
}