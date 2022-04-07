<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    public function report()
    {
        $bill = Bill::whereDate('updated_at', '=', Carbon::today())->get();
        $numberBill = count($bill);
        $total = $bill->sum('total');
        $products = Product::all();
        $totalProducts = $products->sum('amount');
        return view('report', compact('numberBill', 'total', 'products', 'totalProducts'));
    }
}
