<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
