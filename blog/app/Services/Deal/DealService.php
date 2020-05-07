<?php

namespace App\Services\Deal;

use Illuminate\Database\QueryException;
use App\Repositories\Deal\DealRepositoryInterface as Deal;

class DealService
{

    private $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function getDeals()
    {
        try {
            return $this->deal->getDeals();
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getDeal(int $id)
    {
        try {
            return $this->deal->getDeal($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createDeal(array $dados)
    {
        try {
            return $this->deal->createDeal($dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateDeal(int $id, array $dados)
    {
        try {
            return $this->deal->updateDeal($id, $dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteDeal(int $id)
    {
        try {
            return $this->deal->deleteDeal($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
