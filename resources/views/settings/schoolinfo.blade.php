@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif
        {{-- @include('layouts.back') --}}
        
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                {{ __('School Information') }}
            </header>
            @foreach ($school_info as $schoolInfo)
                
            
            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                action="{{ route('setting.school_info.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                {{-- Name --}}
                <div class="grid grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                    <div class="flex flex-wrap pr-2">
                        <label for="school_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('School Name') }}:*
                        </label>

                        <input id="school_name" type="text" class="form-input w-full @error('school_name')  border-red-500 @enderror"
                            name="school_name" value="{{ $schoolInfo->school_name }}"  autocomplete="school_name" placeholder="Dr. P. Ocampo - Davao" autofocus>

                        @error('school_name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>

                    <div class="flex flex-wrap pr-2">
                        <label for="ched_no" class="block text-gray-700 text-sm xs_mt sm:mt-3 font-bold mb-2 sm:mb-4">
                            {{ __('Ched No:') }}:*
                        </label>

                        <input id="ched_no" type="text" class="form-input w-full @error('ched_no')  border-red-500 @enderror"
                            name="ched_no" value="{{ $schoolInfo->ched_no }}" required autocomplete="ched_no" placeholder="777" autofocus>

                        @error('ched_no')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>

                </div>

                <div class="grid grid-cols-2 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">

                    <div class="flex flex-wrap pr-2">
                        <label for="start_class" class="block text-gray-700  text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Class Start At') }}:*
                        </label>

                        <input id="start_class" type="date" class="form-input w-full @error('start_class')  border-red-500 @enderror"
                            name="start_class" value="{{ $schoolInfo->class_start }}" required  autocomplete="start_class" placeholder="August 10, 2021" autofocus>

                        @error('start_class')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>

                    <div class="flex flex-wrap pr-2">
                        <label for="class_end" class="block xs_mt sm:mt-3 text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Class Start At') }}:*
                        </label>

                        <input id="class_end" type="date" class="form-input w-full @error('class_end')  border-red-500 @enderror"
                            name="class_end" value="{{ $schoolInfo->class_end }}" required  autocomplete="class_end" placeholder="August 10, 2021" autofocus>

                        @error('class_end')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    
                </div>
                
                {{-- Address --}}
                <div class="grid grid-cols-1">
                    <div class="flex flex-wrap">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('School Address') }}:*
                        </label>

                        <input id="address" type="text" class="form-input w-full @error('address')  border-red-500 @enderror"
                            name="address" value="{{ $schoolInfo->address }}" required autocomplete="address" placeholder="House Number/Street" autofocus>

                        @error('address')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                </div>
                <div class="grid grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                    <div class="flex flex-wrap mr-2">
                        <label for="country" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                            {{ __('Country') }}:*
                        </label>

                        <input id="country" type="text" class="form-input w-full @error('country')  border-red-500 @enderror"
                            name="country" value="{{ $schoolInfo->country }}" required autocomplete="country" placeholder="Philippines" autofocus>

                        @error('country')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    <div class="flex flex-wrap mr-2">
                        <label for="province" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                            {{ __('Province') }}:*
                        </label>

                        <input id="province" type="text" class="form-input w-full @error('province')  border-red-500 @enderror"
                            name="province" value="{{ $schoolInfo->province }}" required autocomplete="province" placeholder="Your Province" autofocus>

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
                            name="city" value="{{ $schoolInfo->city }}" required autocomplete="city" placeholder="Your City" autofocus>

                        @error('city')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    <div class="flex flex-wrap pr-2">
                        <label for="barangay" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                            {{ __('Barangay') }}:^
                        </label>

                        <input id="barangay" type="text" class="form-input w-full @error('barangay')  border-red-500 @enderror"
                            name="barangay" value="{{ $schoolInfo->barangay }}" required autocomplete="barangay" placeholder="Your Barangay" autofocus>

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
                            name="zipcode" value="{{ $schoolInfo->zipcode }}" required autocomplete="zipcode" placeholder="Zip Code" autofocus>

                        @error('zipcode')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    <div class="flex flex-wrap">
                        <label for="fb" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                            {{ __('Facebook Page') }}:
                        </label>

                        <input id="fb" type="text" class="form-input w-full @error('fb')  border-red-500 @enderror"
                            name="fb" value="{{ $schoolInfo->fb }}"  autocomplete="fb" placeholder="Facebook" autofocus>

                        @error('fb')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                </div>
                {{-- Fb and contact --}}
                <div class="grid grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                    <div class="flex flex-wrap pr-2">
                        <label for="Mono" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Mobile Number') }}:
                        </label>

                        <input id="Mono" type="text" class="form-input w-full @error('Mono')  border-red-500 @enderror"
                            name="Mono" value="{{ $schoolInfo->mobile_no }}"  autocomplete="Mono" placeholder="082-7777-77" autofocus>

                        @error('Mono')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    <div class="flex flex-wrap pr-2">
                        <label for="phno" class="block text-gray-700 xs_mt sm:mt-3  text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Phone Number') }}:
                        </label>

                        <input id="phno" type="text" class="form-input w-full @error('phno')  border-red-500 @enderror"
                            name="phno" value="{{ $schoolInfo->phone_no }}"  autocomplete="phno" placeholder="09123456789" autofocus>

                        @error('phno')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    <div class="flex flex-wrap pr-2">
                        <label for="email" class="block text-gray-700 xs_mt sm:mt-3  text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Email') }}:
                        </label>

                        <input id="email" type="email" class="form-input w-full @error('email')  border-red-500 @enderror"
                            name="email" value="{{ $schoolInfo->email }}"  autocomplete="email" placeholder="Ex. Protestant" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                </div>

                
                
                <div class="grid grid-cols-1">
                    <div class="flex flex-wrap pr-2">
                        <img class="object-cover w-40 h-40 rounded-full text-center" width="10" src="{{ asset($schoolInfo->logo ? 'images/'.$schoolInfo->logo :'images/man-icon.png') }}" alt="" loading="lazy" />
                    </div>
                    <div class="flex flex-wrap pr-2 pt-10">
                        <label for="logo" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Upload logo') }}:
                        </label>

                        <input type="file" name="logo" id="logo" class="form-input w-full @error('logo')  border-red-500 @enderror"
                        value="{{ old('logo?') }}"  autocomplete="logo" autofocus >

                        @error('logo')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                    
                    <div class="flex flex-wrap pb-10 mt-5 md:w-1/3">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Update Info') }}
                        </button>

                </div>
            </form>
            
            @endforeach
        </section>
        
    </div>

</main>

@endsection
