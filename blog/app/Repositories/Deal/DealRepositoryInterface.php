<?php

namespace App\Repositories\Deal;

interface DealRepositoryInterface
{

    public function getDeals();
    public function getDeal(int $id);
    public function createDeal(array $dados);
    public function updateDeal(int $id,array $dados);
    public function deleteDeal(int $id);
}
