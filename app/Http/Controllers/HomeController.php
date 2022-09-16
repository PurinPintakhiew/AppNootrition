<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipments = Equipment::query()->get();
        return view('home', compact('equipments'));
    }

    // controller User
    public function Withdraw()
    {
        return view('withdraw');
    }
    public function Borrowing()
    {
        return view('borrowing');
    }
    public function Return()
    {
        return view('return');
    }

    // controller Admin



}
