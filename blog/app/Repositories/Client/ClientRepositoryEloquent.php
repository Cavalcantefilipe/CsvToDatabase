<?php

namespace App\Repositories\Client;

use App\Models\Client;
use App\Repositories\Client\ClientRepositoryInterface;


class ClientRepositoryEloquent implements ClientRepositoryInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function getClients()
    {
        $query = $this->client->select();
        return $query->get();
    }

    public function getClient(int $id)
    {
        return $this->client->select()
            ->where('idClient', $id)
            ->first();
    }

    public function createClient(array $dados)
    {
        return $this->client->create($dados);
    }

    public function updateClient(int $id, array $dados)
    {
        return $this->client
            ->where('idClient', $id)
            ->update($dados);
    }

    public function deleteClient(int $id)
    {
        $query = $this->client->find($id);
        return $query->delete();
    }
}
