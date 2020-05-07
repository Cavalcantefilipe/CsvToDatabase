<?php

namespace App\Http\Controllers\Order;

use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    private $orderSrv;

    public function __construct(OrderService $orderSrv)
    {
        $this->orderSrv = $orderSrv;
        $this->middleware('auth');
    }

    public function processForm()
    {
        $nameClient     = Input::get('nameClient') ?: 0;
        $idClient       = Input::get('idClient') ?: 0;
        $deal           = Input::get('deal') ?: 0;
        $idDeal         = Input::get('idDeal') ?: 0;
        $orderBy        = Input::get('orderBy') ?: 0;
        $startDate1     = Input::get('startDate1') ?: 0;
        $endDate1       = Input::get('endDate1') ?: 0;

        if ($startDate1 == 0 && $endDate1  == 0) {
            $startDate1 = 0;
            $endDate1 = 0;
        } else {
            $startDate1 = DateTime::createFromFormat('d/m/Y', $startDate1);
            $endDate1 = DateTime::createFromFormat('d/m/Y', $endDate1)->modify('+1 day');
            $startDate1 = (new Carbon($startDate1))->format('Y-m-d');
            $endDate1 =  (new Carbon($endDate1))->format('Y-m-d');
        }
        return Redirect::to('get/' . $nameClient . '/' . $idClient . '/' . $deal . '/' . $idDeal . '/' . $orderBy . '/' . (string) $startDate1 . '/' . (string) $endDate1);
    }


    public function index($nameClient = null, $idClient = null, $deal = null, $idDeal = null, $orderBy = null, $startDate1 = null, $endDate1 = null)
    {
        if ($orderBy) {
            if ($orderBy == 'hour') {
                $orderBy = 'TIME(project.order.date)';
            }
            if ($orderBy == 'day') {
                $orderBy = 'DAY(project.order.date)';
            }
            if ($orderBy == 'month') {
                $orderBy = 'Month(project.order.date)';
            }
        }
        $datas = $this->orderSrv->getOrders($nameClient, $idClient, $deal, $idDeal, $orderBy, $startDate1, $endDate1);
        $total = $this->orderSrv->getTotalOrders($nameClient, $idClient, $deal, $idDeal, $orderBy, $startDate1, $endDate1);

            $total = $total[0];
        $date = array(
            'min' => (string) (new Carbon($total['datemin']))->format('d/m/Y'),
            'max' => (string) (new Carbon($total['datemax']))->format('d/m/Y')
        );
        return view('get', compact('datas', 'total', 'date'));
    }
}
