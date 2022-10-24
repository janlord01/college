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
                <div class="text-sm border border-t-8 rounded text-green-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg pb-10">
                
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Add Course') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('course.store') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Course Name') }}:*
                            </label>
    
                            <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                                name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="Bachelor of Science in Information Technology" autofocus required>
    
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="code" class="block xs_mt text-gray-700 md:mt-3 sm:mt-3  text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Course code') }}:*
                            </label>
    
                            <input id="code" type="text" class="form-input w-full @error('code')  border-red-500 @enderror"
                                name="code" value="{{ old('code') }}"  autocomplete="code" placeholder="BSIT" autofocus required>
    
                            @error('code')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>

                        <div class="flex flex-wrap pr-2">
                            <label for="description" class="block xs_mt sm:mt-3 md:mt-3 text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Description') }}:*
                            </label>
    
                            <input id="description" type="text" class="form-input w-full @error('description')  border-red-500 @enderror"
                                name="description" value="{{ old('description') }}"  autocomplete="description" placeholder="...." autofocus required>
    
                            @error('description')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        
                        <div class="flex flex-wrap mt-10 w-1/3">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Create') }}
                            </button>
                            
                        </div>
                        
                    </div>
                    
                   
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
