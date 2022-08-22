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
        return view('Borrowing.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $equipments = Equipment::where('equipment_id', '=', $request->id)->first();
        return view('borrowing.create', compact('equipments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'equipment_id' => 'required',
            'equipment_name' => 'required',
            'borrow_date' => 'required',
            'remand_date' => 'required',
        ]);

        $borrowing = new Borrowings();
        $borrowing->equipment_id = $request->equipment_id;
        $borrowing->equipment_name = $request->equipment_name;
        $borrowing->user_id = $request->user()->id;
        $borrowing->borrow_date = $request->borrow_date;
        $borrowing->remand_date = $request->remand_date;
        $borrowing->approve = 0;
        $borrowing->stetus = 0;

        if($borrowing->save()){
            return redirect()->route('borrowings.index');
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
        $bw = Borrowings::where('borrow_id','=',$id)->first();
        return view('borrowing.edit',compact('bw'));
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
        $validated = $request->validate([
            'equipment_id' => 'required',
            'equipment_name' => 'required',
            'borrow_date' => 'required',
            'remand_date' => 'required',
        ]);

        $bw = Borrowings::where('borrow_id','=',$id)->update([
            'equipment_id' => $request->equipment_id,
            'equipment_name' => $request->equipment_name,
            'borrow_date' => $request->borrow_date,
            'remand_date' => $request->remand_date,
            'user_id' => $request->user()->id,
            'approve' => $request->approve,
            'stetus' => $request->stetus,
        ]);

        if($bw > 0){
            return redirect()->route('borrowings.index');
        }

        return redirect()->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bw = Borrowings::where('borrow_id','=',$id)->delete();

        if($bw > 0){
             return 'success';
        }

        return "fail";
    }
}
