<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Department;
use App\Models\Account;
use App\Models\Mission;
use App\Models\Semester;
use DB;


class AdminController extends Controller
{
    public function index()
    {
        $department = DB::table('departments')->count();
        $semester = DB::table('semesters')->count();
        $account = DB::table('users')->count();
        $mission = DB::table('missions')->count();
        $semesters = Semester::get(); //first()->ideas->count()

        $academic = Department::where('name',Department::ACADEMIC)->first();
        $count_academic = $academic->ideas->count();
        $support = Department::where('name',Department::SUPPORT)->first();
        $count_support = $support->ideas->count();

        $total = $count_academic + $count_support;
        if($total >  0){
            $count_academic_per = $count_academic/$total * 100;
            $count_support_per = $count_support/$total * 100;  
        }else{
            $count_academic_per = 0;
            $count_support_per = 0;  
        }
        $count_academic_contribute = User::withCount(['ideas'])->withCount(['comments as count_comments'])->where('department_id','=',$academic->id)->get()->filter(function($user) { return ($user->ideas_count > 0 || $user->comments_count > 0); })->count();
        $count_support_contribute = User::withCount(['ideas'])->withCount(['comments as count_comments'])->where('department_id','=',$support->id)->get()->filter(function($user) { return ($user->ideas_count > 0  || $user->comments_count > 0); })->count();
        
        return view('admin.dashboard', compact(
            'department',
            'semester',
            'account',
            'mission',
            'count_academic',
            'count_support',
            'count_academic_per',
            'count_support_per',
            'semesters',
            'count_academic_contribute',
            'count_support_contribute'
        ));
    }

    
}
