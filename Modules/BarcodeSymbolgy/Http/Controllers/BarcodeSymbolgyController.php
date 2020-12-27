<?php

namespace Modules\BarcodeSymbolgy\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BarcodeSymbolgy\Entities\BarcodeSymbol;

class BarcodeSymbolgyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $barcodesymbols = BarcodeSymbol::orderBy('id', 'DESC')->get();
        return view('barcodesymbolgy::index', compact('barcodesymbols'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('barcodesymbolgy::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:barcode_symbols|max:50',
        ]);
        $barcodesymbol = New BarcodeSymbol;
        $barcodesymbol->name = $request->name;
        $barcodesymbol->save();

        return redirect()->route('barcodesymbolgy.view')->with('message', 'Product Type Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('barcodesymbolgy::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $barcodesymbol = BarcodeSymbol::where('id', $id)->first();
        return view('barcodesymbolgy::edit', compact('barcodesymbol'));
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
            'name' => 'required|unique:barcode_symbols|max:50',
        ]);
        $barcodesymbol = BarcodeSymbol::find($id);
        $barcodesymbol->name = $request->name;
        $barcodesymbol->save();
        return redirect()->route('barcodesymbolgy.view')->with('message', 'Product Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $barcodesymbol = BarcodeSymbol::find($id);
        $barcodesymbol->delete();
        return redirect()->route('barcodesymbolgy.view')->with('message', 'Product Type Deleted Successfully');
    }
}
