<?php

use App\Models\Settings;
use App\Models\SchoolInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function active_academic_year(){
    $active = DB::table('college_academic_settings')
                ->where('status','Active')
                ->first();

    return isset($active->id) ? $active->id : 0;

}

function active_academic_year_display(){
    $active = DB::table('college_academic_settings')
                ->where('status','Active')
                ->first();

                // dd($active->id);
    return isset($active->acad_year) ? $active->acad_year : "";

}

function theme_color(){

    $settings = DB::table('college_settings')->get();

    return view('layouts.app')->with('settings', $settings);
}

