<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Imports\UsersImport;
use App\Models\CollegeRequirement;
use App\Models\Contact;
use App\Models\StudentRequirement;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserTransfery;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon; // Include Class in COntroller
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index(){
        $students = User::role('college-student')
            // ->where('division','college')
            ->paginate(10);
        return view('student.index',compact('students'));
    }
    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        // try {
            $qrext = substr(md5(mt_rand()), 0, 5);
            $qrcode = $request['lname'] . '-' . $qrext;

            $request->qrcode = $qrcode;
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'dob' => ['required', 'date'],
                'gender' => ['required', 'string', 'max:255'],
                'nationality' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:500'],
                'country' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'barangay' => ['required', 'string', 'max:255'],
                'zipcode' => ['required', 'integer'],
                'contact' => ['required', 'min:11', 'numeric'],
                'image_user' => ['mimes:jpg,png,jpeg|max:5048'],
                'lrn' => ['required', 'unique:users_details'],
                'qrcode' => ['unique:users'],
            ]);
            $newImageName = '';
            if ($request->hasFile('image_user')) {
                $newImageName = time() . '-' . $request->fname . '-' . $request->lname . '.' . $request->image_user->extension();
                $request->image_user->move(public_path('images'), $newImageName);
            }
            $user = new User;
            $user->name = $request['fname'] . " " . $request['mname'] . " " . $request['lname'];
            $user->email = $request['email'];
            $user->image_path = $newImageName ? $newImageName : '';
            $user->password = Hash::make($request['password']);
            $user->qrcode = $request->qrcode;
            $user->division = "college";


            if (!$user->save()) {
                return redirect()->back()->with('error', 'Something went wrong!');
            } else {
                // $user->assignRole($request['role']);
                $user_id = DB::table('users')->latest('id')->first();
                $user->assignRole('college-student');


                $age = Carbon::parse($request['dob'])->diff(Carbon::now())->y;

                $userDetails = UserDetails::create([
                    'user_id' => $user_id->id,
                    'fname' => $request['fname'],
                    'lname' => $request['lname'],
                    'mname' => $request['mname'],
                    'lrn'   => (string)$request['lrn'],
                    'dob'   => date('Y-m-d', strtotime(str_replace('-', '/', $request['dob']))),
                    'gender' => $request['gender'],
                    'nationality' => $request['nationality'],
                    'country'    => $request['country'],
                    'province'   => $request['province'],
                    'city'  => $request['city'],
                    'address'    => $request['address'],
                    'barangay'  =>  $request['barangay'],
                    'zipcode'    => (string)$request['zipcode'],
                    'fb'    => $request['fb'],
                    'religion'  =>  $request['religion'],
                    'transfery' =>  $request['transfery'],
                    'indigenous' =>  $request['group_name'],
                    'stay_with' => $request['stay_with'],
                    'age' => $age

                ]);

                $userContact = Contact::create([
                    'user_id'   =>  $user_id->id,
                    'type'      => 'Phone Number',
                    'number' => $request['contact'],
                ]);

                if ($request['transfery'] == 'yes') {
                    $UserTransfery = UserTransfery::create([
                        'user_id'   =>  $user_id->id,
                        'last_grade_completed'  => $request['last_grade_completed'],
                        'last_school_year_completed' => $request['last_school_year_completed'],
                        'school_name'   =>  $request['school_name'],
                        'school_address' => $request['school_address']
                    ]);
                }
                // $studentReq = UserStudentReq::create([
                //     'user_id'   =>  $user_id->id,
                //     'report_card' => (isset($request['req'][0])) ? true : false,
                //     'good_moral'  => (isset($request['req'][2])) ? true : false,
                //     'psa_birth' => (isset($request['req'][1])) ? true : false,
                //     'certificate_completion' => (isset($request['req'][3])) ? true : false
                // ]);

                return redirect('/student')->with('status', 'Successfully Added!');
            }
        // } catch (Throwable $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }
    public function edit($id)
    {
        $student = User::join('users_details','users_details.user_id','=','users.id')
                ->leftJoin('contacts', 'contacts.user_id','=','users.id')
                ->leftJoin('transfery_users', 'transfery_users.user_id', '=', 'users.id')
                ->where('users.id',$id)->first();
        return view('student.edit',compact('student'));
    }
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'password' => ['required', 'string', 'min:8', 'confirmed'],
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'dob' => ['required', 'date'],
                'gender' => ['required', 'string', 'max:255'],
                'nationality' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:500'],
                'country' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'barangay' => ['required', 'string', 'max:255'],
                'zipcode' => ['required', 'integer'],
                'contact' => ['required', 'min:11', 'numeric'],
                'image_path' => ['mimes:jpg,png,jpeg|max:5048'],
                'lrn' => ['required']
            ]);
            $user = User::where('id', $id)->first();
            $userDetails = UserDetails::where('user_id', $id)->first();
            $userContact = Contact::where('user_id', $id)->first();
            $userTransfery = UserTransfery::where('user_id', $id)->first();


            $newImagePath = 'images/' . $user->image_path;


            //Setting Fullname
            $fullname = $request['fname'] . " " . $request['mname'] . " " . $request['lname'];

            //users Table data
            $user->name = $fullname;

            // $user->rfid_code = $request['rfid_code'];
            // $user->email = $request->email;
            if (!empty($request->password)) {
                $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                $user->password = Hash::make($request['password']);
            }
            if (!empty($request->email)) {
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
                $user->email = $request->email;
            }

            

            //User Details Table Data
            $age = Carbon::parse($request->dob)->diff(Carbon::now())->y;
            $userDetails->fname = $request['fname'];
            $userDetails->mname = $request['mname'];
            $userDetails->lname = $request['lname'];
            $userDetails->dob = $request['dob'];
            $userDetails->lrn = $request['lrn'];
            $userDetails->gender = $request['gender'];
            $userDetails->nationality = $request['nationality'];
            $userDetails->country = $request['country'];
            $userDetails->province = $request['province'];
            $userDetails->city = $request['city'];
            $userDetails->address = $request['address'];
            $userDetails->zipcode = $request['zipcode'];
            $userDetails->fb = $request['fb'];
            $userDetails->religion = $request['religion'];
            $userDetails->stay_with = $request['stay_with'];
            $userDetails->indigenous = ($request->indigenous == "yes") ? $request['group_name'] : '';
            $userDetails->barangay = $request['barangay'];
            $userDetails->age = $age;

            //User Contact Table Data
            if (!$userContact) {
                $userContact = new Contact();
                $userContact->number = $request['contact'];
            } else {
                $userContact->number = $request['contact'];
            }


            //User Transfery
            // if ($request['transfery'] == 'yes') {
            //     $usertrans = UserTransfery::where('user_id', $id)->first();
            //     if ($usertrans) {
            //         $userTransfery->last_grade_completed = $request['last_grade_completed'];
            //         $userTransfery->last_school_year_completed = $request['last_school_year_completed'];
            //         $userTransfery->school_name = $request['school_name'];
            //         $userTransfery->school_address = $request['school_address'];
            //         $userTransfery->save();
            //     } else {
            //         $userTransfery = new UserTransfery;
            //         $userTransfery->user_id = $id;
            //         $userTransfery->last_grade_completed = $request['last_grade_completed'];
            //         $userTransfery->last_school_year_completed = $request['last_school_year_completed'];
            //         $userTransfery->school_name = $request['school_name'];
            //         $userTransfery->school_address = $request['school_address'];
            //         $userTransfery->save();
            //     }
            // }

            // dd($userContact);

            if (isset($request->image_user)) {
                $newImageName = time() . '-' . $request->fname . '-' . $request->lname . '.' . $request->image_user->extension();

                $request->image_user->move(public_path('images'), $newImageName);

                $user->image_path = $newImageName;
                // $user->save();
                if (File::exists($newImagePath)) {
                    File::delete($newImagePath);
                }
            }

            if ($user->save() && $userDetails->save() && $userContact->save()) {

                //User Student transfery
                if (($request['transfery'] == 'yes') && ($userTransfery == null)) {
                    $studentTrans = UserTransfery::create([
                        'user_id' => $id,
                        'last_grade_completed' => $request['last_grade_completed'],
                        'last_school_year_completed' => $request['last_school_year_completed'],
                        'school_name' => $request['school_name'],
                        'school_address' => $request['school_address']
                    ]);
                } elseif (($request['transfery'] == 'yes') && ($userTransfery != null)) {
                    $userTransfery->last_grade_completed = $request['last_grade_completed'];
                    $userTransfery->last_school_year_completed = $request['last_school_year_completed'];
                    $userTransfery->school_name = $request['school_name'];
                    $userTransfery->school_address = $request['school_address'];
                    $user->save();
                } elseif (($request['transfery'] == 'no') && ($userTransfery != null)) {
                    $userTransfery->delete();
                }
                return redirect('/student')->with('status', 'Successfully Updated!!');
            } else {
                return redirect()->back()->with('error', 'Some Errors!');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }



        // dd($user);
    }
    public function regenerateQRCode($id, Request $request)
    {
        try {
            $user = User::join('users_details', 'users_details.user_id', '=', 'users.id')
                ->where('id', $id)->first();
            $qrext = substr(md5(mt_rand()), 0, 5);
            $qrcode = $user->lname . '-' . $qrext;
            $request->qrcode = $qrcode;
            $request->validate([
                'qrcode' => ['unique:users'],
            ]);

            $user->qrcode = $request->qrcode;
            if ($user->save()) {
                $newQr = $user->qrcode;
                $name = $user->name;
                return redirect()->back()->with('status', 'Generated New QrCode for:' . $name . '(QRCODE: ' . $newQr);
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        // dd($qrcode);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => ['required']
        ]);
        $students = User::role('college-student')
                ->where('users.name', 'like', '%' . $request->search . '%')
                // ->orWhere('users_details.lrn', 'like', '%' . $request->search . '%')
                ->paginate(10);
        return view('student.index', compact('students'));

    }
    public function import(){
        return view('student.import');
    }
    public function importStudent(Request $request)
    {
        $file = $request->file('importStudent')->store('import');
        $import = new StudentsImport();
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return redirect()->back()->withFailures($import->failures());
        } else if ($import) {
            return redirect()->back()->with('status', 'Uploaded Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!!!');
        }
    }

    public function export(){
        $path = storage_path('app/public/template-file-student.xlsx');
        return response()->download($path);
    }

    public function requirement($id)
    {
        $students = User::join('college_student_requirements', 'college_student_requirements.user_id', '=', 'users.id')
                ->join('college_requirements','college_requirements.id','=','college_student_requirements.college_requirement_id')
                ->select('college_requirements.title','college_requirements.id','college_student_requirements.file','college_student_requirements.notes','college_student_requirements.id AS csrID')
                ->where('users.id', $id)->get();
        $requirements = CollegeRequirement::where('status','Active')->get();
        $user_id = $id;

        return view('student.requirement', compact(['students','requirements','user_id']));
    }

    public function requirement_store(Request $request, $id){
        $request->validate([
            'title' => ['required'],
            'file' => 'required','mimes:pdf,jpg,png,jpeg|max:10000'
        ]);

        if($request->title == 'Select Requirements'){
            return redirect()->back()->with('error', 'Please Select Requirements!');
        }

        $newImageName = '';
        $ramdom = substr(md5(mt_rand()), 0, 5);

        if ($request->hasFile('file')) {
            $newImageName = $request->title  . '-' . $request->file->getClientOriginalName() . "-" . time() . '-' . $ramdom . '.' . $request->file->extension();
            
            $request->file->move(public_path('files'), $newImageName);
        }

        $checkFile = StudentRequirement::where('user_id', $id)
                        ->where('college_requirement_id', $request->title)
                        ->first();
        if($checkFile){
            return redirect()->back()->with('error', 'Duplicate Requirement!');
        }

        $studentReq = new StudentRequirement();
        $studentReq->user_id = $id;
        $studentReq->college_requirement_id	 = $request->title;
        $studentReq->notes	= $request->notes;
        $studentReq->file	= $newImageName;

        if($studentReq->save()){
            return redirect()->back()->with('status', 'Requirement Added!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function requirement_delete(Request $request)
    {
        if($request->deleteStudentFile == null){
            return redirect()->back()->with('error', 'Something Went Wrong, Please Try Again');
        }else{
            $studentReq = StudentRequirement::where('id', $request->deleteStudentFile)->first();
            $newFilePath = isset($studentReq->file) ? 'files/'.$studentReq->file :'';
            if($studentReq->delete()){
                if(File::exists($newFilePath)){
                    File::delete($newFilePath);
                }
                return redirect()->back()->with('status', 'Requirement Deleted Successfully!');
            }else{
                return redirect()->back()->with('error', 'Something Went Wrong, Please Try Again');
            }
        }
    }
    public function requirement_get_data($id)
    {
        $studentReq = StudentRequirement::join('college_requirements','college_requirements.id','=','college_student_requirements.college_requirement_id')
                ->select('college_requirements.title','college_requirements.id','college_student_requirements.file',
                'college_student_requirements.notes','college_student_requirements.id AS csrID','college_student_requirements.user_id')
                ->where('college_student_requirements.id', $id)->first();
        if ($studentReq) {
                return response()->json([
                    'status' => 200,
                    'getData' => $studentReq
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "Not Found"
                ]);
            }
    }
    public function requirement_update(Request $request)
    {
        // dd($request->file);
        $request->validate([
            'title' => ['required'],
            'editStudentFile' => ['required'],
            'user_id' => ['required'],
        ]);

        if($request->title == 'Select Requirements'){
            return redirect()->back()->with('error', 'Please Select Requirements!');
        }
        $studentReq = StudentRequirement::where('id', $request->editStudentFile)->first();
        
        $newImageName = '';
        $newFilePath = '';
        $ramdom = substr(md5(mt_rand()), 0, 5);

        if ($request->has('file')) {
            $request->validate([
                'file' => 'required','mimes:pdf,jpg,png,jpeg|max:10000'
            ]);
            $newImageName = $request->title  . '-' . $request->file->getClientOriginalName() . "-" . time() . '-' . $ramdom . '.' . $request->file->extension();
// dd($newImageName);
            
            $request->file->move(public_path('files'), $newImageName);
            $newFilePath = isset($studentReq->file) ? 'files/'.$studentReq->file :'';
        }

        // $checkFile = StudentRequirement::where('user_id', $request->user_id)
        //                 ->where('college_requirement_id', $request->title)
        //                 ->first();
        // if($checkFile){
        //     return redirect()->back()->with('error', 'Duplicate Requirement!');
        // }

        $studentReq->user_id = $request->user_id;
        $studentReq->college_requirement_id	 = $request->title;
        $studentReq->notes	= $request->notes;
        $studentReq->file	= $newImageName ? $newImageName : $studentReq->file;

        if($studentReq->save()){
            if(File::exists($newFilePath)){
                File::delete($newFilePath);
            }
            return redirect()->back()->with('status', 'Requirement Updated!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
}
