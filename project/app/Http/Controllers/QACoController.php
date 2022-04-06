<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Mission;
use DB;

class QACoController extends Controller
{
    public function index()
    {
        $department = DB::table('departments')->count();
        $category = DB::table('categories')->count();
        $account = DB::table('users')->count();
        $mission = DB::table('missions')->count();
        return view('QACo.dashboard', compact('department','category','account','mission'));
    }
    public function sendReport()
    {
        $users = User::all();
        $departments = Department::all();
    
        return view('QACo.sendReport', compact('departments','users'));
    }
    public function detail()
    {
        return view('detailDepartment');
    }
}
