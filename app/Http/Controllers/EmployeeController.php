<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $students = User::whereHas("roles", function($q){ 
            $q->whereNotIn("name", ['super-admin','teacher','student','parent','scanner']);
        
        })
        // ->where('division','college')
        ->paginate(10);
    return view('employee.index',compact('students'));
    }
}
