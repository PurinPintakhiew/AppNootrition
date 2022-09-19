<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Categories;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index()
    {
        $equipments = Equipment::query()->get();
        return view('equipment.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::query()->get();
        return view('equipment.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'equipment_name' => 'required',
            'buy_date' => 'required',
            'qty' => 'required',
            'stetus' => 'required',
            'equipment_address' => 'required',
        ]);

        $equipment = new Equipment();
        $equipment->equipment_name = $request->equipment_name;
        $equipment->buy_date = $request->buy_date;
        $equipment->qty = $request->qty;
        $equipment->stetus = $request->stetus;
        $equipment->equipment_address = $request->equipment_address;

        if ($request->categories_id) {
            $equipment->categories_id = $request->categories_id;
        }

        if ($equipment->save()) {
            return redirect()->route('equipments.index');
        }

        return redirect()->refresh();
    }


    public function show($id)
    {
        $equipment = Equipment::where('equipment_id', '=', $id)->first();
        return view('equipment.show', compact('equipment'));
    }

    public function searchEQ($name)
    {
        $equipments = Equipment::where([
            ['equipment_name', 'LIKE', "%{$name}%"],
        ])->get();
        return view('equipment.search', compact('equipments'));
    }

    public function search(Request $request)
    {
        $data = [];
        $name = $request->name;
        $address = $request->address;
        $categories = $request->category;

        if ($name) {
            $data[] = ['equipment_name', 'LIKE', "%{$name}%"];
        }

        if ($address) {
            $data[] = ['equipment_address', 'LIKE', "%{$address}%"];
        }

        if ($categories) {
            $data[] = ['categories_id', '=', $categories];
        }

        $eq = Equipment::where($data)->get();

        return $eq;
    }


    public function edit($id)
    {
        $equipment = Equipment::where('equipment_id', '=', $id)->first();
        $categories = Categories::query()->get();
        return view('equipment.edit', compact('equipment', 'categories'));
    }


    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'equipment_name' => 'required',
            'buy_date' => 'required',
            'qty' => 'required',
            'stetus' => 'required',
            'equipment_address' => 'required',
        ]);

        $equipment = Equipment::where('equipment_id', '=', $id)->update([
            'equipment_name' => $request->equipment_name,
            'buy_date' =>  $request->buy_date,
            'qty' => $request->qty,
            'stetus' => $request->stetus,
            'equipment_address' => $request->equipment_address
        ]);

        if ($request->categories_id) {
            $equipment = Equipment::where('equipment_id', '=', $id)->update([
                'categories_id' => $request->categories_id,
            ]);
        }

        if ($equipment > 0) {
            return redirect()->route('equipments.index');
        }

        return redirect()->refresh();
    }

    public function destroy($id)
    {
        $equipment = Equipment::where('equipment_id', '=', $id)->delete();

        if ($equipment > 0) {
            return 'success';
        }

        return "fail";
    }
}
