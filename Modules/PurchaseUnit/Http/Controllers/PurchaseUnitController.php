<?php

namespace Modules\PurchaseUnit\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PurchaseUnit\Entities\PurchaseUnit;
use Modules\ProductUint\Entities\ProductUnit;

class PurchaseUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $purchaseunits = PurchaseUnit::orderBy('id', 'DESC')->get();
        $productunits = ProductUnit::all();
        return view('purchaseunit::index', compact('purchaseunits','productunits'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        //return view('purchaseunit::create');
        $productunits = ProductUnit::all();
        return view('purchaseunit::create', compact('productunits'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:purchase_units|max:50',
        ]);

        $purchaseunit = new purchaseunit;
        $purchaseunit->name = $request->name;
        $purchaseunit->parent_id = $request->parent_id;
        $purchaseunit->save();
        return redirect()->route('purchaseunit.view')->with('message', 'Purchase Unit Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

        $purchaseunit = PurchaseUnit::find($id);
        $productunits = ProductUnit::all();
        return view('purchaseunit::edit', compact('purchaseunit', 'productunits'));
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
            'name' => 'required|unique:sale_units|max:50',
        ]);
        $purchaseunit = PurchaseUnit::find($id);
        $purchaseunit->name = $request->name;
        $purchaseunit->parent_id = $request->parent_id;
        $purchaseunit->save();
        return redirect()->route('purchaseunit.view')->with('message', 'Purchase Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $purchaseunit = PurchaseUnit::find($id);
        $purchaseunit->delete();
        return redirect()->route('purchaseunit.view')->with('message', 'Purchase Unit Deleted Successfully');
    }
}
