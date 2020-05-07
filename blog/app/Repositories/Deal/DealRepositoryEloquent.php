<?php

namespace App\Repositories\Deal;

use App\Models\Deal;
use App\Repositories\Deal\DealRepositoryInterface;


class DealRepositoryEloquent implements DealRepositoryInterface
{
    private $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }


    public function getDeals()
    {
        $query = $this->deal->select();
        return $query->get();
    }

    public function getDeal(int $id)
    {
        return $this->deal->select()
            ->where('idDeal', $id)
            ->first();
    }

    public function createDeal(array $dados)
    {
        return $this->deal->create($dados);
    }

    public function updateDeal(int $id, array $dados)
    {
        return $this->deal
            ->where('idDeal', $id)
            ->update($dados);
    }

    public function deleteDeal(int $id)
    {
        $query = $this->deal->find($id);
        return $query->delete();
    }
}
