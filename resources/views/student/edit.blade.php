@extends('layouts.app')

@section('content')
    
<main class="sm:container sm:mx-auto m:max-w-lg sm:mt-10 mx-4">
    <div class="flex">
        <div class="w-full">
            @if (session('status'))
                    <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('error'))
                <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            {{-- @include('layouts.breadcrumbs') --}}
            {{-- @include('layouts.back') --}}

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Add Student') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="fname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('First Name') }}:*
                            </label>
    
                            <input id="fname" type="text" class="form-input w-full @error('fname')  border-red-500 @enderror"
                                name="fname" value="{{ $student->fname }}"  autocomplete="fname" placeholder="Ex. Juan" autofocus>
    
                            @error('fname')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
    
                        <div class="flex flex-wrap pr-2">
                            <label for="mname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Middle Name') }}:
                            </label>
    
                            <input id="mname" type="text" class="form-input w-full @error('mname')  border-red-500 @enderror"
                                name="mname" value="{{ $student->mname }}"  autocomplete="mname" placeholder="Ex. M." autofocus>
    
                            @error('mname')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="lname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Last Name') }}:*
                            </label>
    
                            <input id="lname" type="text" class="form-input w-full @error('lname')  border-red-500 @enderror"
                                name="lname" value="{{ $student->lname }}" required autocomplete="lname" placeholder="Ex. Dela Cruz" autofocus>
    
                            @error('lname')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                    </div>
                    {{-- End Name --}}
                    <hr>
                    {{-- Date of birth / Gender / Nationality --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap mr-2">
                            <label for="dob" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Birthday') }}:*
                            </label>
    
                            <input id="dob" type="date" class="form-input w-full @error('dob')  border-red-500 @enderror"
                                 name="dob" value="{{ $student->dob }}" required autocomplete="dob" placeholder="Ex. August 12, 1991" autofocus>
                            
                            @error('dob')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Gender') }}:*
                            </label>

                            <select name="gender" id="gender" class="form-input w-full @error('gender')  border-red-500 @enderror"
                            value="{{ old('gender') }}" required autocomplete="gender" placeholder="Male/Female" autofocus>
                                <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female<option>
                            </select>
                            @error('gender')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="nationality" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Nationality') }}:*
                            </label>
    
                            <input id="nationality" type="text" class="form-input w-full @error('nationality')  border-red-500 @enderror"
                                name="nationality" value="{{ $student->nationality }}" required autocomplete="nationality" placeholder="Filipino" autofocus>
    
                            @error('nationality')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                    </div>
                    <hr>
                    {{-- Address --}}
                    <div class="grid grid-cols-1">
                        <div class="flex flex-wrap">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Address') }}:*
                            </label>
    
                            <input id="address" type="text" class="form-input w-full @error('address')  border-red-500 @enderror"
                                name="address" value="{{ $student->address }}" required autocomplete="address" placeholder="House Number/Street" autofocus>
    
                            @error('address')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                    </div>
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap mr-2">
                            <label for="country" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                                {{ __('Country') }}:*
                            </label>
    
                            <input id="country" type="text" class="form-input w-full @error('country')  border-red-500 @enderror"
                                name="country" value="{{ $student->country }}" required autocomplete="country" placeholder="Philippines" autofocus>
    
                            @error('country')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap mr-2">
                            <label for="province" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                                {{ __('Province') }}:
                            </label>
    
                            <input id="province" type="text" class="form-input w-full @error('province')  border-red-500 @enderror"
                                name="province" value="{{ $student->province }}" required autocomplete="province" placeholder="Your Province" autofocus>
    
                            @error('province')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap mr-2">
                            <label for="city" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                                {{ __('City') }}:*
                            </label>
    
                            <input id="city" type="text" class="form-input w-full @error('city')  border-red-500 @enderror"
                                name="city" value="{{ $student->city }}" required autocomplete="city" placeholder="Your City" autofocus>
    
                            @error('city')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="barangay" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                                {{ __('Barangay') }}:
                            </label>
    
                            <input id="barangay" type="text" class="form-input w-full @error('barangay')  border-red-500 @enderror"
                                name="barangay" value="{{ $student->barangay }}" required autocomplete="barangay" placeholder="Your Barangay" autofocus>
    
                            @error('barangay')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="zipcode" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                                {{ __('Zip Code') }}:*
                            </label>
    
                            <input id="zipcode" type="text" class="form-input w-full @error('zipcode')  border-red-500 @enderror"
                                name="zipcode" value="{{ $student->zipcode }}" required autocomplete="zipcode" placeholder="Zip Code" autofocus>
    
                            @error('zipcode')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap">
                            <label for="fb" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                                {{ __('Facebook') }}:
                            </label>
    
                            <input id="fb" type="text" class="form-input w-full @error('fb')  border-red-500 @enderror"
                                name="fb" value="{{ $student->fb }}"  autocomplete="fb" placeholder="Facebook" autofocus>
    
                            @error('fb')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                    </div>
                    {{-- Fb and contact --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="contact" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Contact Number') }}:*
                            </label>
    
                            <input id="contact" type="text" class="form-input w-full @error('contact')  border-red-500 @enderror"
                                name="contact" value="{{ $student->number }}" required autocomplete="contact" placeholder="09123456789" autofocus>
    
                            @error('contact')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="religion" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Religion') }}:
                            </label>
    
                            <input id="religion" type="text" class="form-input w-full @error('religion')  border-red-500 @enderror"
                                name="religion" value="{{ $student->religion }}"  autocomplete="religion" placeholder="Ex. Protestant" autofocus>
    
                            @error('religion')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                    </div>
                    <hr>
                    
                    <div id="student_details" class="">
                        <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                            <div class="flex flex-wrap pr-2">
                                <label for="lrn" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('LRN/Student ID') }}:*
                                </label>
        
                                <input id="lrn" type="text" class="form-input w-full @error('lrn')  border-red-500 @enderror"
                                    name="lrn" value="{{ $student->lrn }}" autocomplete="lrn" placeholder="00000" autofocus>
        
                                @error('lrn')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap pr-2">
                                <label for="stay_with" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Stay With') }}:
                                </label>
        
                                <input id="stay_with" type="text" class="form-input w-full @error('stay_with')  border-red-500 @enderror"
                                    name="stay_with" value="{{ $student->stay_with }}"  autocomplete="stay_with" placeholder="Ex. Parent" autofocus>
        
                                @error('stay_with')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        {{-- Indigenous --}}
                        <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                            <div class="flex flex-wrap pr-2 mt-5">
                                <label for="indigenous" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Indigenous?') }}:
                                </label>

                                <select name="indigenous" id="indigenous" class="form-input w-full @error('indigenous')  border-red-500 @enderror"
                                value="{{ old('indigenous') }}"  autofocus required>
                                @if($student->indigenous)
                                    <option value="yes">Yes</option>
                                @else
                                    <option value="">Yes/No</option>
                                @endif
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                @error('indigenous')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap pr-2 mt-5 {{ ($student->indigenous) ? '': 'hidden' }}" id="indi_details">
                                <label for="group_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Group Name') }}:
                                </label>
        
                                <input id="group_name" type="text" class="form-input w-full @error('group_name')  border-red-500 @enderror"
                                    name="group_name" value="{{ $student->indigenous }}"  autocomplete="group_name" placeholder="Ex. Parent" autofocus>
        
                                @error('group_name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                            <div class="flex flex-wrap pr-2 mt-5">
                                <label for="transfery" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Transfery?') }}:
                                </label>

                                <select name="transfery" id="transfery" class="form-input w-full @error('transfery')  border-red-500 @enderror"
                                value="{{ old('transfery') }}"  autocomplete="transfery" autofocus required>
                                    @if($student->transfery_id)
                                    <option value="yes">Yes</option>
                                    @else
                                    <option value="">Yes/No</option>
                                    @endif
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                @error('transfery')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            
                        </div>
                        {{-- transfery --}}
                        <div id="transfery_details" class="{{ ($student->transfery_id) ? '': 'hidden' }}">
                            <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                                <div class="flex flex-wrap pr-2 mt-5">
                                    <label for="last_grade_completed" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                        {{ __('Last Year Level & Semester Completed') }}:
                                    </label>

                                    <input name="last_grade_completed" id="last_grade_completed" class="form-input w-full @error('last_grade_completed')  border-red-500 @enderror"
                                    value="{{ $student->last_grade_completed }}"  autocomplete="gender" autofocus>
                                    
                                    @error('last_grade_completed')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap pr-2 mt-5">
                                    <label for="last_school_year_completed" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                        {{ __('Last School Year Completed') }}:
                                    </label>

                                    <input name="last_school_year_completed" id="last_school_year_completed" class="form-input w-full @error('last_school_year_completed')  border-red-500 @enderror"
                                    value="{{ $student->last_school_year_completed }}"  autocomplete="gender" autofocus>
                                    
                                    @error('last_school_year_completed')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap pr-2 mt-5">
                                    <label for="school_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                        {{ __('School Name') }}:
                                    </label>

                                    <input name="school_name" id="school_name" class="form-input w-full @error('school_name')  border-red-500 @enderror"
                                    value="{{ $student->school_name }}"  autocomplete="gender" autofocus>
                                    
                                    @error('school_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1">
                                <div class="flex flex-wrap pr-2 mt-5">
                                    <label for="school_address" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                        {{ __('School Address') }}:
                                    </label>

                                    <input name="school_address" id="school_address" class="form-input w-full @error('school_address')  border-red-500 @enderror"
                                    value="{{ $student->school_address }}"  autocomplete="gender" autofocus>
                                    
                                    @error('school_address')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- end of transfery details --}}
                        <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                            <div class="flex flex-wrap pr-2 mt-5">
                                <label for="image_user" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Current ID') }}:
                                </label>

                                <img class="w-3/4" src="{{ asset($student->image_path ? 'images/'.$student->image_path :'images/man-icon.png') }}" />
                            </div>
                        </div>
                        <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                            <div class="flex flex-wrap pr-2 mt-5">
                                <label for="image_user" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Upload new ID') }}:
                                </label>

                                <input type="file" name="image_user" id="image_user" class="form-input w-full @error('image_user')  border-red-500 @enderror"
                                value="{{ old('image_user') }}"  autocomplete="image_user" autofocus >

                                @error('image_user')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Student Details End --}}
                    <hr>

                    {{-- Email --}}
                    <div class="grid grid-cols-1">
                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('E-Mail Address') }}:
                            </label>
    
                            <input id="email" type="email"
                                class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                                value="{{ old('email') }}"  autocomplete="email">
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Password') }}:
                            </label>
    
                            <input id="password" type="password"
                                class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                                 autocomplete="new-password">
    
                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="grid grid-cols-1">
                        <div class="flex flex-wrap">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Confirm Password') }}:
                            </label>
    
                            <input id="password-confirm" type="password" class="form-input w-full"
                                name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap pb-10">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Register') }}
                        </button>

                        
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
