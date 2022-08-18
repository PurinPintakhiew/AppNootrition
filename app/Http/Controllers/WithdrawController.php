<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraws;
use App\Models\Equipment;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws = Withdraws::query()->get();
       return view('withdraw.index',compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('withdraw.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->equipment_id) {

            $eq = Equipment::where('equipment_id', '=', $request->equipment_id)->first();

            if (is_null($eq)) {
                return response()->json(['null' => '❗️ไม่พบอุปกรณ์❗️']);
            }

            $withdraw = new Withdraws();
            $withdraw->equipment_id = $eq->equipment_id;
            $withdraw->equipment_name = $eq->equipment_name;
            $withdraw->equipment_address = $eq->equipment_address;
            $withdraw->user_id = $request->user()->id;
            $withdraw->date = date("Y-m-d H:i:s");
            $withdraw->approve = 0;
            $withdraw->stetus = 0;

            if ($withdraw->save()) {
                $cut_stock = Equipment::where('equipment_id', '=', $request->equipment_id)
                    ->update(['qty' => $eq->qty - 1]);

                return response()->json(['success' => 'เบิกสำเร็จ']);
            }

            return response()->json(['error' => 'เบิกไม่สำเร็จ']);
        }

        return response()->json(['fail' => 'ส่ง id มาสิ 🖕']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
       $withdraw = Withdraws::where('withdraw_id','=',$id)->delete();

       if($withdraw > 0){
            return 'success';
       }

       return "fail";

    }
}
