@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto m:max-w-lg sm:mt-10 mx-4">
    <div class="flex">
        <div class="w-full">
            {{-- @include('layouts.breadcrumbs') --}}
        {{-- @include('layouts.back') --}}

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('error'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <a href="" class="mb-5 inline-block"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill inline" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Student List</button>
            </a>

            
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md relative">
                    {{ __('Tuition Fee Payment') }}
                    <div type="button" class="bg-gray-300 text-gray-700 font-bold py-2 px-3 border border-gray-500 rounded absolute right-8 bottom-3" disabled> Cashier: {{  Auth::user()->name }}</div>
                </header>
                {{-- @dd($section)÷ --}}
                 {{-- @dd($student) --}}
                {{-- @foreach ($students as $student) --}}
                    
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('temp.cashier.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PATCH') --}}
                    {{-- <input type="hidden" name="id" id="id" value="{{ $s->id }}"> --}}
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-2">
                        <div class="flex flex-wrap pr-2">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Name') }}:*
                            </label>
                            <input id="student_id" type="hidden" class="form-input w-full @error('student_id')  border-red-500 @enderror"
                                name="student_id" value="{{ $student->id }}"  autocomplete="student_id" readonly  autofocus>

                            <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror bg-gray-100"
                                name="name" value="{{ $student->name }}"  autocomplete="name" readonly  autofocus>
    
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>

                        
                        {{-- <div class="flex flex-wrap pr-2">
                            <label for="academic_year" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Academic Year') }}:*
                            </label>

                            <select name="academic_year" id="academic_year" class="form-input bg-green-300 w-full @error('academic_year')  border-red-500 @enderror">
                                <option value="{{ active_academic_year_display() }}">{{ active_academic_year_display() }}</option>
                                @foreach ($acad_years as $acad_year)
                                    <option value="{{ $acad_year->acad_year }}">{{ $acad_year->acad_year }}</option>
                                @endforeach
                            </select>
    
                            @error('academic_year')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div> --}}
                    </div>

                    <div class="grid grid-cols-2">
                        <div class="flex flex-wrap pr-2 ">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Type of Transaction') }}:*
                            </label>

                            <select name="tot" id="tot" class="form-input w-full @error('tot')  border-red-500 @enderror" required autocomplete="tot">
                                <option value="">Select Type of Transaction</option>
                                <option value="Onsite">Onsite</option>
                                <option value="Online">Online</option>
                            </select>
    
                            @error('tot')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>

                        {{-- <div class="flex flex-wrap pr-2 ">
                            <label for="top" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Type of Payment') }}:*
                            </label>

                            <select name="top" id="top" class="form-input w-full @error('top')  border-red-500 @enderror" required autocomplete="top">
                                <option value="">Select type of Payments</option>
                                <option value="student-payment">Student Payment/Tuition Fees</option>
                                <option value="enrollment">Enrollment Fee</option>
                            </select>
    
                            @error('top')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div> --}}

                        
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="flex flex-wrap pr-2">
                            <label for="mop" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Mode of Payment') }}:*
                            </label>

                            <select name="mop" id="mop" class="form-input w-full @error('mop')  border-red-500 @enderror" required autocomplete="mop">
                                <option value="">Mode of Payment</option>
                                <option value="Gcash">Gcash</option>
                                <option value="Bank">Bank</option>
                                <option value="Cash">Cash</option>
                                <option value="Check">Check</option>
                            </select>
    
                            @error('mop')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        
                    </div>
                    <div class="grid grid-cols-2 hidden" id="mop_detail">
                        <div class="flex flex-wrap pr-2 ">
                            <label for="refno" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Reference # (if not CASH)') }}: 
                            </label>
    
                            <input id="refno" type="refno" class="form-input w-full @error('refno')  border-red-500 @enderror"
                                name="refno" value="{{ old('refno') }}"  autocomplete="refno"  autofocus>
    
                            @error('refno')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="prof_img" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Reference Proof') }}: 
                            </label>
    
                            <input id="prof_img" type="file" class="form-input w-full @error('prof_img')  border-red-500 @enderror"
                                name="prof_img" value="{{ old('prof_img') }}"  autocomplete="prof_img"  autofocus>
    
                            @error('prof_img')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    
                    {{-- <div id="due_pay">
                        <select name="" id="due_payments">
                            
                        </select>
                    </div> --}}
                    <hr>
                    <div class="grid grid-cols-2" id="bal_detail">
                        {{-- @foreach ($students as $student) --}}
                        {{-- {{ $bal = ''; }}
                        {{ $tuition_fee = ''; }}
                        {{ $due_id = ''; }}
                        @if ($studentBals)
                            <span class="hidden">{{ $bal = $studentBals->total; }}</span>
                            <span class="hidden">{{ $tuition_fee = $studentBals->tuition_per_month; }}</span>
                            <span class="hidden">{{ $due_id = $studentBals->due_id; }}</span>
                        @endif --}}
                        <div class="flex flex-wrap pr-2">
                            <label for="Balance" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Balance') }}:
                            </label>
                            {{-- <input id="due_id" type="hidden" class="form-input w-full @error('due_id')  border-red-500 @enderror bg-gray-100"
                                name="due_id" value="{{ ($due_id != "") ? $due_id : 0 }}"  autocomplete="due_id" placeholder="payment Due" readonly  autofocus> --}}
                            
                                <input id="balance" type="text" class="form-input w-full @error('balance')  border-red-500 @enderror bg-gray-100"
                                name="balance" value="{{ $student->amount }}"  autocomplete="balance" readonly  autofocus>
                            
                            @error('balance')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        {{-- <div class="flex flex-wrap pr-2">
                            <label for="tuitionfee" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Tuition Fee') }}:
                            </label>
                            <input id="tuitionfee" type="text" class="form-input w-full @error('tuitionfee')  border-red-500 @enderror bg-gray-100"
                                name="tuitionfee" value="{{ ($tuition_fee != "") ? $tuition_fee : 0 }}"  autocomplete="tuitionfee" readonly  autofocus>
                            
                            @error('tuitionfee')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div> --}}
                        {{-- @endforeach --}}
                        
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="flex flex-wrap pr-2">
                            <label for="note" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Descriptions (Item paid for)') }}: 
                            </label>
                            
                            <input id="note" type="text" class="form-input w-full @error('note')  border-red-500 @enderror"
                                name="note" value="{{ old('note') }}"  autocomplete="note" placeholder="Tuition Fee -(OR#)" autofocus>
    
                            @error('note')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap pr-2">
                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Amount (Price of the item)') }}: 
                            </label>
                            
                            <input id="amount" type="number" class="form-input w-full @error('amount')  border-red-500 @enderror "
                                name="amount" value="{{ old('amount') }}"  autocomplete="amount"  autofocus>
    
                            @error('amount')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="flex flex-wrap pr-2">
                            <label for="discount" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Discounts') }}:
                            </label>

                            {{-- <select name="discount" id="discount" class="form-input w-full @error('discount')  border-red-500 @enderror">
                                <option value="">Discounts</option>
                                @foreach ($discounts as $discount)
                                    @if($discount->type == 'Exact Amount')
                                        {{ $val = 'P' }}
                                        <option value="{{ $discount->id }}" id="exact" name="{{ $discount->number }}">{{ $val.''. $discount->number .'-'.$discount->description }}</option>
                                    @else
                                        {{ $val = '%' }}
                                        <option value="{{ $discount->id }}" id="percent" name="{{ $discount->number }}">{{ $discount->number.$val.'-'.$discount->description }}</option>
                                    @endif

                                @endforeach
                            </select> --}}

                            <input id="discount" type="text" class="form-input w-full @error('discount')  border-red-500 @enderror "
                                name="discount" value="{{ old('discount') }}"  autocomplete="discount"   autofocus>
    
                            @error('discount')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>

                        <div class="flex flex-wrap pr-2">
                            <label for="sub_total" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Sub Total') }}: 
                            </label>
                            
                            <input id="sub_total" type="text" class="form-input w-full @error('sub_total')  border-red-500 @enderror bg-gray-100"
                                name="sub_total" value="{{ old('sub_total') }}"  autocomplete="sub_total" readonly  autofocus>
    
                            @error('sub_total')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div class="flex flex-wrap pr-2">
                            <label for="cash" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Entered Cash') }}: 
                            </label>
                            
                            <input id="cash" type="number" class="form-input w-full @error('cash')  border-red-500 @enderror"
                                name="cash" value="{{ old('cash') }}"  autocomplete="cash"  autofocus>
    
                            @error('cash')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap pr-2">
                            <label for="total" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Total') }}: 
                            </label>
                            
                            <input id="total" type="text" class="form-input w-full @error('total')  border-red-500 @enderror bg-gray-100"
                                name="total" value="{{ old('total') }}"  autocomplete="total" readonly  autofocus>
    
                            @error('total')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="flex flex-wrap pr-2">
                            <label for="change" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Change') }}: 
                            </label>
                            
                            <input id="change" type="text" class="form-input w-full @error('change')  border-red-500 @enderror bg-gray-100"
                                name="change" value="{{ old('change') }}"  autocomplete="change" readonly  autofocus>
    
                            @error('change')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    
                   
                    <div class="flex flex-wrap w-1/3">
                        <button type="submit"
                            class="w-full mb-20 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Pay') }}
                        </button>
                    </div>

                    

                    
                </form>
                {{-- @endforeach --}}
            </section>
        </div>
    </div>
    
</main>
@endsection
