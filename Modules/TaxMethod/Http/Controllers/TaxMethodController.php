<?php

namespace Modules\TaxMethod\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TaxMethod\Entities\TaxMethod;


class TaxMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $taxmethods = TaxMethod::orderBy('id', 'DESC')->get();
        return view('taxmethod::index', compact('taxmethods'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('taxmethod::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tax_methods|max:50',
        ]);
        $taxmethod = New TaxMethod;
        $taxmethod->name = $request->name;
        $taxmethod->save();

        return redirect()->route('taxmethod.view')->with('message', 'taxmethod  Save Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('taxmethod::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $taxmethod = TaxMethod::find($id);
        return view('taxmethod::edit', compact('taxmethod'));
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
            'name' => 'required|unique:tax_methods|max:50',
        ]);
        $taxmethod =TaxMethod::find($id);
        $taxmethod->name = $request->name;
        $taxmethod->save();

        return redirect()->route('taxmethod.view')->with('message', 'taxmethod  Updated Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $taxmethod =TaxMethod::find($id);
        $taxmethod->delete();
        return redirect()->route('taxmethod.view')->with('message', 'taxmethod  Deleted Successfully');
    }
}
