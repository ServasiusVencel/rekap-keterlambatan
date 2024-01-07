<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\students;
use App\Models\User;
use App\Models\lates;
use App\Models\rombels;
use App\Models\rayons;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalstudents = students::all()->count();
        $totalrombels= rombels::all()->count();
        $totalrayons = rayons::all()->count();
        $totaladmins = User::where('role', 'admin')->count();
        $totalps = User::where('role', 'ps')->count();
        return view('home', compact('totalstudents', 'totalrombels', 'totalrayons', 'totaladmins', 'totalps'));
    }

   }
