<?php

namespace App\Repositories\Client;

interface ClientRepositoryInterface
{
    public function getClients();
    public function getClient(int $id);
    public function createClient(array $dados);
    public function updateClient(int $id,array $dados);
    public function deleteClient(int $id);
}
