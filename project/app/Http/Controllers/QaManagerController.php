<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QaManagerController extends Controller
{
    public function index()
    {
        
        return view('QAManager.dashboard');
    }
    public function sendReport()
    {
        $users = User::all();
        $departments = Department::all();
        return view('QAManager.sendReport', compact('departments'), compact('users'));
    }
}
