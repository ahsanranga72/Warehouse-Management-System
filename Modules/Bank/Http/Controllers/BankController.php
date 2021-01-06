<?php

namespace Modules\Bank\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Bank\Entities\Bank;
use Response;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $bank = Bank:: get()->all();
        return view('bank::index',compact('bank'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('bank::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $bank = new Bank;
        $bank->name = $request->bank_name;
        $bank->save();
        $save = $bank->save();
        if($save){
         return Response::json(array('success' => 'true', 'message' => 'Product has been added succesefully.'));
        }else{
         return Response::json(array('success' => 'false', 'message' => 'Product has not been added succesefully.'));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('bank::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
      
        $bank = Bank::where('id', $id)->first();
        return view('bank::edit', compact('bank'));
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
            'name' => 'required|unique:banks|max:50',
        ]);
        $bank = Bank::find($id);
        $bank->name = $request->name;
        $bank->save();
        return redirect()->route('bank.view')->with('message', 'Bank Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        return redirect()->route('bank.view')->with('message', 'Bank Deleted Successfully');
    }
}
