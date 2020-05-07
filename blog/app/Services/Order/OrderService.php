<?php

namespace App\Services\Order;

use Illuminate\Database\QueryException;
use App\Repositories\Order\OrderRepositoryInterface as Order;

class OrderService
{

    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function importToCsv(array $dados)
    {
        try {
            return $this->order->importToCsv($dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getOrders($nameClient = null, $idClient = null, $deal = null, $idDeal = null, $orderBy = null, $startDate1 = null, $endDate1 = null)
    {
        try {
            return $this->order->getOrders($nameClient, $idClient, $deal, $idDeal, $orderBy, $startDate1, $endDate1);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function getTotalOrders($nameClient = null, $idClient = null, $deal = null, $idDeal = null, $orderBy = null, $startDate1 = null, $endDate1 = null)
    {
        try {
            return $this->order->getTotalOrders($nameClient, $idClient, $deal, $idDeal, $orderBy, $startDate1, $endDate1);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getOrder(int $id)
    {
        try {
            return $this->order->getOrder($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createOrder(array $dados)
    {
        try {
            return $this->order->createOrder($dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateOrder(int $id, array $dados)
    {
        try {
            return $this->order->updateOrder($id, $dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteOrder(int $id)
    {
        try {
            return $this->order->deleteOrder($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
