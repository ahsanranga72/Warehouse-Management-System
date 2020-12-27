<?php

namespace Modules\ProductUint\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductUint\Entities\ProductUnit;

class ProductUintController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $productunits = ProductUnit::orderBy('id', 'DESC')->get();
        return view('productuint::index', compact('productunits'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        
        return view('productuint::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:product_units|max:50',
        ]);
        $productunit = New ProductUnit;
        $productunit->name = $request->name;
        $productunit->save();

        return redirect()->route('productunit.view')->with('message', 'Product Unit Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('productuint::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
    
        $productunit = ProductUnit::find($id);
        return view('productunit::edit', compact('productunit'));
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
            'name' => 'required|unique:product_units|max:50',
        ]);
        $productunit = ProductUnit::find($id);
        $productunit->name = $request->name;
        $productunit->save();

        return redirect()->route('productunit.view')->with('message', 'Product Unit Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {  
        $productunit = ProductUnit::find($id);
        $productunit->delete();
        return redirect()->route('productunit.view')->with('message', 'Product Unit Update Successfully');
    }
}
