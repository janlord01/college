<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\UserDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class TeacherController extends Controller
{
    public function index(){
        $teachers = User::where('users.division','college')
            ->role('college-teacher')
            ->paginate(10);
            // dd($teachers);
        return view('teacher.index',compact('teachers'));
    }
    public function create(){
        return view('teacher.create');
    }
    public function store(Request $data)
    {
    //    try{
        $data->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fname' => ['required','string','max:255'],
            'lname' => ['required','string','max:255'],
            'dob' => ['required','date'],
            'gender' => ['required','string','max:255'],
            'nationality' => ['required','string','max:255'],
            'address' => ['required','string','max:500'],
            'country' => ['required','string','max:255'],
            'province' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
            'barangay' => ['required','string','max:255'],
            'zipcode' => ['required','integer'],
            'contact' => ['required','min:11','numeric'],
            'image_user' => ['mimes:jpg,png,jpeg|max:5048']
        ]);
        $newImageName = '';
        if($data->hasFile('image_user')){
        $newImageName = time() . '-' . $data->fname . '-' . $data->lname . '.' . $data->image_user->extension();
        $data->image_user->move(public_path('images'), $newImageName);
        }

        $user = new User;
        $user->name = $data['fname'] . " " . $data['mname'] . " " . $data['lname'] ;
        $user->email =$data['email'];
        $user->password = Hash::make($data['password']);
        $user->image_path = $newImageName ? $newImageName : '' ;
        $qrext = substr(md5(mt_rand()), 0, 5);
        $qrcode = $data['lname'].'-'.$qrext;
        $user->qrcode = $qrcode;
        $user->division = 'college';
        
  


        if(!$user->save()){
            abort(500, 'Some Error');
        }else{
            // $user->assignRole($data['role']);
            $user_id = User::latest('id')->first();

            $user->assignRole('college-teacher');
            $age = Carbon::parse($data->dob)->diff(Carbon::now())->y;
            $userDetails = UserDetails::create([
                'user_id' => $user_id->id,
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'mname' => $data['mname'],
                'dob'   => date('Y-m-d', strtotime(str_replace('-','/', $data['dob']))),
                'gender'=> $data['gender'],
                'nationality'=> $data['nationality'],
                'country'    => $data['country'],
                'province'   => $data['province'],
                'city'  => $data['city'],
                'address'    => $data['address'],
                'barangay'  =>  $data['barangay'],
                'zipcode'    => (string)$data['zipcode'],
                'fb'    => $data['fb'],
                'religion'  =>  $data['religion'],
                'age' => $age
                
            ]);

            $userContact = Contact::create([
                'user_id'   =>  $user_id->id,
                'type'      => 'Phone Number',
                'number' => $data['contact'],
            ]);
            
            return redirect()->back()->with('status', 'Successfully Added!');
        }
    //    }catch(Throwable $e){
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
        
    }
}
