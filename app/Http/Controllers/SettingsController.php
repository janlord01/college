<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Announcement;
use App\Models\CollegeRequirement;
use App\Models\SchoolInfo;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

use Throwable;

class SettingsController extends Controller
{
    public function school_info(){
        $school_info = SchoolInfo::all();

        return view('settings.schoolinfo',compact('school_info'));
    }
    public function school_info_update(Request $request){
        // try{
            $request->validate([
                'school_name' => ['required', 'string', 'max:255'],
                'ched_no' => ['required', 'string', 'max:255'],
                'start_class' => ['required','date'],
                'class_end' => ['required','date'],
                'address' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'barangay' => ['required', 'string', 'max:255'],
                'zipcode' => ['required', 'integer'],
                'fb' => ['required', 'string', 'max:255'],
                'Mono' => ['required','min:11','numeric'],
                'phno' => ['required','numeric'],
                'email' => ['required', 'email', 'string','max:255'],
                'logo' => ['mimes:jpg,png,jpeg|max:5048']
    
            ]);
    
            $schoolInfo = SchoolInfo::first();
            $newImagePath = 'images/' . $schoolInfo->logo;
    
            if(isset($request->logo)){
                $newImageName = time() . '-' . $request->school_name . '.' . $request->logo->extension();
                $request->logo->move(public_path('images'), $newImageName);
                $schoolInfo->logo = $newImageName;
                // $user->save();
                if(File::exists($newImagePath)){
                    File::delete($newImagePath);
                }
            }
    
            $schoolInfo->school_name = $request->school_name;
            $schoolInfo->ched_no = $request->ched_no;
            $schoolInfo->country = $request->country;
            $schoolInfo->province = $request->province;
            $schoolInfo->city = $request->city;
            $schoolInfo->barangay = $request->barangay;
            $schoolInfo->address = $request->address;
            $schoolInfo->fb = $request->fb;
            $schoolInfo->email = $request->email;
            $schoolInfo->logo = isset($newImageName) ? $newImageName : $schoolInfo->logo;
            $schoolInfo->phone_no = $request->phno;
            $schoolInfo->mobile_no = $request->Mono;
            $schoolInfo->class_start = $request->start_class;
            $schoolInfo->class_end = $request->class_end;
            $schoolInfo->zipcode = $request->zipcode;
    
           if($schoolInfo->save()){
                return redirect()->back()->with('status', 'School Information Updated Successfully!');
            }else{
                return redirect()->back()->with('error', 'Something is wrong!!!');
            }
        // }catch(Throwable $e){
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }

    public function academic_year(){
        $academic_years = AcademicYear::paginate(10);

        return view('settings.academic', compact('academic_years'));
    }
    public function academic_year_create(){
        return view('settings.create-academic');
    }
    public function academic_year_store(Request $request){
        try{
            $request->validate([
                "name" => ['required', 'string', 'max:255'],
                "due_date" => ['required'],
                "unit_price" => ['required','numeric'],
            ]);
    
            $acad = new AcademicYear;
    
            $acad->acad_year = $request->name;
            $acad->due_date = $request->due_date;
            $acad->unit_price = $request->unit_price;
            $acad->status = 'Inactive';
    
            if($acad->save()){
                return redirect('/settings/acadamic-year')->with('status', 'School Year Successfully Added!');
            }else{
                return redirect()->back()->with('error', 'Something is wrong!!!');
            }
        }catch(Throwable $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function academic_year_edit($id){
        $academic = AcademicYear::where('id',$id)->first();
        return view('settings.edit-academic', compact('academic'));
    }
    public function academic_year_update(Request $request, $id){
        try{
            $request->validate([
                "name" => ['required', 'string', 'max:255'],
                "due_date" => ['required'],
                "unit_price" => ['required','numeric'],
            ]);
    
            $acad = AcademicYear::where('id', $id)->first();
    
            $acad->acad_year = $request->name;
            $acad->due_date = $request->due_date;
            $acad->unit_price = $request->unit_price;
    
            if($acad->save()){
                return redirect('/settings/acadamic-year')->with('status', 'School Year Successfully Updated!');
            }else{
                return redirect()->back()->with('error', 'Something is wrong!!!');
            }
        }catch(Throwable $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function academic_year_activate($id){
        // try{
            // $request->validate([
            //     "acad_id" => ['required']
            // ]);
    
            /**
             * 
             * Inactivate all the active
             * 
             */
            $academic = AcademicYear::where('status','Active')->get();
            if(isset($academic)){
                foreach ($academic as $key => $value) {
                    if($academic[$key]->status == 'Active' && $academic[$key]->id != $id){
                        $academic[$key]->status = 'Inactive';
                        $academic[$key]->save();
                    }
                }
            }
            $acad = AcademicYear::where('id', $id)->first();
            $acad->status = 'Active';
    
            if($acad->save()){
                return redirect()->back()->with('status', 'School Year Updated Successfully!');
            }else{
                return redirect()->back()->with('error', 'Something is wrong!!!');
            }
        // }catch(Throwable $e){
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
        
    }

    public function requirements(){
        $requirements = CollegeRequirement::paginate(10);
        return view('settings.requirement',compact('requirements'));
    }
    public function requirement_create(){
        return view('settings.create-requirement');
    }
    public function requirement_store(Request $request){
        $request->validate([
            'title' => ['required','max:255']
        ]);

        $requirement = new CollegeRequirement();
        $requirement->title = $request->title;
        $requirement->status = 'Active';

        if($requirement->save()){
            return redirect('/settings/requirement')->with('status','Requirement Successfully Added!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }

    }
    public function requirement_edit($id){
        $requirement = CollegeRequirement::where('id',$id)->first();
        return view('settings.edit-requirement',compact('requirement'));
    }
    public function requirement_update(Request $request, $id){
        $request->validate([
            'title' => ['required','max:255']
        ]);

        $requirement = CollegeRequirement::where('id', $id)->first();
        $requirement->title = $request->title;

        if($requirement->save()){
            return redirect('/settings/requirement')->with('status','Requirement Successfully Updated!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }

    }
    public function requirement_activate(Request $request,$id){
        $request->validate([
            'req_id' => ['required'],
            'status' => ['required'],
        ]);

        $requirement = CollegeRequirement::where('id', $id)->first();
        $requirement->status = $request->status;

        if($requirement->save()){
            return redirect()->back()->with('status','Requirement Successfully Updated!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function permissions()
    {
        try{
            $roles = Role::with('permissions')->get();
            return view('settings.permission')
                ->with('roles', $roles);
        }catch(Throwable $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    public function announcement(){
        $announcements = Announcement::where('acad_id', active_academic_year())->paginate(10);

        return view('settings.announcement', compact('announcements'));
    }

    public function theme(){
        $settings = Setting::all();

        return view('settings.theme',compact('settings'));
    }
    public function theme_update(Request $request){
        try{
            $request->validate([
                'colorSelected' => ['required', 'string', 'max:255']
            ]);
            
            $settings = Setting::where('id', $request->id)->first();
            // dd($settings);
    
            $settings->theme_color = $request['colorSelected'];
    
            if($settings->save()){
                return redirect()->back()->with('status', 'Theme Color Updated!');
            }else{
                return redirect()->back()->with('error', 'Something is not right!!!');
            }
        }catch(Throwable $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
