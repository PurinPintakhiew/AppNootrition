<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowings;
use App\Models\Equipment;
use App\Models\Employee;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowings = Borrowings::query()->get();
        return view('Borrowing.index',compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipments = Equipment::query()->get();
        return view('borrowing.create',compact('equipments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

            $borrowing = new Borrowings();
            $borrowing->equipment_name = $request->equipment_name;
            $borrowing->user_id = $request->user()->id;
            $borrowing->borrow_date = date("Y-m-d H:i:s");
            $borrowing->remand_date = date("Y-m-d H:i:s");
            $borrowing->approve = 0;
            $borrowing->stetus = 0;

        
            if ($withdraw->save()) {
                $cut_stock = Equipment::where('equipment_id', '=', $request->equipment_id)
                    ->update(['qty' => $eq->qty - 1]);

                return response()->json(['success' => 'ยืมสำเร็จ']);
            }

            return response()->json(['error' => 'ยืมไม่สำเร็จ']);
            if($equipment->save()){
                return redirect()->route('equipments.index');
            }
    
            return redirect()->refresh();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
