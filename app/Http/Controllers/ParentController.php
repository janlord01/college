<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index(){
        $students = User::role('parent')
            // ->where('division','college')
            ->paginate(10);
    return view('parent.index',compact('students'));
    }
}
