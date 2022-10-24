<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\User;
use App\Models\UserContact;
use App\Models\UserDetails;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
// use Throwable;

class StudentsImport implements ToCollection, WithHeadingRow, WithValidation, WithChunkReading, SkipsEmptyRows, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $qrext = substr(md5(mt_rand()), 0, 5);
            $qrcode = $row['lastname'] . '-' . $qrext;

            // $request->qrcode = $qrcode;
            $user = User::create([
                'name' => $row['firstname'] .' '. $row['middlename'] .' '. $row['lastname'],
                'email' => $row['email'],
                'password' => Hash::make('12345678'),
                'qrcode' => $qrcode,
            ]);
            $user->assignRole('college-student');
            
            // $user = User::latest()->first();

            UserDetails::create([
                'user_id' => $user->id,
                'fname' => $row['firstname'],
                'mname' => $row['middlename'],
                'lname' => $row['lastname'],
                'lrn' => $row['lrn'],
                'gender' => $row['gender'],
                'country' => $row['country'],
                'province' => $row['province'],
                'city' => $row['city'],
                'barangay' => $row['barangay'],
                'zipcode' => $row['zipcode'],
            ]);
            $contact = "0".$row['mobile'];
            Contact::create([
                'user_id' => $user->id,
                'type' => 'Phone Number',
                'number' => $contact
            ]);
            

        }
    }
    public function rules() : array
    {
        return [
            '*.email' => ['email', 'unique:users,email'],
            // '*.lrn' => ['lrn', 'unique:users_details,lrn'],
            'mobile' => ['required','min:11','numeric'],
        ];
    }
    // public function onFailure(Failure ...$failures)
    // {
    //     // Handle the failures how you'd like.
    // }
    public function chunkSize(): int
    {
        return 1000;
    }

}
