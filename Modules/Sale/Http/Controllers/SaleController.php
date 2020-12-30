<?php

namespace Modules\Sale\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Warehouse\Entities\Warehouse;
use Modules\Product\Entities\Product;
use SebastianBergmann\Environment\Console;
use Modules\Customer\Entities\Customer;
use Modules\ParchaseStatus\Entities\PurchaseStatus;
use Modules\OrderTax\Entities\OrderTax;
use Modules\User\Entities\User;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('sale::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        $customers = Customer::all();
        $purchasestatus = PurchaseStatus::all();
        $ordertax = OrderTax::all();
        $users = User::all();
        return view('sale::create',compact('warehouses','customers', 'purchasestatus','ordertax', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('sale::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('sale::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
