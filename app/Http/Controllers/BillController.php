<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\StaffInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::with('billDetails', 'customer')->get();
        return view('bill', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bill_id = DB::table('bills')->orderByDesc('id')->first()->id + 1;
        $staff = User::findOrFail(Auth::id())->with('staffInformation')->get();
        $product = Product::all();
        return view('create-bill', compact('bill_id', 'staff', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            try {
                $bill = new Bill();
                $bill->staff_id = Auth::id();
                $bill->customer_id = $request->idCustomer;
                $bill->total = $request->totalTotal;
                $bill->save();

                foreach ($request->data as $item) {
                    $billDetail = new BillDetail();
                    $billDetail->bill_id = (int)$bill['id'];
                    $billDetail->product_id = (int)$item['id'];
                    $billDetail->amount = (int)$item['amount'];
                    $billDetail->unit_price = Product::where('id', (int)$item['id'])->get()['0']->price;
                    $billDetail->save();

                    $product = Product::find((int)$item['id']);
                    $product->amount = $product->amount - (int)$item['amount'];
                    $product->update();
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }

            return response()->json([
                'bill' => (int)$bill['id'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        $detail = BillDetail::where('bill_id', $id)->get();
        $staff = StaffInformation::where('user_id', $bill->staff_id)->get();
        $customer = Customer::where('id', $bill->customer_id)->get();
        return view('bill-detail', compact('bill', 'detail', 'staff', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        $billDetail = BillDetail::where('bill_id', $id)->get();
        $customer = Customer::findOrFail($bill->customer_id);
        $staff = Auth::user();
        $product = Product::all();
        $total = 0;
        foreach ($billDetail as $item) {
            $x = $item->amount * $item->unit_price;
            $total += $x;
        }
        $total = (int)$total;
        return view('bill-update', compact('bill', 'billDetail', 'customer', 'staff', 'product', 'total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $bill = Bill::findOrFail($request->idBill);
                $bill->customer_id = $request->idCustomer;
                $bill->total = $request->totalTotal;
                $bill->update();

                $k = BillDetail::where('bill_id', $request->idBill)->get();
                foreach ($k as $item) {
                    $product = Product::where('id', $item->product_id)->first();
                    $product->amount = $product->amount + $item['amount'];
                    $product->update();
                }
                BillDetail::where('bill_id', $request->idBill)->delete();
                foreach ($request->data as $item) {
                    $billDetail = new BillDetail();
                    $billDetail->bill_id = (int)$bill['id'];
                    $billDetail->product_id = (int)$item['id'];
                    $billDetail->amount = (int)$item['amount'];
                    $billDetail->unit_price = Product::where('id', (int)$item['id'])->get()['0']->price;
                    $billDetail->save();

                    $product = Product::find((int)$item['id']);
                    $product->amount = $product->amount - (int)$item['amount'];
                    $product->update();
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }

            return response()->json([
                'bill' => (int)$bill['id'],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCustomer(Request $request)
    {
        if ($request->ajax()) {
            $customer = Customer::where('number', $request->phone)->get();
            return response()->json(['data' => $customer]);
        }
    }

    public function createCustomer(Request $request)
    {
        if ($request->ajax()) {
            try {
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->number = $request->number;
                $customer->address = $request->address;
                $customer->email = $request->email;
                $customer->save();
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
            return response()->json([
                'success' => "ok nhe",
                'data' => $customer
            ]);
        }
    }
    public function getProducts(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::findOrFail($request->id);
            return response()->json(['data' => $data]);
        }
    }

    public function printBill(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->id;
            $bill = Bill::findOrFail($id);
            $bill->print = 1;
            $bill->update();
            return response()->json(['data' => $bill]);
        }
    }

    public function billByDay(Request $request)
    {
        
        $bill = BillDetail::whereBetween(DB::raw('DATE(updated_at)'), [$request->from, $request->end])->get();
        $total = 0;
        foreach ($bill as $item) {
            $total += $item->amount * $item->unit_price;
        }
        $from = $request->from;
        $end = $request->end;
        // dd($bill);
        return view('billday', compact('bill', 'total', 'from', 'end'));
        
    }
}
