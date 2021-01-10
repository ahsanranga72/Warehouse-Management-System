<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Entities\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        return view('brand::index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('brand::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $brand = New Brand;
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brand.view')->with('message', 'Band Added  Successfully');
        
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('brand::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('brand::edit', compact('brand'));
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
            'name' => 'required|unique:brands|max:50',
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brand.view')->with('message', 'Band Update Save Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.view')->with('message', 'Brand Successfully Deleted');
    }
}
