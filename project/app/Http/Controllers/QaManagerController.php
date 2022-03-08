<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QaManagerController extends Controller
{
    public function index()
    {
        return view('QAManager.dashboard');
    }
    public function create()
    {
        return view('QAManager.CreateCategory');
    }
}
