<?php

namespace Modules\ParchaseStatus\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ParchaseStatus\Entities\PurchaseStatus;

class ParchaseStatusController extends Controller
{
   /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $parchasestatus = PurchaseStatus::orderBy('id','DESC')->get();
        return view('parchasestatus::index', compact('parchasestatus'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('parchasestatus::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:purchase_statuses|max:50',
        ]);
        $parchase = New PurchaseStatus;
        $parchase->name = $request->name;
        $parchase->save();

        return redirect()->route('parchasestatus.view')->with('message', 'PachaseStatus Save Successfully');
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
        $parchasestatus = PurchaseStatus::find($id);
        return view('parchasestatus::edit', compact('parchasestatus'));
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
            'name' => 'required|unique:purchase_statuses|max:50',
        ]);
        $parchasestatus = PurchaseStatus::find($id);
        $parchasestatus->name = $request->name;
        $parchasestatus->save();
        return redirect()->route('parchasestatus.view')->with('message', 'Parchase Status Update Save Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $parchasestatus = PurchaseStatus::find($id);
        $parchasestatus->delete();
        return redirect()->route('parchasestatus.view')->with('message', 'Parchase Status Successfully Deleted');
    }
}
