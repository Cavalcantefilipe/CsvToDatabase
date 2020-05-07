<?php

namespace App\Services\Client;

use Illuminate\Database\QueryException;
use App\Repositories\Client\ClientRepositoryInterface as Client;

class ClientService
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getClients()
    {
        try {
            return $this->client->getClients();
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getClient(int $id)
    {
        try {
            return $this->client->getClient($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createClient(array $dados)
    {
        try {
            return $this->client->createClient($dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateClient(int $id, array $dados)
    {
        try {
            return $this->client->updateClient($id, $dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteClient(int $id)
    {
        try {
            return $this->client->deleteClient($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
