<?php

namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function importToCsv(array $dados);
    public function getOrders($nameClient = null, $idClient = null, $deal = null, $idDeal = null, $orderBy = null, $startDate1 = null, $endDate1 = null);
    public function getTotalOrders($nameClient = null, $idClient = null, $deal = null, $idDeal = null, $orderBy = null, $startDate1 = null, $endDate1 = null);
    public function getOrder(int $id);
    public function createOrder(array $dados);
    public function updateOrder(int $id, array $dados);
    public function deleteOrder(int $id);
}
