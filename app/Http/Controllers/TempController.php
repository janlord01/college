<?php

namespace App\Http\Controllers;

use App\Models\TempCashier;
use App\Models\TempPayable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
use Barryvdh\DomPDF\Facade\Pdf;

class TempController extends Controller
{
    public function temp_students(){
        $students = User::role('college-student')
            ->leftJoin('temp_payable','temp_payable.user_id','=','users.id')
            ->select('users.id','users.name','temp_payable.amount','temp_payable.breakdown')
            ->paginate(10);
        return view('temp.add-student-payables',compact('students'));
    }

    public function temp_students_add_payble($id, Request $request){
        $student = User::where('users.id', $id)
                ->leftJoin('temp_payable','temp_payable.user_id','=','users.id')
            ->select('users.id','users.name','temp_payable.amount','temp_payable.breakdown')->first();

        return view('temp.update-student-payables',compact('student'));
    }

    public function temp_students_add_payble_store(Request $request){
        
        $request->validate([
            'amount' => ['required','numeric'],
            'breakdown' => ['required'],
        ]);

        $checkStudent = TempPayable::where('user_id', $request->user_id)->count();

        if($checkStudent >= 1){
            $student = TempPayable::where('user_id', $request->user_id)->first();
            $student->breakdown = $request->breakdown;
            $student->amount = $request->amount;

            if($student->save()){
                return redirect('/cashier/temp/students')->with('status', 'Successfully Amount added/updated');
            }else{
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }else{
            $pay = new TempPayable();
            $pay->user_id = $request->user_id;
            $pay->breakdown = $request->breakdown;
            $pay->amount = $request->amount;

            if($pay->save()){
                return redirect('/cashier/temp/students')->with('status', 'Successfully Amount added/updated');
            }else{
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }

        
    }

    public function temp_students_search(Request $request){
        if (!empty($request->search)) {
            $request->validate([
                'search' => ['required']
            ]);
        }

        $students = TempPayable::leftJoin('users','users.id','=','temp_payable.user_id')
            ->where('users.name', 'like', '%' . $request->search . '%')
            ->paginate(10);

        return view('temp.add-student-payables',compact('students'));
    }

     public function cashier_index(Request $request){
         $students = User::role('college-student')
            ->leftJoin('temp_payable','temp_payable.user_id','=','users.id')
            ->select('users.id','users.name','temp_payable.amount','temp_payable.breakdown')
            ->paginate(10);
        
        $payments = TempCashier::leftJoin('users','users.id','=','temp_cashier.user_id')
                    ->select('users.id','users.name','temp_cashier.id as or_id','temp_cashier.description','temp_cashier.created_at','temp_cashier.total')
                    ->paginate(10);

        return view('temp.cashier-index',compact('students','payments'));
    }

    public function cashier_create(Request $request, $id){
        $student = User::where('users.id', $id)
                ->leftJoin('temp_payable','temp_payable.user_id','=','users.id')
            ->select('users.id','users.name','temp_payable.amount','temp_payable.breakdown')->first();
        
        $payment = TempPayable::where('user_id', $id)->first();

        return view('temp.casher-create',compact('student','payment'));
    }

    public function cashier_store(Request $request){
        $request->validate([
            'student_id' => ['required'],
            'tot' => ['required'],
            'mop' => ['required'],
            'note' => ['required'],
            'amount' => ['required'],
            'sub_total' => ['required'],
            'cash' => ['required'],
            'total' => ['required'],
            'change' => ['required'],
        ]);

        $newImageName = '';
        if ($request->has('prof_img')) {
            $newImageName = 'payment-' . time() . '-' . $request->fname . '.' . $request->prof_img->extension();
            $request->prof_img->move(public_path('images'), $newImageName);
        }


        $payable = TempPayable::where('user_id', $request->student_id)->first();

        $payment = new TempCashier();
        $payment->user_id = $request->student_id;
        $payment->cashier_id = Auth::user()->id;
        $payment->description = $request->note;
        $payment->sub_total = $request->sub_total;
        $payment->discount = $request->discount;
        $payment->total = $request->total;
        $payment->cash_entered = $request->cash;
        $payment->mop = $request->mop;
        $payment->amount = $request->amount;
        $payment->ref_id = ($request->refno) ? $request->refno : null;
        $payment->prof_img = $newImageName;
        $payment->balance = $payable->amount - $request->sub_total;
        $payment->change = $request->change;

        $payable->amount = $payable->amount - $request->sub_total;
        
        

        if($payment->save() && $payable->save()){
            
            return redirect('/cashier/temp/payment/index')->with('status','Payment Successfully');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }

        
    }

    public function cashier_student_search(Request $request){

        if (!empty($request->search)) {
            $request->validate([
                'search' => ['required']
            ]);
        }

        $students = User::role('college-student')
            ->leftJoin('temp_payable','temp_payable.user_id','=','users.id')
            ->select('users.id','users.name','temp_payable.amount','temp_payable.breakdown')
            ->where('users.name', 'like', '%' . $request->search . '%')
            ->paginate(10, ['*'],"student_per_page");

        $payments = TempCashier::leftJoin('users','users.id','=','temp_cashier.user_id')
                ->select('users.id','users.name','temp_cashier.id as or_id','temp_cashier.description','temp_cashier.created_at','temp_cashier.total')
                ->paginate(10, ['*'],"payment_per_page");


        return view('temp.cashier-index',compact('students','payments'));
    }

    public function cashier_search(Request $request){

        if (!empty($request->search)) {
            $request->validate([
                'search' => ['required']
            ]);
        }

        $students = User::role('college-student')
            ->leftJoin('temp_payable','temp_payable.user_id','=','users.id')
            ->select('users.id','users.name','temp_payable.amount','temp_payable.breakdown')
            // ->where('users.name', 'like', '%' . $request->search . '%')
            ->paginate(10, ['*'],"student_per_page");

        $payments = TempCashier::leftJoin('users','users.id','=','temp_cashier.user_id')
                ->select('users.id','users.name','temp_cashier.id as or_id','temp_cashier.description','temp_cashier.created_at','temp_cashier.total')
                ->where('users.name', 'like', '%' . $request->search . '%')
                ->paginate(10, ['*'],"payment_per_page");


        return view('temp.cashier-index',compact('students','payments'));
    }

    public function cashier_destroy(Request $request){
        if($request->deletePaymentVal == null){
            return redirect()->back()->with('error','Something went wrong, please try again');
        }

        $payment = TempCashier::where('id', $request->deletePaymentVal)->first();

        $payable = TempPayable::where('user_id', $payment->user_id)->first();
        $payable->amount = $payable->amount + $payment->sub_total;

        if($payable->save() && $payment->delete()){
            return redirect()->back()->with('status','Successfully Void');
        }else{
            return redirect()->back()->with('error','Something went wrong, please try again');
        }
    }

    public function generateReceipt($id){
        try {
            $school_details = DB::table('school_info')->get();
            $student_details = TempCashier::leftJoin('users', 'users.id', '=', 'temp_cashier.user_id')
                ->leftJoin('contacts', 'contacts.user_id', '=', 'users.id')
                ->leftJoin('users_details', 'users_details.user_id', '=', 'temp_cashier.user_id')
                ->select('temp_cashier.created_at','users.id as user_id','users.name'
                ,'temp_cashier.id as transaction_id','temp_cashier.description as notes','temp_cashier.amount',
                'temp_cashier.sub_total','temp_cashier.discount','temp_cashier.total',
                'temp_cashier.cash_entered as cash','temp_cashier.change','users_details.address','users_details.city',
                'users_details.province','users_details.country','users_details.zipcode','contacts.number')
                ->where('temp_cashier.id', $id)
                // ->where('payment_trasanctions.acad_id', active_academic_year())
                ->get();
            // dd($studentsoa);

            $pdf = PDF::loadView('temp.generate-receipt', compact('school_details', 'student_details'))
                ->save('receipt.pdf');
            return $pdf->stream('receipt.pdf');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
