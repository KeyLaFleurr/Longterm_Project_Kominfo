<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Order;
use PDF;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

  /*  public function returnReport()
{
    $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
    $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

    if (request()->date != '') {
        $date = explode(' - ' ,request()->date);
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
    }

    $orders = Order::with(['customer.district'])->has('return')->whereBetween('created_at', [$start, $end])->get();
    return view('report.return', compact('orders'));
}

public function returnReportPdf($daterange)
{
    $date = explode('+', $daterange);
    $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
    $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

    $orders = Order::with(['customer.district'])->has('return')->whereBetween('created_at', [$start, $end])->get();
    $pdf = PDF::loadView('report.return_pdf', compact('orders', 'date'));
    return $pdf->stream();
}
*/
}