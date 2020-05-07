<?php

namespace App\Http\Controllers\import;

use League\Csv\Reader;
use League\Csv\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\CsvImportRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Order\OrderService;

class ImportController extends Controller
{
    private $orderSrv;

    public function __construct(OrderService $orderSrv)
    {
        $this->orderSrv = $orderSrv;
    }

    public function parseImport(CsvImportRequest $request)
    {


        $path = $request->file('csv_file')->getRealPath();

        try {
            $csv = Reader::createFromPath($path, 'r');
            $numberRegister = $csv->count();

            for ($i = 0; $i < $numberRegister; $i++) {
                $csv->setHeaderOffset($i);
                $records = $csv->getHeader();
                if ($i == 0) {
                    if ($records[0] == 'client');
                    //header
                } else {

                    $client = explode('@', $records[0], 2);
                    $deal = explode('#', $records[1], 2);
                    $fixArray = array(
                        'idClient'  => $client[1],
                        'clientName' => $client[0],
                        'idDeal'    => $deal[1],
                        'dealName'  => $deal[0],
                        'date'      => $records[2],
                        'accepted'  => $records[3],
                        'refused'   => $records[4],
                    );
                    $arrayPrepared[] = $fixArray;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
        }
        $count = 0;
        $used = 0;
        foreach ($arrayPrepared as $toBase) {

            $data = $this->orderSrv->importToCsv($toBase);

            if ($data != [] ) {
                    $count++;
            }
            else {
                $used++;
            }
        }

        return redirect()
            ->action('HomeController@index')
            ->with('msg', "your CSV add $count lines to data base and $used duplicates Not add");
    }
}
