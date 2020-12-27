<?php

namespace Modules\Warehouse\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Warehouse\Entities\Warehouse;



class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        return view('warehouse::index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('warehouse::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:warehouses|max:50',
        ]);
        $warehouse = New Warehouse;
        $warehouse->name = $request->name;
        $warehouse->save();

        return redirect()->route('warehouse.view')->with('message', 'warehouse Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('warehouse::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouse::edit', compact('warehouse'));
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
            'name' => 'required|unique:warehouses|max:50',
        ]);
        $warehouse = Warehouse::find($id);
        $warehouse->name = $request->name;
        $warehouse->save();

        return redirect()->route('warehouse.view')->with('message', 'warehouse Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
      
        $warehouse->delete();

        return redirect()->route('warehouse.view')->with('message', 'warehouse Updated Successfully');
    }
}
