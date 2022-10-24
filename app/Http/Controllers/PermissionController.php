<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Throwable;
class PermissionController extends Controller
{
    public function index()
    {
        try{
            $roles = Role::with('permissions')->get();
            return view('settings.permission')
                ->with('roles', $roles);
        }catch(Throwable $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
