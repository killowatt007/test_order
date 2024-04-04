<?php
namespace controllers;
defined('EXE') or die('Access');

use \lib\mvc\Controller;

class Order extends Controller {
    public function index() {
        $orderid = $_GET['id'];
        $orderModel = $this->getModel('order');
        $order = $orderModel->getById($orderid);

        $this->render('order', [
            'order' => $order
        ]);
    }
}