<?php

namespace Modules\SaleUnit\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SaleUnit\Entities\SaleUnit;

class SaleUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $saleunits = SaleUnit::orderBy('id', 'DESC')->get();
        return view('saleunit::index', compact('saleunits'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('saleunit::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:sale_units|max:50',
        ]);
        $saleunit = New SaleUnit;
        $saleunit->name = $request->name;
        $saleunit->save();

        return redirect()->route('saleunit.view')->with('message', 'Sale Unit Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $saleunit = SaleUnit::find($id);
        return view('saleunit::edit', compact('saleunit'));
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
        $saleunit =SaleUnit::find($id);
        $saleunit->name = $request->name;
        $saleunit->save();
        return redirect()->route('saleunit.view')->with('message', 'Sale Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $saleunit =SaleUnit::find($id);
        $saleunit->delete();
        return redirect()->route('saleunit.view')->with('message', 'Sale Unit Deleted Successfully');

    }
}
