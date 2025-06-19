<?php

namespace App\Http\Controllers;

use App\Models\anggotas;
use App\Models\karyawans;
use App\Models\transaksi_tabungans;
use App\Models\pembiayaan_anggotas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      
        return view('home');
    }
}
