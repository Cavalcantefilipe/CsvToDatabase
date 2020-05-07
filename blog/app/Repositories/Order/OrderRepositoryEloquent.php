<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Repositories\Order\OrderRepositoryInterface;


class OrderRepositoryEloquent implements OrderRepositoryInterface
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function importToCsv(array $dados)
    {
        $query=DB::select(
            "call addCsvToDb(?, ?, ?,?,?,?,?)",
            [
                (int) $dados['idClient'],
                $dados['clientName'],
                (int) $dados['idDeal'],
                $dados['dealName'],
                $dados['date'],
                (int) $dados['accepted'],
                (int) $dados['refused']
            ]
        );
        return $query;
    }

    public function getOrders($nameClient = null, $idClient = null, $deal = null, $idDeal = null, $orderBy = null, $startDate1 = null, $endDate1 = null)
    {
        $query = $this->order->select()
            ->join('client', 'client.idClient', 'order.idClient')
            ->join('deal', 'deal.idDeal', 'order.idDeal');
        if ($nameClient) {
            $query = $query->where('name', $nameClient);
        };
        if ($idClient) {
            $query = $query->where('project.order.idClient', (int) $idClient);
        };
        if ($deal) {
            $query = $query->where('description', (string) $deal);
        };
        if ($idDeal) {
            $query = $query->where('project.order.idDeal', (int) $idDeal);
        };
        if ($startDate1) {
            $query = $query->where('project.order.date', '>=', $startDate1);
        };
        if ($endDate1) {
            $query = $query->where('project.order.date', '<=', $endDate1);
        };

        if ($orderBy) {
            $query = $query->orderBy(DB::raw($orderBy));
        };

        return $query->get();
    }

    public function getTotalOrders($nameClient = null, $idClient = null, $deal = null, $idDeal = null, $orderBy = null, $startDate1 = null, $endDate1 = null)
    {
        $total =  $this->order->select(DB::raw('sum(accepted)as totalac, sum(rejected)as totalrj, count(distinct project.order.idClient) as totalclients,count(distinct project.order.idDeal) as totalDeal, MAX(project.order.date) datemax, min(project.order.date) as datemin'))
            ->join('client', 'client.idClient', 'order.idClient')
            ->join('deal', 'deal.idDeal', 'order.idDeal');
        if ($nameClient) {
            $total = $total->where('project.client.name', $nameClient);
        };
        if ($idClient) {
            $total = $total->where('project.order.idClient', (int) $idClient);
        };
        if ($deal) {
            $total = $total->where('project.deal.description', (string) $deal);
        };
        if ($idDeal) {
            $total = $total->where('project.order.idDeal', (int) $idDeal);
        };
        if ($startDate1) {
            $total = $total->where('project.order.date', '>=',$startDate1);
        };
        if ($endDate1) {
            $total = $total->where('project.order.date', '<=',$endDate1);
        };

        return $total->get();
    }

    public function getOrder(int $id)
    {
        return $this->order->select()
            ->join('client', 'client.idClient', 'order.idClient')
            ->join('deal', 'deal.idDeal', 'order.idDeal')
            ->where('idOrder', $id)
            ->first();
    }

    public function createOrder(array $dados)
    {
        return $this->order->create($dados);
    }

    public function updateOrder(int $id, array $dados)
    {
        return $this->order
            ->where('idOrder', $id)
            ->update($dados);
    }

    public function deleteOrder(int $id)
    {
        $query = $this->order->find($id);
        return $query->delete();
    }
}
