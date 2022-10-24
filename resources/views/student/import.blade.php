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
            @if (session()->has('failures'))
                @foreach (session()->get('failures') as $validation)
                <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
                        <p>Row #: {{ $validation->row() }}</p>
                    {{-- {{ $validation->attribute() }} <br> --}}
                    <ul>
                        @foreach ($validation->errors() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    <b>{{ $validation->values()[$validation->attribute()] }}</b>

                </div>
                @endforeach
            @endif
            {{-- @include('layouts.breadcrumbs') --}}
            {{-- @include('layouts.back') --}}

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Import Student') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('student.import.store') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                            <div class="flex flex-wrap pr-2 mt-5">
                                <label for="importStudent" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Upload Student Excel File') }}:
                                </label>

                                <input type="file" name="importStudent" id="importStudent" class="form-input w-full @error('importStudent')  border-red-500 @enderror"
                                value="{{ old('importStudent?') }}"  autocomplete="importStudent" autofocus >

                                @error('importStudent')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            
                    </div>
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">

                        <div class="flex flex-wrap pb-10">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Upload') }}
                            </button>

                            
                        </div>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
