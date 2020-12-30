<?php

namespace Modules\OrderTax\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OrderTax\Entities\OrderTax;

class OrderTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ordertaxs = OrderTax::orderBy('id','DESC')->get();
        return view('ordertax::index', compact('ordertaxs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ordertax::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:order_taxes|max:50',
            'tax_number' =>'required',
        ]);
        $ordertax = New OrderTax;
        $ordertax->name = $request->name;
        $ordertax->tax_number = $request->tax_number;
        $ordertax->save();
        return redirect()->route('ordertax.view')->with('message', 'Order Tax Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ordertax::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $ordertax = OrderTax::find($id);
        return view('ordertax::edit', compact('ordertax'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:order_taxes|max:50',
            'tax_number' =>'required',
        ]);
        $ordertax = OrderTax::find($id);
        $ordertax->name = $request->name;
        $ordertax->tax_number = $request->tax_number;
        $ordertax->save();
        return redirect()->route('ordertax.view')->with('message', 'Order Tax Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $ordertax = OrderTax::find($id);
        $ordertax->delete();
        return redirect()->route('ordertax.view')->with('message', 'Order Tax Deleted Successfully');
    }
}
