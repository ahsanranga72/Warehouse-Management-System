<?php

namespace Modules\ProductType\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductType\Entities\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    { 
        $producttypes = ProductType::orderBy('id', 'DESC')->get();
        return view('producttype::index', compact('producttypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('producttype::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'name' => 'required|unique:product_types|max:50',
        ]);
        $producttype = New ProductType;
        $producttype->name = $request->name;
        $producttype->save();

        return redirect()->route('producttype.view')->with('message', 'Product Type Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('producttype::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $producttype = ProductType::where('id', $id)->first();
        return view('producttype::edit', compact('producttype'));
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
            'name' => 'required|unique:product_types|max:50',
        ]);
        $producttype = ProductType::find($id);
        $producttype->name = $request->name;
        $producttype->save();
        return redirect()->route('producttype.view')->with('message', 'Product Type Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $producttype = ProductType::find($id);
        $producttype->delete();
        return redirect()->route('producttype.view')->with('message', 'Product Type Deleted Successfully');
    }
}
