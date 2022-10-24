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
                    action="{{ route('temp.student.store') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="fname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Name') }}:
                            </label>

                            <input type="hidden" name="user_id" value="{{ $student->id }}">
    
                            <input id="fname" type="text" class="form-input w-full @error('fname')  border-red-500 @enderror"
                                name="fname" value="{{ $student->name }}"  autocomplete="fname" placeholder="Ex. Juan" autofocus>
    
                            @error('fname')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
    
                        <div class="flex flex-wrap pr-2">
                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Amount') }}:
                            </label>
    
                            <input id="amount" type="text" class="form-input w-full @error('amount')  border-red-500 @enderror"
                                name="amount" value="{{ $student->amount }}"  autocomplete="amount" placeholder="Ex. M." autofocus>
    
                            @error('amount')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                    </div>
                     <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="breakdown" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Breakdown') }}:
                            </label>
    
                            <textarea id="breakdown" type="text" class="form-input w-full @error('breakdown')  border-red-500 @enderror"
                                name="breakdown"   autocomplete="breakdown" placeholder="Ex. Registration - P2500" autofocus>{{ $student->breakdown }}</textarea>
    
                            @error('breakdown')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                     </div>
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 xs_div">
                        <div class="flex flex-wrap pb-10">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Add/Update') }}
                            </button>

                            
                        </div>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
