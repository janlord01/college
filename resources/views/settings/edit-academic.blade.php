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
                    {{ __('Update Academic Year') }}
                </header>
                {{-- @foreach ($academic as $acad)
                    
                @endforeach --}}
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('setting.academic_year.update', $academic->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('School Year') }}:*
                            </label>
    
                            <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                                name="name" value="{{ $academic->acad_year }}"  autocomplete="name" placeholder="2021-2022" autofocus required>
    
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="due_date" class="block xs_mt text-gray-700 md:mt-3 sm:mt-3  text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Payment Due Date') }}:*
                            </label>
    
                            <input id="due_date" type="date" class="form-input w-full @error('due_date')  border-red-500 @enderror"
                                name="due_date" value="{{ $academic->due_date }}"  autocomplete="due_date" placeholder="2021-2022" autofocus required>
    
                            @error('due_date')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>

                        <div class="flex flex-wrap pr-2">
                            <label for="unit_price" class="block xs_mt sm:mt-3 md:mt-3 text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Price Per Unit') }}:*
                            </label>
    
                            <input id="unit_price" type="number" class="form-input w-full @error('unit_price')  border-red-500 @enderror"
                                name="unit_price" value="{{ $academic->unit_price }}"  autocomplete="unit_price" placeholder="P300" autofocus required>
    
                            @error('unit_price')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        
                        <div class="flex flex-wrap mt-10 w-1/3">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Update') }}
                            </button>
                            
                        </div>
                        
                    </div>
                    
                   
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
